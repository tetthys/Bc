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

    it('supports chain operations', function () {
        $result = (new Bc)->scale(2)->num('1')->add('2')->sub('3')->value();
        expect($result)->toBe('0.00');
    });

    it('add to Bc instance', function () {
        $result = (new Bc('1'))->scale(2)->add('2')->value();
        expect($result)->toBe('3.00');
    });

    it('sub to Bc instance', function () {
        $result = (new Bc('3'))->scale(2)->sub('2')->value();
        expect($result)->toBe('1.00');
    });

    it('supports chain operations to Bc instance', function () {
        $result = (new Bc('1'))->scale(2)->add('2')->sub('3')->value();
        expect($result)->toBe('0.00');
    });

    it('add using Bc instance', function () {
        $result = (new Bc)->scale(2)->num(new Bc('1'))->add(new Bc('2'))->value();
        expect($result)->toBe('3.00');
    });

    it('sub using Bc instance', function () {
        $result = (new Bc)->scale(2)->num(new Bc('3'))->sub(new Bc('2'))->value();
        expect($result)->toBe('1.00');
    });
});
