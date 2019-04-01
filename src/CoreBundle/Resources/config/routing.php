<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('core_homepage', new Route('/', array(
    '_controller' => 'CoreBundle:Default:index',
)));

return $collection;
