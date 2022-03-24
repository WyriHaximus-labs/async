<?php

use React\Promise\PromiseInterface;
use function PHPStan\Testing\assertType;
use function React\Async\async;
use function React\Async\await;
use function React\Async\coroutine;
use function React\Async\parallel;
use function React\Async\series;
use function React\Async\waterfall;
use function React\Promise\resolve;

assertType('bool', await(resolve(true)));
assertType('bool', await(async(static fn (): bool => true)()));
assertType('bool', await(async(static fn (): PromiseInterface => resolve(true))()));
assertType('bool', await(async(static fn (): bool => await(resolve(true)))()));
assertType('bool', await(coroutine(static function () {
    return (yield resolve(true));
})));
assertType('array<bool|float|int>', await(parallel([
    static fn (): PromiseInterface => resolve(true),
    static fn (): PromiseInterface => resolve(time()),
    static fn (): PromiseInterface => resolve(microtime(true)),
])));
assertType('array<bool|float|int>', await(series([
    static fn (): PromiseInterface => resolve(true),
    static fn (): PromiseInterface => resolve(time()),
    static fn (): PromiseInterface => resolve(microtime(true)),
])));
assertType('float', await(waterfall([
    static fn (): PromiseInterface => resolve(microtime(true)),
])));
//assertType('float', await(waterfall([
//    static fn (): PromiseInterface => resolve(true),
//    static fn (bool $bool): PromiseInterface => resolve(time()),
//    static fn (int $int): PromiseInterface => resolve(microtime(true)),
//])));
