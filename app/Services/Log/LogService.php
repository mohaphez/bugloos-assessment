<?php

declare(strict_types=1);

namespace App\Services\Log;

use App\Models\ServiceLog;

class LogService
{

    public function insert(array $items): void
    {
        ServiceLog::insert($items);
    }
}