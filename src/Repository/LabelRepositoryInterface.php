<?php

declare(strict_types=1);

namespace Tavy315\SyliusLabelsPlugin\Repository;

use Sylius\Component\Resource\Repository\RepositoryInterface;

interface LabelRepositoryInterface extends RepositoryInterface
{
    public function findAllWithTranslation(?string $labelCode): array;
}
