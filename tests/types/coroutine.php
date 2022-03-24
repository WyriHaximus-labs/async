<?php

use function PHPStan\Testing\assertType;
use function React\Async\coroutine;
use function React\Promise\resolve;

assertType('React\Promise\PromiseInterface<int>', coroutine(static function () {
    $bool = yield resolve(true);

    return time();
}));

assertType('React\Promise\PromiseInterface<int>', coroutine(static function (): int {
    $bool = yield resolve(true);

    return time();
}));

// Unsupported behavior, but left here as example
//assertType('React\Promise\PromiseInterface<bool>', coroutine(static function () {
//    yield resolve(time());
//
//    return true;
//}));
//
//assertType('React\Promise\PromiseInterface<bool>', coroutine(static function () {
//    for ($i = 0; $i <= 10; $i++) {
//        yield resolve($i);
//    }
//
//    return true;
//}));
