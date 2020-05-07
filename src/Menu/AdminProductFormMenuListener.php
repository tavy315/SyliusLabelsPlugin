<?php

declare(strict_types=1);

namespace Tavy315\SyliusLabelsPlugin\Menu;

use Sylius\Bundle\AdminBundle\Event\ProductMenuBuilderEvent;
use Symfony\Component\Translation\Translator;

final class AdminProductFormMenuListener
{
    /** @var Translator */
    private $translator;

    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }

    public function addItems(ProductMenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        if ($event->getProduct()->isConfigurable()) {
            return;
        }

        $menu->addChild('label')
             ->setAttribute('template', '@Tavy315SyliusLabelsPlugin/Admin/Product/Tab/_label.html.twig')
             ->setLabel($this->translator->trans('tavy315_sylius_labels.ui.labels'))
             ->setLabelAttribute('icon', 'dollar');
    }
}
