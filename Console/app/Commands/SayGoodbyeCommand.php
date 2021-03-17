<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class SayGoodbyeCommand extends Command
{
    protected function configure()
    {
        $this->setName('say:goodbye')
            ->setDescription('Say goodbye')
            ->setHelp('This command will say goodbye.')
            ->addArgument('name', InputArgument::REQUIRED, 'Your name.')
            ->addOption('repeat', 'r', InputOption::VALUE_REQUIRED, 'How many times do you want the output to repeat?', 1);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        for ($i = 0; $i < $input->getOption('repeat'); $i++) {
            $output->writeln('Hello ' . $input->getArgument('name') . '!');
        }
    }
}
