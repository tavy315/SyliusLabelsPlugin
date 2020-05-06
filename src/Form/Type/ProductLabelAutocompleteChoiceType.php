<?php

declare(strict_types=1);

namespace Tavy315\SyliusLabelsPlugin\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\DataTransformer\RecursiveTransformer;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceAutocompleteChoiceType;
use Sylius\Component\Core\Model\ProductInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Tavy315\SyliusLabelsPlugin\Form\DataTransformer\ProductLabelToLabelTransformer;
use Tavy315\SyliusLabelsPlugin\Repository\LabelRepositoryInterface;

final class ProductLabelAutocompleteChoiceType extends AbstractType
{
    /** @var FactoryInterface */
    private $labelFactory;

    /** @var RepositoryInterface */
    private $labelRepository;

    public function __construct(FactoryInterface $labelFactory, LabelRepositoryInterface $labelRepository)
    {
        $this->labelFactory = $labelFactory;
        $this->labelRepository = $labelRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
//        if ($options['multiple']) {
//            $builder->addModelTransformer(
//                new RecursiveTransformer(
//                    new ProductLabelToLabelTransformer(
//                        $this->labelFactory,
//                        $this->labelRepository,
//                        $options['product']
//                    )
//                )
//            );
//        }

        if (!$options['multiple']) {
            $builder->addModelTransformer(
                new ProductLabelToLabelTransformer(
                    $this->labelFactory,
                    $this->labelRepository,
                    $options['product']
                )
            );
        }
    }

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
