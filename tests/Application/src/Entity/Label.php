<?php

declare(strict_types=1);

namespace Tests\Tavy315\SyliusLabelsPlugin\App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Tavy315\SyliusLabelsPlugin\Model\Label as BaseLabel;

/**
 * @ORM\Entity()
 * @ORM\Table(name="tavy315_sylius_product_label")
 */
class Label extends BaseLabel
{
}
