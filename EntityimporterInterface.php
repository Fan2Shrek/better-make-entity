<?php

namespace Fan2Shrek\BetterMaker;

interface EntityimporterInterface
{
    public function import(string $file): void;
}
