<?php

declare(strict_types=1);

namespace Tavy315\SyliusLabelsPlugin\Model;

use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TranslatableInterface;

interface LabelInterface extends ResourceInterface, TranslatableInterface
{
    public function getName(): ?string;

    public function setName(?string $name): void;

    public function getCode(): ?string;

    public function setCode(string $code): void;
}
