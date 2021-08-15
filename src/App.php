<?php declare(strict_types=1);

namespace App;

use Symfony\Component\Console;

class App extends Console\Application
{

    public function __construct(iterable $commands)
    {
        $commands = $commands instanceof \Traversable ? \iterator_to_array($commands) : $commands;

        foreach ($commands as $command) {
            $this->add($command);
        }

        parent::__construct();
    }
}
