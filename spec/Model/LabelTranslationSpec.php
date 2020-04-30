<?php

declare(strict_types=1);

namespace spec\Tavy315\SyliusLabelsPlugin\Model;

use PhpSpec\ObjectBehavior;
use Tavy315\SyliusLabelsPlugin\Model\LabelTranslation;
use Tavy315\SyliusLabelsPlugin\Model\LabelTranslationInterface;

final class LabelTranslationSpec extends ObjectBehavior
{
    function it_is_initializable(): void
    {
        $this->shouldHaveType(LabelTranslation::class);
    }

    function it_implements_product_label_translation_interface(): void
    {
        $this->shouldHaveType(LabelTranslationInterface::class);
    }

    function it_has_no_id_by_default(): void
    {
        $this->getId()->shouldReturn(null);
    }

    function its_name_is_mutable(): void
    {
        $this->setName('product label');
        $this->getName()->shouldReturn('product label');
    }
}
