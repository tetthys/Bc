<?php

use Tetthys\Bc\Bc;

describe('WithBc', function () {
    it('add from Bc instance', function () {
        $result = (new Bc('1'))->scale(2)->add('2')->value();
        expect($result)->toBe('3.00');
    });

    it('sub from Bc instance', function () {
        $result = (new Bc('3'))->scale(2)->sub('2')->value();
        expect($result)->toBe('1.00');
    });

    it('supports chain operations from Bc instance', function () {
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

    it('supports chain operations using Bc instance', function () {
        $result = (new Bc)->scale(2)->num(new Bc('1'))->add(new Bc('2'))->sub(new Bc('3'))->value();
        expect($result)->toBe('0.00');
    });
});
