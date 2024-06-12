<?php

use Tetthys\Bc\Bc;

describe('ExceptionTest', function () {
    it('throws ValueCannotBeUsedForOperation when accept plain string #1', function () {
        expect(function () {
            (new Bc)->num('a')->add('1');
        })->toThrow(\Tetthys\Bc\Exceptions\ValueCannotBeUsedForOperation::class);
    });

    it('throws ValueCannotBeUsedForOperation when accept plain string #2', function () {
        expect(function () {
            (new Bc)->num('1')->add('a');
        })->toThrow(\Tetthys\Bc\Exceptions\ValueCannotBeUsedForOperation::class);
    });

    it('throws ValueCannotBeUsedForOperation when accept plain string #3', function () {
        expect(function () {
            new Bc('a');
        })->toThrow(\Tetthys\Bc\Exceptions\ValueCannotBeUsedForOperation::class);
    });
    
    it('throws ScaleCannotBeUsedForOperation when accept integer less than 0', function () {
        expect(function () {
            (new Bc)->scale(-1);
        })->toThrow(\Tetthys\Bc\Exceptions\ScaleCannotBeUsedForOperation::class);
    });
});
