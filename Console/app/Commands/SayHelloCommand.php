<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SayHelloCommand extends Command
{
    protected function configure()
    {
        $this->setName('say:hello')
            ->setDescription('Say hello')
            ->setHelp('This command will say hello.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Hello!');
    }
}
