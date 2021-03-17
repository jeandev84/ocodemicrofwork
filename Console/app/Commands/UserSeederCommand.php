<?php
namespace App\Commands;

use PDO;
use Faker\Generator as Faker;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\ProgressBar;



class UserSeederCommand extends Command
{
    protected $db;

    protected $faker;

    public function __construct(PDO $db, Faker $faker)
    {
        parent::__construct();

        $this->db = $db;
        $this->faker = $faker;
    }

    protected function configure()
    {
        $this->setName('seed:users')
            ->setDescription('Seed users')
            ->setHelp('This command will seed users in your database.')
            ->addOption('count', 'c', InputOption::VALUE_REQUIRED, 'How many fake users would you like to generate?', 1);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $count = $input->getOption('count');
        $output->writeln('<info>Seeding ' . $count . ' users</info>');

        $progress = new ProgressBar($output, $count);
        $progress->start();
        
        for ($i = 0; $i < $count; $i++) {
            $statement = $this->db->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");

            $statement->execute([
                'name' => $this->faker->name,
                'email' => $this->faker->email,
            ]);

            $progress->advance();
        }

        $progress->finish();

        $output->writeln("\n<info>Finished seeding users</info>");
    }
}
