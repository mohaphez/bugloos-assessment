<?php

declare(strict_types=1);

namespace App\Services\Log\FileParses;

use App\Contracts\Log\ILogParser;

class ParseRaw implements ILogParser
{
    public function parse($line): array
    {
        $record = preg_split('/\s(?=([^"]*"[^"]*")*[^"]*$)/', $line);

        return [
            'date' => $this->getDate($record[2]),
            'service_name' => trim($record[0]),
            'service_log' => trim($record[3]),
            'status_code' => intval(trim($record[4])),
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString(),
        ];
    }

    private function getDate(string $date): string
    {
        $date = trim(str_replace(array('[', ']'), '', $date));
        return \Carbon\Carbon::createFromFormat('d/M/Y:H:i:s', $date)->toDateTimeString();
    }
}