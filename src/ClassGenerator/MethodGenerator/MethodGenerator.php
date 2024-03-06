<?php

namespace Fan2Shrek\BetterMaker\ClassGenerator\MethodGenerator;

use Fan2Shrek\BetterMaker\Schema\FieldDefinition;
use Nette\PhpGenerator\Method;

class MethodGenerator
{
    public function generate(FieldDefinition $fieldDefinition): Method
    {
        $method = new Method('get' . ucfirst($fieldDefinition->getName()));
        $method->setReturnType($fieldDefinition->getType());

        return $method;
    }
}
