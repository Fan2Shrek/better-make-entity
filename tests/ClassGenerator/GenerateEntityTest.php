<?php

namespace Fan2Shrek\BetterMaker\Tests\ClassGenerator;

use PHPUnit\Framework\TestCase;
use Fan2Shrek\BetterMaker\Schema\EntityDefinition;
use Fan2Shrek\BetterMaker\Schema\FieldDefinition;
use Fan2Shrek\BetterMaker\Schema\EntitySwarm;
use Fan2Shrek\BetterMaker\ClassGenerator\ClassGenerator;
use Nette\PhpGenerator\Printer;
use Nette\PhpGenerator\PsrPrinter;

class GenerateEntityTest extends TestCase
{
    public function test_basic_entity(): void
    {
        $entity = new EntityDefinition(
            'User',
            [
                new FieldDefinition('id', 'int'),
                new FieldDefinition('name', 'string'),
                new FieldDefinition('email', 'string'),
            ],
            ['name', 'email']
        );

        $swarm = new EntitySwarm();
        $swarm->addEntity($entity);

        $generator = new ClassGenerator(new PsrPrinter());
        $content = $generator->generate($entity);

        file_put_contents('tests/Resources/Expected/test.tpl.php', $content);

        $this->assertSame(file_get_contents('tests/Resources/Expected/User.tpl.php'), $content);
    }
}
