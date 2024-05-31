<?php

use Tetthys\Bc\BC;

describe('BCTest', function () {
    it('add', function () {
        $result = (new BC)->scale(2)->num('1')->add('2')->value();
        expect($result)->toBe('3.00');
    });

    it('sub', function () {
        $result = (new BC)->scale(2)->num('3')->sub('2')->value();
        expect($result)->toBe('1.00');
    });

    it('supports chain operations', function () {
        $result = (new BC)->scale(2)->num('1')->add('2')->sub('3')->value();
        expect($result)->toBe('0.00');
    });

    it('add to BC instance', function () {
        $result = (new BC('1'))->scale(2)->add('2')->value();
        expect($result)->toBe('3.00');
    });

    it('sub to BC instance', function () {
        $result = (new BC('3'))->scale(2)->sub('2')->value();
        expect($result)->toBe('1.00');
    });

    it('supports chain operations to BC instance', function () {
        $result = (new BC('1'))->scale(2)->add('2')->sub('3')->value();
        expect($result)->toBe('0.00');
    });
});
