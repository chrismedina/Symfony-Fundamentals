<?php

namespace ApiBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class ApiBundle extends Bundle
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new PhpFileLoader (
            $container,
            new FileLocator(__DIR__.'/Resources/config')
        );
        $loader->load('services.xml');
    }
}
