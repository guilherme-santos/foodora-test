<?php

namespace Foodora\Console;

use Foodora\Console\Command\CommandInterface;

class Application {
    /**
     * All commands by name
     * @var array
     */
    protected $commands = [];

    /**
     * Add new command
     * @param CommandInterface $command
     */
    public function add(CommandInterface $command)
    {
        $this->commands[$command->getCommandName()] = $command;
    }

    /**
     * Execute command
     */
    public function run()
    {
        $argv = isset($_SERVER['argv']) ? $_SERVER['argv'] : [];
        if (count($argv) < 2) {
            fprintf(STDERR, "Command name is missing");
            return;
        }

        $commandName = $argv[1];
        if (empty($this->commands[$commandName])) {
            fprintf(STDERR, "Command name[" . $commandName . "] not found");
            return;
        }

        return $this->commands[$commandName]->execute();
    }
}