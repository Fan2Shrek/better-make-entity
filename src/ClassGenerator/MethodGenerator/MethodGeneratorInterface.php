<?php

namespace Fan2Shrek\BetterMaker\ClassGenerator\MethodGenerator;

use Fan2Shrek\BetterMaker\Schema\FieldDefinition;
use Nette\PhpGenerator\Method;

interface MethodGeneratorInterface
{
    public function generate(FieldDefinition $fieldDefinition): Method;
}
