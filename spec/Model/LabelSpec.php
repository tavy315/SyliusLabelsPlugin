<?php

declare(strict_types=1);

namespace spec\Tavy315\SyliusLabelsPlugin\Model;

use PhpSpec\ObjectBehavior;
use Tavy315\SyliusLabelsPlugin\Model\Label;
use Tavy315\SyliusLabelsPlugin\Model\LabelInterface;

final class LabelSpec extends ObjectBehavior
{
    function it_is_initializable(): void
    {
        $this->shouldHaveType(Label::class);
    }

    function it_implements_product_label_interface(): void
    {
        $this->shouldHaveType(LabelInterface::class);
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

    function its_code_is_mutable(): void
    {
        $this->setCode('winter_sale');
        $this->getCode()->shouldReturn('winter_sale');
    }
}
