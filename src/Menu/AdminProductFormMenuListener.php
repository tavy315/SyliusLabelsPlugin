<?php

declare(strict_types=1);

namespace Tavy315\SyliusLabelsPlugin\Menu;

use Sylius\Bundle\AdminBundle\Event\ProductMenuBuilderEvent;

final class AdminProductFormMenuListener
{
    public function addItems(ProductMenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        if ($event->getProduct()->isConfigurable()) {
            return;
        }

        $menu->addChild('label')
             ->setAttribute('template', '@Tavy315SyliusLabelsPlugin/Admin/Product/Tab/_label.html.twig')
             ->setLabel('tavy315_sylius_labels.ui.labels')
             ->setLabelAttribute('icon', 'dollar');
    }
}
