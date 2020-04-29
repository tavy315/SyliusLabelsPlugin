<?php

declare(strict_types=1);

namespace Tavy315\SyliusLabelsPlugin\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

trait LabelsAwareTrait
{
    /**
     * @var Collection|LabelInterface[]
     *
     * @ORM\ManyToMany(targetEntity="\Tavy315\SyliusLabelsPlugin\Model\LabelInterface")
     * @ORM\JoinTable(
     *     name="tavy315_sylius_product_labels",
     *     joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="label_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")}
     * )
     */
    protected $labels;

    public function __construct()
    {
        $this->labels = new ArrayCollection();
    }

    public function addLabel(LabelInterface $label): void
    {
        if (!$this->hasLabel($label)) {
            $this->labels->add($label);
        }
    }

    public function getLabels(): Collection
    {
        return $this->labels;
    }

    public function hasLabel(LabelInterface $label): bool
    {
        return $this->labels->contains($label);
    }

    public function removeLabel(LabelInterface $label): void
    {
        if ($this->hasLabel($label)) {
            $this->labels->removeElement($label);
        }
    }

    public function setLabels(iterable $labels): void
    {
        $this->labels->clear();

        foreach ($labels as $label) {
            $this->addLabel($label);
        }
    }
}
