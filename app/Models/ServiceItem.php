<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceItem extends Model
{
    use HasAdvancedFilter;
    use SoftDeletes;
    use HasFactory;

    public $table = 'service_items';

    protected $dates = [
        'deadline',
        'ended_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'title',
        'description',
        'estimated_effort_in_hours',
        'cost_per_hour',
        'actual_effort_in_hour',
        'deadline',
        'ended_at',
        'service.title',
    ];

    protected $filterable = [
        'id',
        'title',
        'description',
        'estimated_effort_in_hours',
        'cost_per_hour',
        'actual_effort_in_hour',
        'deadline',
        'ended_at',
        'service.title',
    ];

    protected $fillable = [
        'title',
        'description',
        'estimated_effort_in_hours',
        'cost_per_hour',
        'actual_effort_in_hour',
        'deadline',
        'ended_at',
        'service_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getDeadlineAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setDeadlineAttribute($value)
    {
        $this->attributes['deadline'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getEndedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setEndedAtAttribute($value)
    {
        $this->attributes['ended_at'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
