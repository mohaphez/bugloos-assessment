<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Contracts\Log\ILogReader;
use App\Contracts\Log\ILogService;
use App\Factories\ParserFactory;
use App\Services\Log\LogFileReader;
use Illuminate\Console\Command;
use Illuminate\Support\LazyCollection;

class LogImport extends Command
{
    /**
     * The name and signature of the console command.
     * 
     * @var string
     */
    protected $signature = 'log:import {file} {--format=raw}';

    /**
     * The console command description.
     * 
     * @var string
     */
    protected $description = 'This command import logs from file to database';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $reader = $this->makeReader($this->option('format'));

        $file = $reader->parse($this->argument('file'));

        $logService = app(ILogService::class);

        LazyCollection::make(function () use ($reader, $file) {
            return $reader->readLogs($file);
        })->chunk(10000)
            ->each(fn($items) => $logService->insert($items->toArray()));

        return Command::SUCCESS;
    }


    private function makeReader(string $format): ILogReader
    {
        $factory = new ParserFactory();

        return new LogFileReader($factory->make($format));
    }

}