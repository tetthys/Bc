<?php

use Tetthys\Bc\BC;

describe('BCTest', function () {
    it('add', function () {
        $result = (new BC)->scale(2)->num('1')->add('2');
        expect($result)->toBe('3.00');
    });
    it('sub', function () {
        $result = (new BC)->scale(2)->num('1')->sub('2');
        expect($result)->toBe('-1.00');
    });
    it('mul', function () {
        $result = (new BC)->scale(2)->num('1')->mul('2');
        expect($result)->toBe('2.00');
    });
    it('div', function () {
        $result = (new BC)->scale(2)->num('1')->div('2');
        expect($result)->toBe('0.50');
    });

    it('isGreaterThan', function () {
        $result = (new BC)->scale(0)->num('2')->isGreaterThan('1');
        expect($result)->toBeTrue();
    });

    it('isGreaterThanOrEqualTo', function () {
        $result = (new BC)->scale(0)->num('2')->isGreaterThanOrEqualTo('2');
        expect($result)->toBeTrue();
    });

    it('isLessThan', function () {
        $result = (new BC)->scale(0)->num('1')->isLessThan('2');
        expect($result)->toBeTrue();
    });

    it('isLessThanOrEqualTo', function () {
        $result = (new BC)->scale(0)->num('1')->isLessThanOrEqualTo('1');
        expect($result)->toBeTrue();
    });

    it('isEqualTo', function () {
        $result = (new BC)->scale(0)->num('1')->isEqualTo('1');
        expect($result)->toBeTrue();
    });

    it('isNotEqualTo', function () {
        $result = (new BC)->scale(0)->num('1')->isNotEqualTo('2');
        expect($result)->toBeTrue();
    });
});
