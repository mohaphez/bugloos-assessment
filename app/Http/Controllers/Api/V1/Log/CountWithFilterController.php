<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Log;

use App\Contracts\Log\ILogService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class CountWithFilterController extends Controller
{
    public function __invoke(ILogService $logService)
    {
        $request = request()->all();
        $cacheKey = 'logCount_' . md5(json_encode($request));

        $count = Cache::remember($cacheKey, 120, function () use ($logService, $request) {

            return $logService->getCountWithFilter($request);
        });

        return response()->json(['count' => $count]);
    }
}