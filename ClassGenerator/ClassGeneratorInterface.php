<?php

namespace Fan2Shrek\BetterMaker\ClassGenerator;

use Fan2Shrek\BetterMaker\Schema\EntityDefinition;
use Fan2Shrek\BetterMaker\Schema\FieldDefinition;
use Nette\PhpGenerator\PhpFile;
use Nette\PhpGenerator\ClassType;

interface ClassGeneratorInterface
{
    public function generateFile(EntityDefinition $entity): PhpFile;

    public function generateMethods(ClassType $class, FieldDefinition $field): void;
}
