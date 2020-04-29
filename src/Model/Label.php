<?php

declare(strict_types=1);

namespace Tavy315\SyliusLabelsPlugin\Model;

use Sylius\Component\Resource\Model\TranslatableTrait;

class Label implements LabelInterface
{
    use TranslatableTrait {
        __construct as protected initializeTranslationsCollection;
    }

    /** @var int */
    protected $id;

    /** @var string */
    protected $code;

    public function __construct()
    {
        $this->initializeTranslationsCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->getLabelTranslation()->getName();
    }

    public function setName(?string $name): void
    {
        $this->getLabelTranslation()->setName($name);
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    protected function getLabelTranslation(): LabelTranslationInterface
    {
        /** @var LabelTranslationInterface $translation */
        $translation = $this->getTranslation();

        return $translation;
    }

    protected function createTranslation(): LabelTranslationInterface
    {
        return new LabelTranslation();
    }
}
