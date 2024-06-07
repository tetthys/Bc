<?php

use Tetthys\Bc\Bc;

describe('ExceptionTest', function () {
    it('throws NumCannotBeUsedForOperation when accept plain string #1', function () {
        expect(function () {
            (new Bc)->num('a')->add('1');
        })->toThrow(\Tetthys\Bc\Exceptions\NumCannotBeUsedForOperation::class);
    });
    it('throws NumCannotBeUsedForOperation when accept plain string #2', function () {
        expect(function () {
            (new Bc)->num('1')->add('a');
        })->toThrow(\Tetthys\Bc\Exceptions\NumCannotBeUsedForOperation::class);
    });
});
