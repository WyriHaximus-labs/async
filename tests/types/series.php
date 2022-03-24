<?php

use React\Promise\PromiseInterface;
use function PHPStan\Testing\assertType;
use function React\Async\series;
use function React\Promise\resolve;

assertType('React\Promise\PromiseInterface<array<bool|float|int>>', series([
    static fn (): PromiseInterface => resolve(true),
    static fn (): PromiseInterface => resolve(time()),
    static fn (): PromiseInterface => resolve(microtime(true)),
]));
