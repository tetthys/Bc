<?php

use Tetthys\Bc\Bc;

describe('Comparison', function () {
    it('isGreaterThan', function () {
        $result = (new Bc)->scale(2)->num('10')->isGreaterThan('1');
        expect($result)->toBeTrue();
    });

    it('isGreaterThanOrEqual', function () {
        $result = (new Bc)->scale(2)->num('10')->isGreaterThanOrEqual('10');
        expect($result)->toBeTrue();
    });

    it('isLessThan', function () {
        $result = (new Bc)->scale(2)->num('1')->isLessThan('10');
        expect($result)->toBeTrue();
    });

    it('isLessThanOrEqual', function () {
        $result = (new Bc)->scale(2)->num('1')->isLessThanOrEqual('1');
        expect($result)->toBeTrue();
    });

    it('isEqual', function () {
        $result = (new Bc)->scale(2)->num('1')->isEqual('1');
        expect($result)->toBeTrue();
    });

    it('isDifferent', function () {
        $result = (new Bc)->scale(2)->num('1')->isDifferent('2');
        expect($result)->toBeTrue();
    });

    it('gt', function () {
        $result = (new Bc)->scale(2)->num('10')->gt('1');
        expect($result)->toBeTrue();
    });

    it('gte', function () {
        $result = (new Bc)->scale(2)->num('10')->gte('10');
        expect($result)->toBeTrue();
    });

    it('lt', function () {
        $result = (new Bc)->scale(2)->num('1')->lt('10');
        expect($result)->toBeTrue();
    });

    it('lte', function () {
        $result = (new Bc)->scale(2)->num('1')->lte('1');
        expect($result)->toBeTrue();
    });

    it('is', function () {
        $result = (new Bc)->scale(2)->num('1')->is('1');
        expect($result)->toBeTrue();
    });

    it('isNot', function () {
        $result = (new Bc)->scale(2)->num('1')->isNot('2');
        expect($result)->toBeTrue();
    });
});
