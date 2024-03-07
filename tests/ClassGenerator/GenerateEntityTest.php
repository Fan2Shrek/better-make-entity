<?php

namespace Fan2Shrek\BetterMaker\Tests\ClassGenerator;

use PHPUnit\Framework\TestCase;
use Fan2Shrek\BetterMaker\Schema\EntityDefinition;
use Fan2Shrek\BetterMaker\Schema\FieldDefinition;
use Fan2Shrek\BetterMaker\Schema\EntitySwarm;
use Fan2Shrek\BetterMaker\ClassGenerator\ClassGenerator;
use Nette\PhpGenerator\Printer;
use Nette\PhpGenerator\PsrPrinter;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\HttpKernel\KernelInterface;

class GenerateEntityTest extends KernelTestCase
{
    private function getPrinter(): Printer
    {
        return self::getContainer()->get('nette.class_printer');
    }

    public function test_basic_entity(): void
    {
        $entity = new EntityDefinition(
            'User',
            [
                new FieldDefinition('id', 'int', true, true),
                new FieldDefinition('name', 'string'),
                new FieldDefinition('email', 'string'),
            ]
        );

        $generator = new ClassGenerator();
        $content = $this->getPrinter()->printFile($generator->generateFile($entity));

        $this->assertSame(file_get_contents('tests/Resources/Expected/User.tpl.php'), $content);
    }

    public function test_complex_entity(): void
    {
        $entity = new EntityDefinition(
            'Person',
            [
                new FieldDefinition('id', 'int', true, true),
                new FieldDefinition('name', 'string', true, true),
                new FieldDefinition('email', 'string', true),
            ]
        );

        $generator = new ClassGenerator();
        $content = $this->getPrinter()->printFile($generator->generateFile($entity));

        file_put_contents('tests/Resources/Expected/test.php', $content);

        $this->assertSame(file_get_contents('tests/Resources/Expected/Person.tpl.php'), $content);
    }
}
