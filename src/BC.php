<?php

namespace Tetthys\Bc;

class BC
{
    public function __construct(public ?string $num = '0', private int $scale = 0)
    {
    }

    public function scale(int $scale): BC
    {
        $this->scale = $scale;
        return $this;
    }

    public function num(string $num): BC
    {
        $this->num = $num;
        return $this;
    }

    public function value(): string
    {
        return $this->num;
    }

    public function add(string $num): BC
    {
        return (new BC(bcadd($this->num, $num, $this->scale)))->scale($this->scale);
    }

    public function sub(string $num): BC
    {
        return (new BC(bcsub($this->num, $num, $this->scale)))->scale($this->scale);
    }
}
