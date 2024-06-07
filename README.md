- [System Requirements](#system-requirements)
- [Bc](#bc)
- [Why Bc?](#why-bc)
- [Usage Examples](#usage-examples)
  - [Calculation](#calculation)
  - [Comparison](#comparison)
- [About `scale` method](#about-scale-method)
- [Supported Calculation Methods](#supported-calculation-methods)
  - [add](#add)
  - [sub](#sub)
  - [mul](#mul)
  - [div](#div)
  - [mod](#mod)
  - [pow](#pow)
  - [sqrt](#sqrt)
- [Supported Comparison Methods](#supported-comparison-methods)
  - [isGreaterThan](#isgreaterthan)
  - [isGreaterThanOrEqual](#isgreaterthanorequal)
  - [isLessThan](#islessthan)
  - [isLessThanOrEqual](#islessthanorequal)
  - [isEqual](#isequal)
  - [isDifferent](#isdifferent)
  - [gt](#gt)
  - [gte](#gte)
  - [lt](#lt)
  - [lte](#lte)
  - [is](#is)
  - [isNot](#isnot)
- [Runtime Exceptions](#runtime-exceptions)
  - [ScaleCannotBeUsedForOperation](#scalecannotbeusedforoperation)
  - [ValueCannotBeUsedForOperation](#valuecannotbeusedforoperation)
- [How to contribute and test in same environment?](#how-to-contribute-and-test-in-same-environment)
    - [docker-compose up](#docker-compose-up)
    - [attach shell to phptestenv container](#attach-shell-to-phptestenv-container)
    - [install dependencies with composer](#install-dependencies-with-composer)
    - [run test](#run-test)

# System Requirements

- php 8.1 or later
- php bcmath extension

# Bc

Bc is a small and simple but accurate tool for calculation. It uses [bcmath](https://www.php.net/manual/en/book.bc.php) functions internally.

You can get the exact result you want.

There are no rounding issues if you have enough memory.

It's like calculating to N digits using a pen and paper with your hands.

# Why Bc?

Do you think below test will pass?

```php
it('shows that 0.1 + 0.2 = 0.3', function () {
    expect(0.1 + 0.2)->toBe(0.3);
});
```

**Unfortunately, 0.1 + 0.2 is not 0.3 in php**

It fails for the following reason:

> Failed asserting that 0.30000000000000004 is identical to 0.3.

That's why I made this.

# Usage Examples

## Calculation

After giving a scale value, you can calculate in order.

```php
(new Bc)->scale(2)->num('1')->add('2')->mul('3')->value(); // '9.00'
```

It also can be used like below:

```php
(new Bc('1'))->add(new Bc('2'))->mul(new Bc('3'))->value(); // '9'
```

```php
(new Bc)->scale(2)->num((new Bc('1')))->add(new Bc('2'))->mul(new Bc('3'))->value(); // '9.00'
```

## Comparison

After giving a scale value, you can compare.

```php
// true for '10.00' > '1.00'
(new Bc)->scale(2)->num('10')
    ->isGreaterThan('1');
```

It also can be used like below:

```php
// true for '30.00' > '3.00'
(new Bc)->scale(2)->num('10')->add('20')
    ->isGreaterThan((new Bc)->scale(2)->num('1')->add('2'));
```

# About `scale` method

It specifies a scale value to be passed on to a next operation. The default value is 0.

```php
(new Bc)->num('1')->add('2')->value(); // '3'
```

It supports chaining:

```php
// With scale 0, '1' + '2' = '3'
// With scale 2, '3' * '3' = '9.00'
(new Bc)->num('1')->add('2')->scale(2)->mul('3')->value(); // '9.00'
```

# Supported Calculation Methods

Calculation methods expect `string` or `Bc` instance. And they always return `Bc` instance.

## add

It adds a number

```php
(new Bc)->num('1')->add('2')->value(); // '3'
```

## sub

It subtracts a number

```php
(new Bc)->num('2')->sub('1')->value(); // '1'
```

## mul

It multiplies a number

```php
(new Bc)->num('2')->mul('3')->value(); // '6'
```

## div

It divides a number

```php
(new Bc)->num('6')->div('3')->value(); // '2'
```

## mod

It calculates the modulus of a number

```php
(new Bc)->num('10')->mod('7')->value(); // '3'
```

## pow

It calculates the power of a number

```php
(new Bc)->num('2')->pow('3')->value(); // '8'
```

## sqrt

It calculates the square root of a number

```php
(new Bc)->num('9')->sqrt()->value(); // '3'
```

# Supported Comparison Methods

## isGreaterThan

It checks if a number is greater than another number

```php
(new Bc)->num('10')->isGreaterThan('1'); // true
```

## isGreaterThanOrEqual

It checks if a number is greater than or equal to another number

```php
(new Bc)->num('10')->isGreaterThanOrEqual('10'); // true
```

## isLessThan

It checks if a number is less than another number

```php
(new Bc)->num('1')->isLessThan('10'); // true
```

## isLessThanOrEqual

It checks if a number is less than or equal to another number

```php
(new Bc)->num('10')->isLessThanOrEqual('10'); // true
```

## isEqual

It checks if a number is equal to another number

```php
(new Bc)->num('10')->isEqual('10'); // true
```

## isDifferent

It checks if a number is different from another number

```php
(new Bc)->num('10')->isDifferent('1'); // true
```

## gt

Same as `isGreaterThan`

```php
(new Bc)->num('10')->gt('1'); // true
```

## gte

Same as `isGreaterThanOrEqual`

```php
(new Bc)->num('10')->gte('10'); // true
```

## lt

Same as `isLessThan`

```php
(new Bc)->num('1')->lt('10'); // true
```

## lte

Same as `isLessThanOrEqual`

```php
(new Bc)->num('10')->lte('10'); // true
```

## is

Same as `isEqual`

```php
(new Bc)->num('10')->is('10'); // true
```

## isNot

Same as `isDifferent`

```php
(new Bc)->num('10')->isNot('1'); // true
```

# Runtime Exceptions

## ScaleCannotBeUsedForOperation

```php
throw new \Tetthys\Bc\Exceptions\ScaleCannotBeUsedForOperation;
```

This is thrown when scale is less than 0.

## ValueCannotBeUsedForOperation

```php
throw new \Tetthys\Bc\Exceptions\ValueCannotBeUsedForOperation;
```

This is thrown when value is not a number.

# How to contribute and test in same environment?

### docker-compose up

```
docker-compose up
```

### attach shell to phptestenv container

```
bash ./run/shell/phptestenv.sh
```

### install dependencies with composer

```
composer install
```

### run test

```
./vendor/bin/pest
```

Or, you can run test from host OS using

```
bash ./run/test.sh
```