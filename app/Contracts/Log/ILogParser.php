<?php

declare(strict_types=1);

namespace App\Contracts\Log;

interface ILogParser
{
    public function parse($data): array;
}