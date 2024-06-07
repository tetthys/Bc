<?php

namespace Tetthys\Bc\Exceptions;

use Exception;

class ScaleCannotBeUsedForOperation extends Exception
{
    public function __construct()
    {
        parent::__construct('Scale cannot be used for operation');
    }
}
