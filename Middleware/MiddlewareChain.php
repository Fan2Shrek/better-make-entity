<?php

namespace Fan2Shrek\BetterMaker\Middleware;

use Fan2Shrek\BetterMaker\Middleware\MiddlewareInterface;
use Fan2Shrek\BetterMaker\Schema\EntitySwarm;

class MiddlewareChain implements MiddlewareInterface
{
    private StackMiddleware $stack;

    /** @var MiddlewareInterface[] */
    public function __construct(iterable $middleware)
    {
        $iterator = (fn () => yield from $middleware)();
        $this->stack = new StackMiddleware($iterator);
    }

    public function next(): MiddlewareInterface
    {
        $next = $this->stack->next();

        if (null === $next) {
            return $this;
        }

        return $next;
    }

    public function handle(EntitySwarm $entitySwarm, MiddlewareChain $chain): EntitySwarm
    {
        return $entitySwarm;
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
