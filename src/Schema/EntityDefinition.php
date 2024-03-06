<?php

namespace Fan2Shrek\BetterMaker\Schema;

class EntityDefinition
{
    private string $name;
    /** @var FieldDefinition[] */
    private array $fields;
    private array $required;

    public function __construct(string $name, array $fields, array $required)
    {
        $this->name = $name;
        $this->fields = $fields;
        $this->required = $required;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getFields(): array
    {
        return $this->fields;
    }

    public function getRequired(): array
    {
        return $this->required;
    }
}
