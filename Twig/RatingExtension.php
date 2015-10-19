<?php

namespace KarolNet\TwigRatingFilterBundle\Twig;
use KarolNet\TwigRatingFilterBundle\Exception\RatingFilterConfigurationNotFoundException;

class RatingExtension extends \Twig_Extension
{
    /** @var  array */
    private $config;
    /** @var  string */
    private $starFull;
    /** @var  string */
    private $starHalfEmpty;
    /** @var  string */
    private $starEmpty;
    /** @var  int */
    private $maxRate;

    public function __construct($config)
    {
        $this->config = $config['templates'];
        $this->setConfiguration('default');
    }

    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter(
                'rating',
                [$this, 'showRating'],
                ['is_safe' => ['html']]
            ),
        ];
    }

    public function showRating($rating, $template = 'default')
    {
        if ($template != 'default') {
            $this->setConfiguration($template);
        }

        $output = '';

        for($count = 0; $count < $this->maxRate; $count++) {

            if ($rating <=  $count) {
                $output = $output . $this->starEmpty;
            } else {
                $output = $output . $this->starFull;
            }
        }

        return $output;
    }

    private function setConfiguration($template)
    {
        if (!array_key_exists($template, $this->config)) {
            throw new RatingFilterConfigurationNotFoundException('Configuration for: "' . $template . '" not found');
        }

        $configuration = $this->config[$template];

        $this->maxRate = $configuration['max_rating'];
        $this->starFull = $configuration['star_full_template'];
        $this->starHalfEmpty = $configuration['set_star_half_empty_template'];
        $this->starEmpty = $configuration['set_star_empty'];
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'rating_extension';
    }
}