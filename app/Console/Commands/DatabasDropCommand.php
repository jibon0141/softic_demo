<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

/**
 * @property  command
 */
class DatabasDropCommand extends Command
{
    protected $signature = 'db:drop';
    protected $description = 'Drop Current MySQL database based on the config database name';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        if($this->confirm('Do you wish to continue?',false)) {
            $schemaName = config("database.connections.mysql.database");
            try {
                DB::statement(" DROP DATABASE $schemaName");
                config(["database.connections.mysql.database" => null]);
                $this->info('Successfully Drop The Database: '.$schemaName);
            } catch (QueryException $e) {
                $this->error('Sorry You Can\'t Drop The Config Database');
            }
        }else{
            $this->info("Database Dropping terminated");
        }
    }
}
