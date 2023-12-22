<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class ControllerCommand extends Command
{
    protected $signature = 'controller';
    protected $description = 'Make Controller Just Type Controller Name Only';

    public function __construct()
    {
        parent::__construct();
        $this->addArgument('controller', InputArgument::REQUIRED, 'The name of controller not case sensitive');

        $this->addOption('resource', 'r', InputOption::VALUE_NONE, 'This Will Create Resource Controller');

        $this->addOption('api', 'a', InputOption::VALUE_NONE, 'This Will Create Resource Controller');
        $this->addOption('admin', 's', InputOption::VALUE_NONE, 'This Will Create Resource Controller');
        $this->addOption('merchant', 'm', InputOption::VALUE_NONE, 'This Will Create Resource Controller');
        $this->addOption('user', 'u', InputOption::VALUE_NONE, 'This Will Create Resource Controller');
        $this->addOption('web', 'w', InputOption::VALUE_NONE, 'This Will Create Resource Controller');
    }

    public function handle()
    {
        switch (1):
            case $this->option('api'):
                $this->call('make:controller', [
                    '--api' => $this->option('api'),
                    'name' => 'Api/V1/' . $this->argument('controller') . 'Controller'
                ]);
                break;
            case $this->option('admin'):
                $this->call('make:controller', [
                    '--resource' => $this->option('resource'),
                    'name' => 'Admin/' . $this->argument('controller') . 'Controller'
                ]);
                break;
            case $this->option('merchant'):
                $this->call('make:controller', [
                    '--resource' => $this->option('resource'),
                    'name' => 'Merchant/' . $this->argument('controller') . 'Controller'
                ]);
                break;
            case $this->option('user'):
                $this->call('make:controller', [
                    '--resource' => $this->option('resource'),
                    'name' => 'User/' . $this->argument('controller') . 'Controller'
                ]);
                break;
            case $this->option('web'):
                $this->call('make:controller', [
                    '--resource' => $this->option('resource'),
                    'name' => 'Web/' . $this->argument('controller') . 'Controller'
                ]);
                break;
            default :
                $this->warn('No section are selected');
        endswitch;
    }
}
