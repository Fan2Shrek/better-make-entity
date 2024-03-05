<?php

namespace Fan2Shrek\BetterMaker;

class MiddlewareChain
{
    private StackMiddleware $stack;

    public function __construct(iterable $middleware)
    {
        $iterator = (fn () => yield from $middleware)();
        $this->stack = new StackMiddleware($iterator);
    }

    public function handle(): void
    {
        // ...
    }
}

/**
 * @internal
 */
class StackMiddleware
{
    public function __construct(public \Iterator $middlewares)
    {
    }

    public function next(): ?MiddlewareInterface
    {
        $this->middlewares->next();

        if (!$this->middlewares->valid()) {
            return null;
        }

        return $this->middlewares->current();
    }
}
