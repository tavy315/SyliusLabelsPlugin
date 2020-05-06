<?php

declare(strict_types=1);

namespace Tavy315\SyliusLabelsPlugin\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\ResourceAutocompleteChoiceType;
use Sylius\Component\Core\Model\ProductInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class ProductLabelAutocompleteChoiceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'resource'     => 'tavy315_sylius_labels.label',
            'choice_name'  => 'name',
            'choice_value' => 'code',
        ]);

        $resolver->setRequired('product')
                 ->setAllowedTypes('product', ProductInterface::class);
    }

    /**
     * {@inheritdoc}
     */
    public function getParent(): string
    {
        return ResourceAutocompleteChoiceType::class;
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix(): string
    {
        return 'tavy315_sylius_product_label_autocomplete_choice';
    }
}
