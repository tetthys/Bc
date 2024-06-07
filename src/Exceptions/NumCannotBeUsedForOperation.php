<?php

namespace Tetthys\Bc\Exceptions;

use Exception;

class NumCannotBeUsedForOperation extends Exception
{
    public function __construct()
    {
        parent::__construct('Num cannot be used for operation');
    }
}
