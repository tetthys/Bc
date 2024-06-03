<?php

namespace Tetthys\Bc;

class Bc
{
    public function __construct(private string|Bc $num = '0', private int $scale = 0)
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

    public function mul(string|Bc $num): Bc
    {
        return (new Bc(
            bcmul(
                $this->num,
                $num instanceof Bc ? $num->value() : $num,
                $this->scale
            )
        ))->scale($this->scale);
    }

    public function div(string|Bc $num): Bc
    {
        return (new Bc(
            bcdiv(
                $this->num,
                $num instanceof Bc ? $num->value() : $num,
                $this->scale
            )
        ))->scale($this->scale);
    }

    public function mod(string|Bc $num): Bc
    {
        return (new Bc(
            bcmod(
                $this->num,
                $num instanceof Bc ? $num->value() : $num,
                $this->scale
            )
        ))->scale($this->scale);
    }

    public function pow(string|Bc $num): Bc
    {
        return (new Bc(
            bcpow(
                $this->num,
                $num instanceof Bc ? $num->value() : $num,
                $this->scale
            )
        ))->scale($this->scale);
    }

    public function sqrt(): Bc
    {
        return (new Bc(
            bcsqrt(
                $this->num,
                $this->scale
            )
        ))->scale($this->scale);
    }

    public function isGreaterThan(string|Bc $num): bool
    {
        return bccomp(
            $this->num,
            $num instanceof Bc ? $num->value() : $num,
            $this->scale
        ) === 1;
    }

    public function isGreaterThanOrEqual(string|Bc $num): bool
    {
        return bccomp(
            $this->num,
            $num instanceof Bc ? $num->value() : $num,
            $this->scale
        ) >= 0;
    }

    public function isLessThan(string|Bc $num): bool
    {
        return bccomp(
            $this->num,
            $num instanceof Bc ? $num->value() : $num,
            $this->scale
        ) === -1;
    }

    public function isLessThanOrEqual(string|Bc $num): bool
    {
        return bccomp(
            $this->num,
            $num instanceof Bc ? $num->value() : $num,
            $this->scale
        ) <= 0;
    }

    public function isEqual(string|Bc $num): bool
    {
        return bccomp(
            $this->num,
            $num instanceof Bc ? $num->value() : $num,
            $this->scale
        ) === 0;
    }

    public function isDifferent(string|Bc $num): bool
    {
        return bccomp(
            $this->num,
            $num instanceof Bc ? $num->value() : $num,
            $this->scale
        ) !== 0;
    }

    public function gt(string|Bc $num): bool
    {
        return $this->isGreaterThan($num);
    }

    public function gte(string|Bc $num): bool
    {
        return $this->isGreaterThanOrEqual($num);
    }

    public function lt(string|Bc $num): bool
    {
        return $this->isLessThan($num);
    }

    public function lte(string|Bc $num): bool
    {
        return $this->isLessThanOrEqual($num);
    }

    public function is(string|Bc $num): bool
    {
        return $this->isEqual($num);
    }

    public function isNot(string|Bc $num): bool
    {
        return $this->isDifferent($num);
    }
}
