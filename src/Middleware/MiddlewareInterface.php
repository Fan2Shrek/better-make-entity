<?php

namespace Fan2Shrek\BetterMaker\Middleware;

use Fan2Shrek\BetterMaker\Schema\EntitySwarm;
use Fan2Shrek\BetterMaker\Middleware\MiddlewareChain;


interface MiddlewareInterface
{
    public function handle(EntitySwarm $entitySwarm, MiddlewareChain $chain): EntitySwarm;
}
