<?php

namespace Tetthys\Bc\Exceptions;

use Exception;

class ValueCannotBeUsedForOperation extends Exception
{
    public function __construct()
    {
        parent::__construct('Value cannot be used for operation');
    }
}
