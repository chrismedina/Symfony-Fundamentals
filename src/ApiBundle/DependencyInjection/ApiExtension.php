<?php
/**
 * Created by PhpStorm.
 * User: Godspleb
 * Date: 4/1/2019
 * Time: 4:18 AM
 */

namespace ApiBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

class ApiExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../Resources/config')
        );
        $loader->load('routing.yml');
        $loader->load('security.yml');
        $loader->load('services.yml');
    }

}