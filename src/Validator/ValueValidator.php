<?php

namespace Tetthys\Bc\Validator;

class ValueValidator
{
    public function __construct()
    {
    }

    public function validate(mixed $value): mixed
    {
        if (!is_numeric($value)) {
            throw new \Tetthys\Bc\Exceptions\ValueCannotBeUsedForOperation();
        }
        return $value;
    }
}
