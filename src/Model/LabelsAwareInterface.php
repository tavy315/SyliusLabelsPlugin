<?php

declare(strict_types=1);

namespace Tavy315\SyliusLabelsPlugin\Model;

use Doctrine\Common\Collections\Collection;

interface LabelsAwareInterface
{
    public function addLabel(LabelInterface $label): void;

    /**
     * @return Collection|LabelInterface[]
     */
    public function getLabels(): Collection;

    public function hasLabel(LabelInterface $label): bool;

    public function removeLabel(LabelInterface $label): void;

    public function setLabels(iterable $label): void;
}
