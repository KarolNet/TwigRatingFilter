<?php

use KarolNet\TwigRatingFilterBundle\Twig\RatingExtension;

class RatingExtensionTest extends \PHPUnit_Framework_TestCase
{
    public function testRating()
    {
        $configuration = [
            'max_rating' => 20,
            'star_full_template' => 'ful_',
            'set_star_half_empty_template' => 'half_',
            'set_star_empty' => 'empty_'
        ];

        $rating = 15;
        $exampleSuccessResult = 'ful_ful_ful_ful_ful_ful_ful_ful_ful_ful_ful_ful_ful_ful_ful_empty_empty_empty_empty_empty_';

        $ratingFilter = new RatingExtension($configuration);
        $result = $ratingFilter->showRating($rating);
        $this->assertEquals($result, $exampleSuccessResult);
    }
}