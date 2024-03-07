<?php

namespace Fan2Shrek\BetterMaker\DependencyInjection\Resource;

use Nette\PhpGenerator\PsrPrinter;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $container) {
    $container->services()
        ->set('nette.class_printer', PsrPrinter::class)
            ->public()
    ;
};
