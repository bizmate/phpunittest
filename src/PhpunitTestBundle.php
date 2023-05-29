<?php

/**
 * Created by PhpStorm.
 * User: bizmate
 * Date: 29/03/22
 * Time: 15:23
 */

namespace Bizmate\PhpunitTest;

use Bizmate\Phpunit\DependencyInjection\BizmatePhpunitTestExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class PhpUnitTestBundle
 * @package Bizmate\PhpunitTest
 */
class PhpunitTestBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $this->addRegisterMappingsPass($container);
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
    
    public function getContainerExtension()
    {
        return new BizmatePhpunitTestExtension();
    }

    private function addRegisterMappingsPass(ContainerBuilder $container)
    {

    }
}
