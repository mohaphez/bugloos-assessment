<?php

declare(strict_types=1);

namespace App\Services\Log;

use App\Contracts\Log\ILogService;
use App\Models\ServiceLog;

class LogService implements ILogService
{


    public function __construct(private ServiceLog $serviceLog)
    {
    }

    public function getCountWithFilter(array $filters): int
    {
        return $this->serviceLog->query()
            ->filter($filters)
            ->count();
    }

    public function insert(array $items): void
    {
        $this->serviceLog->query()->insert($items);
    }
}