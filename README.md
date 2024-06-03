# Bc

Bc is a minimal and accurate tool for calculation. It uses bcmath functions internally.

# Why Bc?

Do you think below test will pass?

```php
it('0.1 + 0.2 = 0.3', function () {
    expect(0.1 + 0.2)->toBe(0.3);
});
```

**Unfortunately, 0.1 + 0.2 is not 0.3 in php!**

It fails for the following reason:

> Failed asserting that 0.30000000000000004 is identical to 0.3.

That's why I developed this.

# Usage Examples

```php
(new Bc)->scale(2)->num('1')->add('2')->value(); // 3.00

(new Bc)->scale(2)->num('10')->isGreaterThan('1'); // true
```

# Supported Calculation Methods

Calculation methods expect `string` or `Bc` instance. And they always return `Bc` instance.

## add

## sub

## mul

## div

## mod

## pow

## sqrt

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