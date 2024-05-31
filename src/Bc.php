<?php

namespace Tetthys\Bc;

class Bc
{
    public function __construct(public null|string|Bc $num = '0', private int $scale = 0)
    {
    }

    public function scale(int $scale): Bc
    {
        $this->scale = $scale;
        return $this;
    }

    public function num(string|Bc $num): Bc
    {
        $this->num = $num instanceof Bc ? $num->value() : $num;
        return $this;
    }

    public function value(): string
    {
        return $this->num;
    }

    public function add(string|Bc $num): Bc
    {
        return (new Bc(
            bcadd(
                $this->num,
                $num instanceof Bc ? $num->value() : $num,
                $this->scale
            )
        ))->scale($this->scale);
    }

    public function sub(string|Bc $num): Bc
    {
        return (new Bc(
            bcsub(
                $this->num,
                $num instanceof Bc ? $num->value() : $num,
                $this->scale
            )
        ))->scale($this->scale);
    }
}
