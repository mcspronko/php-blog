<?php

declare(strict_types=1);

namespace Blog\Test\Integration;


use DI\Container;

class ContainerProvider
{
    private static Container $container;

    /**
     * @return Container
     */
    public static function getContainer(): Container
    {
        return self::$container;
    }

    /**
     * @param Container $container
     */
    public static function setContainer(Container $container): void
    {
        self::$container = $container;
    }
}
