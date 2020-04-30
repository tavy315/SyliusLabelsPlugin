<?php

declare(strict_types=1);

namespace Tavy315\SyliusLabelsPlugin\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceTranslationsType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Tavy315\SyliusLabelsPlugin\Form\Type\Translation\LabelTranslationType;

final class LabelType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('code', TextType::class, [
                'disabled' => $builder->getData()->getCode() !== null,
                'label'    => 'tavy315_sylius_labels.ui.code',
            ])
            ->add('translations', ResourceTranslationsType::class, [
                'entry_type' => LabelTranslationType::class,
                'label'      => 'tavy315_sylius_labels.ui.name',
            ]);
    }
}
