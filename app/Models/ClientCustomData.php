<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientCustomData extends Model
{
    use HasAdvancedFilter;
    use SoftDeletes;
    use HasFactory;

    public const VALUE_TYPE_RADIO = [
        [
            'label' => 'Text',
            'value' => 'text',
        ],
        [
            'label' => 'Numeric',
            'value' => 'numeric',
        ],
        [
            'label' => 'Boolean',
            'value' => 'boolean',
        ],
        [
            'label' => 'other',
            'value' => 'other',
        ],
    ];

    public $table = 'client_custom_datas';

    protected $appends = [
        'value_type_label',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'label',
        'value',
        'value_type',
        'client.name',
    ];

    protected $filterable = [
        'id',
        'label',
        'value',
        'value_type',
        'client.name',
    ];

    protected $fillable = [
        'label',
        'value',
        'value_type',
        'client_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getValueTypeLabelAttribute()
    {
        return collect(static::VALUE_TYPE_RADIO)->firstWhere('value', $this->value_type)['label'] ?? '';
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
