<?php

namespace App\Command;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Services\AuthService;

class GeneratePassword extends Command
{


// ...


    protected function configure(): void
    {
        $this
            // configure an argument
            ->setName('test:generate-password')
            ->setDescription('Generate random password for user');

            // ...
        ;
    }

// ...
    public function execute(InputInterface $input, OutputInterface $output): int
    {

        $authService = new AuthService();

        $password = $authService->generatePassword();
        var_dump($password);

        return Command::SUCCESS;
    }
}