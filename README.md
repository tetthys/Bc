# Bc

Bc is a minimal and accurate tool for calculation. It uses bcmath functions internally.

You can get the exact result you want. There are no rounding issue. It's like calculating to N digits using a pen and paper.

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

That's why I developed this.

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

(new Bc)->scale(2)->num('10')->isGreaterThan('1');
```

It also can be used like below:

```php
// true for '30.00' > '3.00'

(new Bc)->scale(2)->num('10')->add('20')->isGreaterThan((new Bc)->scale(2)->num('1')->add('2'));
```

# About `scale` method

It specifies a scale value to be passed on to a next operation. The default value is 0.

```php
(new Bc)->num('1')->add('2')->value(); // '3'
```

It supports chaining:

```php
// with scale 0, '1' + '2' = '3'
// then scale 2, '3' * '3' = '9.00'
(new Bc)->num('1')->add('2')->scale(2)->mul('3')->value();
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

## isGreaterThanOrEqual

## isLessThan

## isLessThanOrEqual

## isEqual

## isDifferent

## gt

## gte

## lt

## lte

## is

## isNot

# How to contribute and test in same environment?

### docker-compose up and attach shell to container

```
docker-compose up && bash ./run/shell/phptestenv.sh
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