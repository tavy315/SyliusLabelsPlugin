<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\EasyCodingStandard\ValueObject\Option;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->import(__DIR__.'/vendor/symplify/easy-coding-standard/config/set/symfony.php');

    $containerConfigurator->parameters()->set(Option::LINE_ENDING, "\n");
};
