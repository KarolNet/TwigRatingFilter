[![Build Status](https://travis-ci.org/KarolNet/TwigRatingFilter.svg)](https://travis-ci.org/KarolNet/TwigRatingFilter)

Description
--------

Karolnet RatingFilter is simple twig filter to generate stars rating from number

Installation
------------

```
composer require karolnet/rating-filter
```

add bundle to AppKernel:
```
new \KarolNet\TwigRatingFilterBundle\KarolNetTwigRatingFilterBundle()
```

configure if you want:
```
  karol_net_twig_rating_filter:
    max_rating: 5
    star_full_template: '<img src="/ico.png">'
    set_star_half_empty_template: ''
    set_star_empty: ''
```
