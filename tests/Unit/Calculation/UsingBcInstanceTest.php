<?php

use Tetthys\Bc\Bc;

describe('UsingBcInstanceTest', function () {
    it('add', function () {
        $result = (new Bc)->scale(2)->num(new Bc('1'))->add(new Bc('2'))->value();
        expect($result)->toBe('3.00');
    });

    it('sub', function () {
        $result = (new Bc)->scale(2)->num(new Bc('3'))->sub(new Bc('2'))->value();
        expect($result)->toBe('1.00');
    });

    it('chains', function () {
        $result = (new Bc)->scale(2)->num(new Bc('1'))->add(new Bc('2'))->sub(new Bc('3'))->value();
        expect($result)->toBe('0.00');
    });
});
