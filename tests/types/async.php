<?php

use React\Promise\PromiseInterface;
use function PHPStan\Testing\assertType;
use function React\Async\async;
use function React\Async\await;
use function React\Promise\resolve;

assertType('React\Promise\PromiseInterface<bool>', async(static fn (): PromiseInterface => resolve(true))());
assertType('React\Promise\PromiseInterface<bool>', async(static fn (): bool => await(resolve(true)))());
