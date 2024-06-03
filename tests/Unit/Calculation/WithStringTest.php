<?php

use Tetthys\Bc\Bc;

describe('BcTest', function () {
    it('add', function () {
        $result = (new Bc)->scale(2)->num('1')->add('2')->value();
        expect($result)->toBe('3.00');
    });

    it('sub', function () {
        $result = (new Bc)->scale(2)->num('3')->sub('2')->value();
        expect($result)->toBe('1.00');
    });

    it('mul', function () {
        $result = (new Bc)->scale(2)->num('2')->mul('3')->value();
        expect($result)->toBe('6.00');
    });

    it('div', function () {
        $result = (new Bc)->scale(2)->num('6')->div('3')->value();
        expect($result)->toBe('2.00');
    });

    it('mod', function () {
        $result = (new Bc)->scale(2)->num('6')->mod('4')->value();
        expect($result)->toBe('2.00');
    });

    it('pow', function () {
        $result = (new Bc)->scale(2)->num('2')->pow('3')->value();
        expect($result)->toBe('8.00');
    });

    it('sqrt', function () {
        $result = (new Bc)->scale(2)->num('9')->sqrt()->value();
        expect($result)->toBe('3.00');
    });

    it('supports chain operations', function () {
        $result = (new Bc)->scale(2)->num('1')->add('2')->sub('3')->value();
        expect($result)->toBe('0.00');
    });
});
