<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ServiceLog extends Model
{
    use HasFactory;

    protected $fillable = ['service_names', 'status_code', 'service_log', 'date'];


    public function scopeFilter(Builder $q, ?array $filters): Builder
    {
        if (isset($filters['serviceName'])) {
            $q->where('service_name', 'like', '%' . $filters['serviceName'] . '%');
        }
        if (isset($filters['statusCode'])) {
            $q->where('status_code', $filters['statusCode']);
        }
        if (isset($filters['start_date'])) {
            $q->where('date', '>=', $filters['start_date']);
        }
        if (isset($filters['end_date'])) {
            $q->where('date', '<=', $filters['end_date']);
        }

        return $q;
    }
}