<?php

namespace Fan2Shrek\FileConverter;

use Fan2Shrek\BetterMaker\EntitySwarm;

interface FileConverterInterface
{
    public function convert(string $file): EntitySwarm;

    public function supports(string $file): bool;
}
