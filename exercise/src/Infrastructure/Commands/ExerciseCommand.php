<?php
//declare(strict_types = 1);


namespace App\Infrastructure\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ExerciseCommand extends Command
{
    protected static $defaultName = 'app:Exercise';

    public function __construct() {
        parent::__construct();
    }

    /**
     * @inheritDoc
     */
    protected function configure(): void
    {
        $this->setDescription('Exercise command');
        $this->addArgument('source', InputArgument::REQUIRED);
    }

    /**
     * @inheritDoc
     */
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $source = $input->getArgument('source');

        var_dump('Im here -> file:' . $source);

        return Command::SUCCESS;
    }
}
