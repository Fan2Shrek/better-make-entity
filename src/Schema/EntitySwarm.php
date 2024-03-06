<?php

namespace Fan2Shrek\BetterMaker\Schema;

class EntitySwarm
{
    private array $entities = [];

    public function addEntity(EntityDefinition $entity): void
    {
        $this->entities[] = $entity;
    }

    public function getEntities(): array
    {
        return $this->entities;
    }
}
