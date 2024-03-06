<?php

namespace Fan2Shrek\BetterMaker\ClassGenerator;

use Fan2Shrek\BetterMaker\Schema\EntityDefinition;

interface ClassGeneratorInterface
{
    public function generate(EntityDefinition $entity): string;
}
