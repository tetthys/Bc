<?php

namespace Tetthys\Bc\Validator;

class ScaleValidator
{
    public function __construct()
    {
    }

    public function validate(mixed $scale): mixed
    {
        if ($scale < 0) {
            throw new \Tetthys\Bc\Exceptions\ScaleCannotBeUsedForOperation;
        }
        return $scale;
    }
}
