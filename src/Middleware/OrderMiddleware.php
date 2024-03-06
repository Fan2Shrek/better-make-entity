<?php

namespace Fan2Shrek\BetterMaker\Middleware;

use Fan2Shrek\BetterMaker\Schema\EntitySwarm;

class OrderMiddleware implements MiddlewareInterface
{
    public function handle(EntitySwarm $entitySwarm, MiddlewareChain $chain): EntitySwarm
    {
        return $chain->next()->handle($entitySwarm, $chain);
    }
}
