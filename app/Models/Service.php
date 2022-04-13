<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasAdvancedFilter;
    use SoftDeletes;
    use HasFactory;

    public const TYPE_RADIO = [
        [
            'label' => 'Service',
            'value' => 'service',
        ],
        [
            'label' => 'New Project',
            'value' => 'project',
        ],
    ];

    public const PRIORITY_RADIO = [
        [
            'label' => 'Severe',
            'value' => '0',
        ],
        [
            'label' => 'Major',
            'value' => '1',
        ],
        [
            'label' => 'Medium',
            'value' => '2',
        ],
        [
            'label' => 'Minor',
            'value' => '3',
        ],
    ];

    public $table = 'services';

    protected $appends = [
        'type_label',
        'priority_label',
    ];

    protected $dates = [
        'starts_from',
        'ends_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'title',
        'client.name',
        'starts_from',
        'type',
        'priority',
        'ends_at',
    ];

    protected $filterable = [
        'id',
        'title',
        'client.name',
        'starts_from',
        'type',
        'priority',
        'ends_at',
    ];

    protected $fillable = [
        'title',
        'client_id',
        'starts_from',
        'type',
        'priority',
        'ends_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function getStartsFromAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.date_format')) : null;
    }

    public function setStartsFromAttribute($value)
    {
        $this->attributes['starts_from'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getTypeLabelAttribute()
    {
        return collect(static::TYPE_RADIO)->firstWhere('value', $this->type)['label'] ?? '';
    }

    public function getPriorityLabelAttribute()
    {
        return collect(static::PRIORITY_RADIO)->firstWhere('value', $this->priority)['label'] ?? '';
    }

    public function getEndsAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.date_format')) : null;
    }

    public function setEndsAtAttribute($value)
    {
        $this->attributes['ends_at'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
