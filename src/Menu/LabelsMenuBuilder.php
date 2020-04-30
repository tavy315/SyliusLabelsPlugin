<?php

declare(strict_types=1);

namespace Tavy315\SyliusLabelsPlugin\Menu;

use Knp\Menu\ItemInterface;
use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class LabelsMenuBuilder
{
    public function addLabelsItem(MenuBuilderEvent $event): void
    {
        /** @var ItemInterface $marketingMenu */
        $marketingMenu = $event->getMenu()->getChild('marketing');

        $marketingMenu
            ->addChild('labels', [ 'route' => 'tavy315_sylius_labels_admin_label_index' ])
            ->setLabel('tavy315_sylius_labels.ui.labels')
            ->setLabelAttribute('icon', 'tags');
    }
}
