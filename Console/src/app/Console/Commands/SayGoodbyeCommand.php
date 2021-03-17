<?php

namespace App\Console\Commands;

use App\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SayGoodbyeCommand extends Command
{
    /**
     * The command name.
     *
     * @var string
     */
    protected $command = 'say:goodbye';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Command description.';

    /**
     * Handle the command.
     *
     * @param  InputInterface $input
     * @param  OutputInterface $output
     *
     * @return void
     */
    public function handle(InputInterface $input, OutputInterface $output)
    {
        return $this->info('Goodbye');
    }

    /**
     * Command arguments
     *
     * @return array
     */
    protected function arguments()
    {
        return [
            //
        ];
    }

    /**
     * Command options.
     *
     * @return array
     */
    protected function options()
    {
        return [
            //
        ];
    }
}
