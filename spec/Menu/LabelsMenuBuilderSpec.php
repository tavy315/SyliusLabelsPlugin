<?php

declare(strict_types=1);

namespace spec\Tavy315\SyliusLabelsPlugin\Menu;

use Knp\Menu\ItemInterface;
use PhpSpec\ObjectBehavior;
use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;
use Tavy315\SyliusLabelsPlugin\Menu\LabelsMenuBuilder;

final class LabelsMenuBuilderSpec extends ObjectBehavior
{
    function it_is_initializable(): void
    {
        $this->shouldHaveType(LabelsMenuBuilder::class);
    }

    function it_adds_product_labels_item(
        MenuBuilderEvent $event,
        ItemInterface $mainMenu,
        ItemInterface $marketingMenu,
        ItemInterface $labelsMenu
    ): void {
        $event->getMenu()->willReturn($mainMenu);
        $mainMenu->getChild('marketing')->willReturn($marketingMenu);

        $marketingMenu
            ->addChild('labels', [ 'route' => 'tavy315_sylius_labels_admin_label_index' ])
            ->willReturn($labelsMenu);

        $labelsMenu->setLabel('tavy315_sylius_labels.ui.labels')->willReturn($labelsMenu);
        $labelsMenu->setLabelAttribute('icon', 'tags')->shouldBeCalled();

        $this->addLabelsItem($event);
    }
}
