<?php

namespace KarolNet\TwigRatingFilterBundle\Twig;

class RatingExtension extends \Twig_Extension
{
    /** @var  string */
    private $starFull;
    /** @var  string */
    private $starHalfEmpty;
    /** @var  string */
    private $starEmpty;
    /** @var  int */
    private $maxRate;

    public function __construct($configuration)
    {
        $this->maxRate = $configuration['max_rating'];
        $this->starFull = $configuration['star_full_template'];
        $this->starHalfEmpty = $configuration['set_star_half_empty_template'];
        $this->starEmpty = $configuration['set_star_empty'];
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

    public function showRating($rating)
    {
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

    /**
     * @return string
     */
    public function getName()
    {
        return 'rating_extension';
    }
}