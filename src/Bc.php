<?php

namespace Tetthys\Bc;

use Tetthys\Bc\Validator\ScaleValidator;
use Tetthys\Bc\Validator\ValueValidator;

class Bc
{
    private int $scale = 0;
    private ScaleValidator $scaleValidator;
    private ValueValidator $valueValidator;

    public function __construct(
        private string|Bc $num = '0'
    ) {
        $this->scaleValidator = new ScaleValidator();
        $this->valueValidator = new ValueValidator();
        $this->num = $this->getValue($num);
    }

    /**
     * It specifies a scale value to be passed on to a next operation. The default value is 0.
     *
     * @param integer $scale
     * @return Bc
     * @throws \Tetthys\Bc\Exceptions\ScaleCannotBeUsedForOperation
     */
    public function scale(int $scale): Bc
    {
        $this->scale = $this->scaleValidator->validate($scale);
        return $this;
    }

    /**
     * It gets the value of the parameter.
     *
     * @param mixed $num
     * @return string
     * @throws \Tetthys\Bc\Exceptions\ValueCannotBeUsedForOperation
     */
    private function getValue(mixed $num): string
    {
        return $this->valueValidator->validate($num instanceof Bc ? $num->value() : $num);
    }

    /**
     * It specifies a number at which the calculation begins.
     *
     * @param string|Bc $num
     * @return Bc
     * @throws \Tetthys\Bc\Exceptions\ValueCannotBeUsedForOperation
     */
    public function num(string|Bc $num): Bc
    {
        $this->num = $this->getValue($num);
        return $this;
    }

    public function value(): string
    {
        return $this->num;
    }

    /**
     * It adds a number
     *
     * @param string|Bc $num
     * @return Bc
     * @throws \Tetthys\Bc\Exceptions\ValueCannotBeUsedForOperation
     */
    public function add(string|Bc $num): Bc
    {
        return (new Bc(
            bcadd(
                $this->num,
                $this->getValue($num),
                $this->scale
            )
        ))->scale($this->scale);
    }

    /**
     * It subtracts a number
     *
     * @param string|Bc $num
     * @return Bc
     * @throws \Tetthys\Bc\Exceptions\ValueCannotBeUsedForOperation
     */
    public function sub(string|Bc $num): Bc
    {
        return (new Bc(
            bcsub(
                $this->num,
                $this->getValue($num),
                $this->scale
            )
        ))->scale($this->scale);
    }

    /**
     * It multiplies a number
     *
     * @param string|Bc $num
     * @return Bc
     * @throws \Tetthys\Bc\Exceptions\ValueCannotBeUsedForOperation
     */
    public function mul(string|Bc $num): Bc
    {
        return (new Bc(
            bcmul(
                $this->num,
                $this->getValue($num),
                $this->scale
            )
        ))->scale($this->scale);
    }

    /**
     * It divides a number
     *
     * @param string|Bc $num
     * @return Bc
     * @throws \Tetthys\Bc\Exceptions\ValueCannotBeUsedForOperation
     */
    public function div(string|Bc $num): Bc
    {
        return (new Bc(
            bcdiv(
                $this->num,
                $this->getValue($num),
                $this->scale
            )
        ))->scale($this->scale);
    }

    /**
     * It calculates the modulus of a number
     *
     * @param string|Bc $num
     * @return Bc
     * @throws \Tetthys\Bc\Exceptions\ValueCannotBeUsedForOperation
     */
    public function mod(string|Bc $num): Bc
    {
        return (new Bc(
            bcmod(
                $this->num,
                $this->getValue($num),
                $this->scale
            )
        ))->scale($this->scale);
    }

    /**
     * It calculates the power of a number
     *
     * @param string|Bc $num
     * @return Bc
     * @throws \Tetthys\Bc\Exceptions\ValueCannotBeUsedForOperation
     */
    public function pow(string|Bc $num): Bc
    {
        return (new Bc(
            bcpow(
                $this->num,
                $this->getValue($num),
                $this->scale
            )
        ))->scale($this->scale);
    }

    /**
     * It calculates the square root of a number
     *
     * @return Bc
     */
    public function sqrt(): Bc
    {
        return (new Bc(
            bcsqrt(
                $this->num,
                $this->scale
            )
        ))->scale($this->scale);
    }

    /**
     * It checks if a number is greater than another number
     *
     * @param string|Bc $num
     * @return boolean
     * @throws \Tetthys\Bc\Exceptions\ValueCannotBeUsedForOperation
     */
    public function isGreaterThan(string|Bc $num): bool
    {
        return bccomp(
            $this->num,
            $this->getValue($num),
            $this->scale
        ) === 1;
    }

    /**
     * It checks if a number is greater than or equal to another number
     *
     * @param string|Bc $num
     * @return boolean
     * @throws \Tetthys\Bc\Exceptions\ValueCannotBeUsedForOperation
     */
    public function isGreaterThanOrEqual(string|Bc $num): bool
    {
        return bccomp(
            $this->num,
            $this->getValue($num),
            $this->scale
        ) >= 0;
    }

    /**
     * It checks if a number is less than another number
     *
     * @param string|Bc $num
     * @return boolean
     * @throws \Tetthys\Bc\Exceptions\ValueCannotBeUsedForOperation
     */
    public function isLessThan(string|Bc $num): bool
    {
        return bccomp(
            $this->num,
            $this->getValue($num),
            $this->scale
        ) === -1;
    }

    /**
     * It checks if a number is less than or equal to another number
     *
     * @param string|Bc $num
     * @return boolean
     * @throws \Tetthys\Bc\Exceptions\ValueCannotBeUsedForOperation
     */
    public function isLessThanOrEqual(string|Bc $num): bool
    {
        return bccomp(
            $this->num,
            $this->getValue($num),
            $this->scale
        ) <= 0;
    }

    /**
     * It checks if a number is equal to another number
     *
     * @param string|Bc $num
     * @return boolean
     * @throws \Tetthys\Bc\Exceptions\ValueCannotBeUsedForOperation
     */
    public function isEqual(string|Bc $num): bool
    {
        return bccomp(
            $this->num,
            $this->getValue($num),
            $this->scale
        ) === 0;
    }

    /**
     * It checks if a number is different from another number
     *
     * @param string|Bc $num
     * @return boolean
     * @throws \Tetthys\Bc\Exceptions\ValueCannotBeUsedForOperation
     */
    public function isDifferent(string|Bc $num): bool
    {
        return bccomp(
            $this->num,
            $this->getValue($num),
            $this->scale
        ) !== 0;
    }

    /**
     * Same as isGreaterThan
     *
     * @param string|Bc $num
     * @return boolean
     * @throws \Tetthys\Bc\Exceptions\ValueCannotBeUsedForOperation
     */
    public function gt(string|Bc $num): bool
    {
        return $this->isGreaterThan($num);
    }

    /**
     * Same as isGreaterThanOrEqual
     *
     * @param string|Bc $num
     * @return boolean
     * @throws \Tetthys\Bc\Exceptions\ValueCannotBeUsedForOperation
     */
    public function gte(string|Bc $num): bool
    {
        return $this->isGreaterThanOrEqual($num);
    }

    /**
     * Same as isLessThan
     *
     * @param string|Bc $num
     * @return boolean
     * @throws \Tetthys\Bc\Exceptions\ValueCannotBeUsedForOperation
     */
    public function lt(string|Bc $num): bool
    {
        return $this->isLessThan($num);
    }

    /**
     * Same as isLessThanOrEqual
     *
     * @param string|Bc $num
     * @return boolean
     * @throws \Tetthys\Bc\Exceptions\ValueCannotBeUsedForOperation
     */
    public function lte(string|Bc $num): bool
    {
        return $this->isLessThanOrEqual($num);
    }

    /**
     * Same as isEqual
     *
     * @param string|Bc $num
     * @return boolean
     * @throws \Tetthys\Bc\Exceptions\ValueCannotBeUsedForOperation
     */
    public function is(string|Bc $num): bool
    {
        return $this->isEqual($num);
    }

    /**
     * Same as isDifferent
     *
     * @param string|Bc $num
     * @return boolean
     * @throws \Tetthys\Bc\Exceptions\ValueCannotBeUsedForOperation
     */
    public function isNot(string|Bc $num): bool
    {
        return $this->isDifferent($num);
    }
}
