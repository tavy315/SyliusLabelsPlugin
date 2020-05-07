<?php

declare(strict_types=1);

namespace Tavy315\SyliusLabelsPlugin\Form\Extension;

use Sylius\Bundle\ProductBundle\Form\Type\ProductType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Tavy315\SyliusLabelsPlugin\Form\Type\ProductLabelAutocompleteChoiceType;

final class ProductTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->addEventListener(FormEvents::PRE_SET_DATA, static function (FormEvent $event): void {
            $product = $event->getData();
            $form = $event->getForm();

            $form->add('labels', ProductLabelAutocompleteChoiceType::class, [
                'label' => 'tavy315_sylius_labels.ui.labels',
                'product' => $product,
                'multiple' => true,
            ]);
        });
    }

    public function getExtendedTypes(): iterable
    {
        return [ProductType::class];
    }
}
