<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LogImport extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected string $signature = 'command:name';

    /**
     * The console command description.
     */
    protected string $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return Command::SUCCESS;
    }
}