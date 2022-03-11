<?php

declare(strict_types=1);

namespace Tests\Tavy315\SyliusLabelsPlugin\App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Product as BaseProduct;
use Tavy315\SyliusLabelsPlugin\Model\LabelsAwareTrait;
use Tavy315\SyliusLabelsPlugin\Model\ProductInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_product")
 */
class Product extends BaseProduct implements ProductInterface
{
    use LabelsAwareTrait {
        LabelsAwareTrait::__construct as private __labelsTraitConstruct;
    }

    public function __construct()
    {
        $this->__labelsTraitConstruct();
        parent::__construct();
    }
}
