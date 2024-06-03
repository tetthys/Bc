<?php

namespace Tetthys\Bc;

class BcFacade
{
    public static function __callStatic($name, $arguments)
    {
        return (new \Tetthys\Bc\Bc)->$name(...$arguments);
    }
}
