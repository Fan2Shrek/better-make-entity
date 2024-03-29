<?php

namespace Fan2Shrek\BetterMaker\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Fan2Shrek\BetterMaker\EntityimporterInterface;

#[AsCommand(
    'import:entities',
    description: 'Import entities from a file',
    aliases: ['ie'],
    hidden: false,
)]
class ImportEntitiesCommand extends Command
{
    public function __construct(
        private EntityimporterInterface $importer,
    ) {
    }

    protected function configure(): void
    {
        $this->setDescription('Import entities from a file');
        $this->addArgument('file', InputArgument::REQUIRED, 'The file to import from', null);
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $file = $input->getArgument('file');
        $output->writeln("Importing entities from $file");

        $this->importer->import($file);

        return Command::SUCCESS;
    }
}
