<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function (ContainerConfigurator $configurator) {
    $services = $configurator->services()->defaults()
                             ->autowire(true);

    $services->instanceof(\Symfony\Component\Console\Command\Command::class)
             ->tag('app.command');

    $services->load('App\\', '../src/*');

    $services->set(\App\App::class)
             ->public()
             ->args([tagged_iterator('app.command')]);
};
