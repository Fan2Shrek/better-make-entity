<?php

namespace Fan2Shrek\BetterMaker\Schema;

class FieldDefinition
{
    private string $name;
    private string $type;
    private bool $required = false;
    private bool $immutable = false;

    public function __construct(string $name, string $type, bool $required = false, bool $immutable = false)
    {
        $this->name = $name;
        $this->type = $type;
        $this->required = $required;
        $this->immutable = $immutable;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function isRequired(): bool
    {
        return $this->required;
    }

    public function isImmutable(): bool
    {
        return $this->immutable;
    }
}
