<?php

use Tetthys\Bc\Bc;

describe('ScaleTest', function () {
    it('uses the default scale value of 0', function () {
        $result = (new Bc)->num('1')->add('2')->value();
        expect($result)->toBe('3');
    });

    it('chains', function () {
        $result = (new Bc)->num('1')->add('2')->scale(2)->mul('3')->value();
        expect($result)->toBe('9.00');
    });
});
