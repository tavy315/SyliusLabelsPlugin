<?php

declare(strict_types=1);

namespace Tavy315\SyliusLabelsPlugin\Model;

use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TranslationInterface;

interface LabelTranslationInterface extends ResourceInterface, TranslationInterface
{
    public function getName(): ?string;

    public function setName(string $name): void;
}
