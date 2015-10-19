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
          templates:
                  default:
                  red:
                        star_full_template: '<i class="fa fa-star fa-2xx" style="color: red"></i>'
```

Usage:
```
   {{ 3 | rating }}. {# default template #}
   {{ 4 | rating('red') }} {# red template #}
```