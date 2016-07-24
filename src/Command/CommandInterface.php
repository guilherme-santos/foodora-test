<?php

namespace Foodora\Console\Command;

interface CommandInterface {
    public function getCommandName();
    public function execute();
}