<?php

declare(strict_types=1);

namespace Tavy315\SyliusLabelsPlugin\DependencyInjection;

use Sylius\Bundle\ResourceBundle\Controller\ResourceController;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;
use Sylius\Component\Resource\Factory\Factory;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Tavy315\SyliusLabelsPlugin\Form\Type\LabelType;
use Tavy315\SyliusLabelsPlugin\Form\Type\Translation\LabelTranslationType;
use Tavy315\SyliusLabelsPlugin\Model\Label;
use Tavy315\SyliusLabelsPlugin\Model\LabelInterface;
use Tavy315\SyliusLabelsPlugin\Model\LabelTranslation;
use Tavy315\SyliusLabelsPlugin\Model\LabelTranslationInterface;
use Tavy315\SyliusLabelsPlugin\Repository\LabelRepository;

final class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('tavy315_sylius_labels_plugin');
        $rootNode = $treeBuilder->getRootNode();
        $rootNode
            ->addDefaultsIfNotSet()
            ->children()
                ->scalarNode('driver')->defaultValue(SyliusResourceBundle::DRIVER_DOCTRINE_ORM)->end()
            ->end()
        ;

        $this->addResourcesSection($rootNode);

        return $treeBuilder;
    }

    private function addResourcesSection(ArrayNodeDefinition $node): void
    {
        $node
            ->children()
                ->arrayNode('resources')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('label')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->variableNode('options')->end()
                                ->arrayNode('classes')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->scalarNode('model')->defaultValue(Label::class)->cannotBeEmpty()->end()
                                        ->scalarNode('interface')->defaultValue(LabelInterface::class)->cannotBeEmpty()->end()
                                        ->scalarNode('controller')->defaultValue(ResourceController::class)->cannotBeEmpty()->end()
                                        ->scalarNode('factory')->defaultValue(Factory::class)->end()
                                        ->scalarNode('form')->defaultValue(LabelType::class)->cannotBeEmpty()->end()
                                        ->scalarNode('repository')->defaultValue(LabelRepository::class)->cannotBeEmpty()->end()
                                    ->end()
                                ->end()
                                ->arrayNode('translation')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->variableNode('options')->end()
                                        ->arrayNode('classes')
                                            ->addDefaultsIfNotSet()
                                            ->children()
                                                ->scalarNode('model')->defaultValue(LabelTranslation::class)->cannotBeEmpty()->end()
                                                ->scalarNode('interface')->defaultValue(LabelTranslationInterface::class)->cannotBeEmpty()->end()
                                                ->scalarNode('form')->defaultValue(LabelTranslationType::class)->cannotBeEmpty()->end()
                                            ->end()
                                        ->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();
    }
}
