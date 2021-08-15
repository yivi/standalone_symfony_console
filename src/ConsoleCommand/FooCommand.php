<?php declare(strict_types=1);

namespace App\ConsoleCommand;

use App\Text\Reverser;
use Symfony\Component\Console;

class FooCommand extends Console\Command\Command
{

    protected static $defaultName = 'reverse';

    public function __construct(private Reverser $reverser)
    {
        parent::__construct(self::$defaultName);
    }

    protected function configure()
    {
        $this->setDescription('Reverses a string');
        $this->addArgument('input', Console\Input\InputArgument::REQUIRED, 'A string that will be reversed');
    }

    protected function execute(Console\Input\InputInterface $input, Console\Output\OutputInterface $output): int
    {

        $output->writeln($this->reverser->exec($input->getArgument('input')));

        return self::SUCCESS;
    }
}
