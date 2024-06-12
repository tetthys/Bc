<?php

use Tetthys\Bc\Bc;

describe('FromBcInstanceTest', function () {
    it('add', function () {
        $result = (new Bc('1'))->scale(2)->add('2')->value();
        expect($result)->toBe('3.00');
    });

    it('sub', function () {
        $result = (new Bc('3'))->scale(2)->sub('2')->value();
        expect($result)->toBe('1.00');
    });

    it('chains', function () {
        $result = (new Bc('1'))->scale(2)->add('2')->sub('3')->value();
        expect($result)->toBe('0.00');
    });
});
