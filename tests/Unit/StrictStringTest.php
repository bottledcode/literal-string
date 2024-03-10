<?php

declare(strict_types=1);

it('is equal to itself', function () {
    expect(LiteralString::from("value"))->toBe(LiteralString::from("value"));
});

it('handles a < b', function () {
    expect(LiteralString::from('a') < LiteralString::from('b'))->toBeTrue()
        ->and(LiteralString::from('b') > LiteralString::from('a'))->toBeTrue();
});

it('handles concatenation', function () {
    expect(LiteralString::from('a') . 'b')->toBe('ab')
        ->and(LiteralString::from("A") . LiteralString::from("B"))->toBe('AB');
});
