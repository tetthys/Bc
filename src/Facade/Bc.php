<?php

namespace Tetthys\Bc\Facade;

class Bc
{
    public static function __callStatic($name, $arguments)
    {
        return (new \Tetthys\Bc\Bc)->$name(...$arguments);
    }
}
