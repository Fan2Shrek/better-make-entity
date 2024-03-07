<?php

namespace Fan2Shrek\BetterMaker\Schema;

class EntityDefinition
{
    private string $name;
    /** @var FieldDefinition[] */
    private array $fields;


    public function __construct(string $name, array $fields)
    {
        $this->name = $name;
        $this->fields = $fields;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getFields(): array
    {
        return $this->fields;
    }
}
