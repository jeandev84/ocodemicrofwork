<?php

require __DIR__ . '/../../../vendor/autoload.php';


use Framework\DependencyInjection\Container;

class ContainerTest extends PHPUnit_Framework_TestCase
{
    protected $container;


    /**
     * Example
     * $ phpunit --colors vendor/janklod/Framework/tests/ContainerTest.php
     * $ phpunit tests/Framework/DependencyInjection/ContainerTest.php
     * @return void
    */
    public function test_something()
    {
         // return $this->assertTrue(true);
    }


    public function setUp()
    {
        $this->container = new Container();
    }


    public function test_containerIsContainer()
    {
        $this->assertInstanceOf(Container::class, $this->container);
    }

    public function test_bindingObjectWorks()
    {
        $this->container->bind('foo', 'Bar');

        $this->assertEquals('Bar', $this->container->getBinding('foo'));
    }

    public function test_returnsNullWhenBindingNotFound()
    {
        $binding = $this->container->getBinding('bar');

        $this->assertNull($binding);
    }

    public function test_resolveClassReturnsObject()
    {
        $object = $this->container->resolve('Bar');

        $this->assertInstanceOf('Bar', $object);
    }


    public function test_arrayAccessWorksAsIntended()
    {
        $this->container['qux'] = 'Bar';

        $object = $this->container['qux'];

        $this->assertInstanceOf('Bar', $object);
    }
}