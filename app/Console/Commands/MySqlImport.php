<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MySqlImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:import {dumpName?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Runs the mysqldump utility using info from .env';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $ds = DIRECTORY_SEPARATOR;

        $host = env('DB_HOST');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        $database = env('DB_DATABASE');
        
        $ts = time();

        $path = database_path() . $ds . 'backups' . $ds;
        $dumpName = $this->argument('dumpName') ?? 'StarterDb.sql';
        $command = sprintf('mysql -h %s -u %s -p\'%s\' %s < %s', $host, $username, $password, $database, $path . $dumpName);

        exec($command);
    }
}