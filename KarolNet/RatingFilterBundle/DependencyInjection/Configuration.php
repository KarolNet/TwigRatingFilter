<?php

namespace KarolNet\RatingFilterBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('rating_filter');

        $rootNode
            ->children()
                ->integerNode('max_rating')
                    ->defaultValue(5)
                ->end()
                ->scalarNode('star_full_template')
                    ->defaultValue('<i class="fa fa-star fa-2xx" style="color: #f6d20b"></i>')
                ->end()
                ->scalarNode('set_star_half_empty_template')
                    ->defaultValue('<i class="fa fa-star-half-o fa-2xx" style="color: #f6d20b "></i>')
                ->end()
                ->scalarNode('set_star_empty')
                   ->defaultValue('<i class="fa fa-star fa-2xx" style="color: #FFFF80"></i>')
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
