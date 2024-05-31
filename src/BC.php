<?php

namespace Tetthys\Bc;

class BC
{
    public function __construct(public null|string|BC $num = '0', private int $scale = 0)
    {
    }

    public function scale(int $scale): BC
    {
        $this->scale = $scale;
        return $this;
    }

    public function num(string|BC $num): BC
    {
        $this->num = $num instanceof BC ? $num->value() : $num;
        return $this;
    }

    public function value(): string
    {
        return $this->num;
    }

    public function add(string|BC $num): BC
    {
        return (new BC(
            bcadd(
                $this->num,
                $num instanceof BC ? $num->value() : $num,
                $this->scale
            )
        ))->scale($this->scale);
    }

    public function sub(string|BC $num): BC
    {
        return (new BC(
            bcsub(
                $this->num,
                $num instanceof BC ? $num->value() : $num,
                $this->scale
            )
        ))->scale($this->scale);
    }
}
