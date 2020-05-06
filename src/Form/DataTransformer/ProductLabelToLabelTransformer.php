<?php

declare(strict_types=1);

namespace Tavy315\SyliusLabelsPlugin\Form\DataTransformer;

use Sylius\Component\Core\Model\ProductInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Tavy315\SyliusLabelsPlugin\Model\LabelInterface;
use Tavy315\SyliusLabelsPlugin\Model\LabelsAwareInterface;

final class ProductLabelToLabelTransformer implements DataTransformerInterface
{
    /** @var FactoryInterface */
    private $labelFactory;

    /** @var RepositoryInterface */
    private $labelRepository;

    /** @var ProductInterface */
    private $product;

    public function __construct(FactoryInterface $labelFactory, RepositoryInterface $labelRepository, ProductInterface $product)
    {
        $this->labelFactory = $labelFactory;
        $this->labelRepository = $labelRepository;
        $this->product = $product;
    }

    /**
     * {@inheritdoc}
     */
    public function transform($productLabel): ?LabelInterface
    {
        if ($productLabel === null) {
            return null;
        }

        $this->assertTransformationValueType($productLabel, LabelsAwareInterface::class);

        return $productLabel->getLabel();
    }

    /**
     * {@inheritdoc}
     */
    public function reverseTransform($label): ?LabelsAwareInterface
    {
        if ($label === null) {
            return null;
        }

        $this->assertTransformationValueType($label, LabelInterface::class);

        /** @var ProductInterface|null $productLabel */
        $productLabel = $this->labelRepository->findOneBy([ 'label' => $label, 'product' => $this->product ]);

        if ($productLabel === null) {
            /** @var ProductInterface $productLabel */
            $productLabel = $this->labelFactory->createNew();
            $productLabel->setProduct($this->product);
            $productLabel->setLabel($label);
        }

        return $productLabel;
    }

    /**
     * @throws TransformationFailedException
     */
    private function assertTransformationValueType($value, string $expectedType): void
    {
        if (!($value instanceof $expectedType)) {
            throw new TransformationFailedException(
                \sprintf(
                    'Expected "%s", but got "%s"',
                    $expectedType,
                    \is_object($value) ? \get_class($value) : gettype($value)
                )
            );
        }
    }
}
