<?php

declare(strict_types=1);

namespace Tavy315\SyliusLabelsPlugin\Model;

use Sylius\Component\Core\Model\ProductInterface as BaseProductInterface;

interface ProductInterface extends BaseProductInterface, LabelsAwareInterface
{
}
