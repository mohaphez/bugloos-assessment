<?php

declare(strict_types=1);

namespace App\Contracts\Log;

interface ILogService
{
    public function insert(array $data): void;

    public function getCountWithFilter(array $filter): int;

}