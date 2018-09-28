<?php
/**
 * Copyright: IMPER.INFO Adrian Szuszkiewicz
 * Date: 28.09.18
 * Time: 14:58
 */

namespace Imper86\ShoperApiSdkBundle\DependencyInjection;


use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('imper86_shoper_api_sdk');

        $rootNode
            ->children()
                ->arrayNode('credentials')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('username')->defaultValue('%env(SHOPER_USERNAME)%')->end()
                        ->scalarNode('password')->defaultValue('%env(SHOPER_PASSWORD)%')->end()
                        ->scalarNode('entrypoint')->defaultValue('%env(SHOPER_ENTRYPOINT)%')->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }

}
