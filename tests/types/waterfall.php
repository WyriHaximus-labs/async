<?php

use React\Promise\PromiseInterface;
use function PHPStan\Testing\assertType;
use function React\Async\waterfall;
use function React\Promise\resolve;

assertType('React\Promise\PromiseInterface<float>', waterfall([
    static fn (): PromiseInterface => resolve(microtime(true)),
]));

//assertType('React\Promise\PromiseInterface<float>', waterfall([
//    static fn (): PromiseInterface => resolve(true),
//    static fn (bool $bool): PromiseInterface => resolve(time()),
//    static fn (int $int): PromiseInterface => resolve(microtime(true)),
//]));
