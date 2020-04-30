<?php

declare(strict_types=1);

namespace Tavy315\SyliusLabelsPlugin\Model;

use Sylius\Component\Resource\Model\AbstractTranslation;

class LabelTranslation extends AbstractTranslation implements LabelTranslationInterface
{
    /** @var int */
    protected $id;

    /** @var string|null */
    protected $name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }
}
