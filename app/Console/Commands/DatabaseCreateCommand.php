<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Symfony\Component\Console\Input\InputArgument;

class DatabaseCreateCommand extends Command
{
    protected $signature = 'db:create';
    protected $description = 'Create a new MySQL database based on the config database name';

    public function __construct()
    {
        parent::__construct();
        $this->addArgument('db', InputArgument::OPTIONAL, '(Optional) Database Name');
    }
    public function handle()
    {
        $schemaName = $this->argument('db') ?: config("database.connections.mysql.database");
        $charset = config("database.connections.mysql.charset", 'utf8mb4');
        $collation = config("database.connections.mysql.collation", 'utf8mb4_unicode_ci');
        config(["database.connections.mysql.database" => null]);
        try {
            DB::statement("CREATE DATABASE $schemaName CHARACTER SET $charset COLLATE $collation;");
            config(["database.connections.mysql.database" => $schemaName]);
            $this->info('Database: "' . $schemaName . '" Created Successfully');
            sleep(1);
        } catch (QueryException $e) {
            $this->error('Database: "' . $schemaName . '" Already Exist.');
        }
    }
    protected function migration()
    {
        if ($this->option('migrate') && $this->option('migrate')) {
            $this->call('migrate');
            sleep(2);
            $this->call('db:seed');
        } else {
            if ($this->option('migrate')) {
                $this->call('migrate');
            }
            if ($this->option('seed')) {
                $this->error('Migrate First Than Run db:seed');
            }
        }
    }
}
