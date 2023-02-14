<?php

declare(strict_types=1);

namespace App\Contracts\Log;

interface ILogReader
{
    public function parse(string $path);

    public function readLogs($reader);

}