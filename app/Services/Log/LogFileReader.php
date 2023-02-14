<?php

declare(strict_types=1);

namespace App\Services\Log;

use App\Contracts\Log\ILogReader;

class LogFileReader implements ILogReader
{

    private $parser;

    public function __construct($parser)
    {
        $this->parser = $parser;
    }


    public function parse(string $path): \SplFileInfo
    {
        return new \SplFileObject(realpath($path));
    }

    public function readLogs($reader): \Generator
    {
        foreach ($reader as $line) {
            if (empty($line)) {
                continue;
            }

            yield $this->parser->parse($line);
        }
    }
}