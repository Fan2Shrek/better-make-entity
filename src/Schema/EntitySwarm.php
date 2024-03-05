<?php

namespace Fan2Shrek\BetterMaker;

class EntitySwarm
{
    private array $entities = [];

    public function addEntity(Entity $entity): void
    {
        $this->entities[] = $entity;
    }

    public function getEntities(): array
    {
        return $this->entities;
    }
}
