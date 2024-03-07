<?php

namespace Fan2Shrek\BetterMaker;

use Fan2Shrek\FileConverter\FileConverterInterface;
use Fan2Shrek\BetterMaker\Middleware\MiddlewareChain;

class EntityImporter implements EntityimporterInterface
{
    public function __construct(
        private FileConverterInterface $fileConverter,
        private \Iterator $middlewares
    ) {
    }

    public function import(string $file): void
    {
        $entitySwarm = $this->fileConverter->convert($file);

        $chain = new MiddlewareChain($this->middlewares);

        return $this->middlewares->current()->handle($entitySwarm, $chain);
    }
}
