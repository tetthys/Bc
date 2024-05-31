<?php

use Tetthys\Bc\Facade\Bc;

describe('BcTest', function () {
    it('add', function () {
        $result = Bc::scale(2)->num('1')->add('2')->value();
        expect($result)->toBe('3.00');
    });

    it('sub', function () {
        $result = Bc::scale(2)->num('3')->sub('2')->value();
        expect($result)->toBe('1.00');
    });

    it('supports chain operations', function () {
        $result = Bc::scale(2)->num('1')->add('2')->sub('3')->value();
        expect($result)->toBe('0.00');
    });

    it('add to Bc instance', function () {
        $result = Bc::num('1')->scale(2)->add('2')->value();
        expect($result)->toBe('3.00');
    });

    it('sub to Bc instance', function () {
        $result = Bc::num('3')->scale(2)->sub('2')->value();
        expect($result)->toBe('1.00');
    });

    it('supports chain operations to Bc instance', function () {
        $result = Bc::num('1')->scale(2)->add('2')->sub('3')->value();
        expect($result)->toBe('0.00');
    });

    it('add using Bc instance', function () {
        $result = Bc::scale(2)->num(Bc::num('1'))->add(Bc::num('2'))->value();
        expect($result)->toBe('3.00');
    });

    it('sub using Bc instance', function () {
        $result = Bc::scale(2)->num(Bc::num('3'))->sub(Bc::num('2'))->value();
        expect($result)->toBe('1.00');
    });
});
