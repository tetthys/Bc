<?php

namespace Tetthys\Bc;

class BC
{
    public function __construct(public int $scale = 0, public string $num = '0')
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

    public function number(string $num): BC
    {
        return $this->num($num);
    }

    public function add(string $num): string
    {
        return bcadd($this->num, $num, $this->scale);
    }

    public function sub(string $num): string
    {
        return bcsub($this->num, $num, $this->scale);
    }

    public function mul(string $num): string
    {
        return bcmul($this->num, $num, $this->scale);
    }

    public function div(string $num): string
    {
        return bcdiv($this->num, $num, $this->scale);
    }

    public function subtract(string $num): string
    {
        return $this->sub($num);
    }

    public function multiply(string $num): string
    {
        return $this->mul($num);
    }

    public function divide(string $num): string
    {
        return $this->div($num);
    }

    public function isGreaterThan(string $num): bool
    {
        return bccomp($this->num, $num, $this->scale) === 1;
    }

    public function isGreaterThanOrEqualTo(string $num): bool
    {
        return bccomp($this->num, $num, $this->scale) >= 0;
    }

    public function isLessThan(string $num): bool
    {
        return bccomp($this->num, $num, $this->scale) === -1;
    }

    public function isLessThanOrEqualTo(string $num): bool
    {
        return bccomp($this->num, $num, $this->scale) <= 0;
    }

    public function isEqualTo(string $num): bool
    {
        return bccomp($this->num, $num, $this->scale) === 0;
    }

    public function isNotEqualTo(string $num): bool
    {
        return bccomp($this->num, $num, $this->scale) !== 0;
    }

    public function gt(string $num): bool
    {
        return $this->isGreaterThan($num);
    }

    public function gte(string $num): bool
    {
        return $this->isGreaterThanOrEqualTo($num);
    }

    public function lt(string $num): bool
    {
        return $this->isLessThan($num);
    }

    public function lte(string $num): bool
    {
        return $this->isLessThanOrEqualTo($num);
    }
}
