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
});
