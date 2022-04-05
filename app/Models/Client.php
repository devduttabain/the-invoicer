<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasAdvancedFilter;
    use SoftDeletes;
    use HasFactory;

    public const IS_BUSINESS_RADIO = [
        [
            'label' => 'Yes, Business',
            'value' => '1',
        ],
        [
            'label' => 'No, Not A Business',
            'value' => '0',
        ],
    ];

    public const IS_GST_ENABLED_RADIO = [
        [
            'label' => 'Yes, GST Enabled',
            'value' => '1',
        ],
        [
            'label' => 'No, Not GST Enabled',
            'value' => '0',
        ],
    ];

    public $table = 'clients';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'is_business_label',
        'is_gst_enabled_label',
    ];

    protected $orderable = [
        'id',
        'name',
        'email',
        'phone',
        'address',
        'is_business',
        'business_name',
        'is_gst_enabled',
        'gstin',
    ];

    protected $filterable = [
        'id',
        'name',
        'email',
        'phone',
        'address',
        'is_business',
        'business_name',
        'is_gst_enabled',
        'gstin',
    ];

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'is_business',
        'business_name',
        'is_gst_enabled',
        'gstin',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getIsBusinessLabelAttribute()
    {
        return collect(static::IS_BUSINESS_RADIO)->firstWhere('value', $this->is_business)['label'] ?? '';
    }

    public function getIsGstEnabledLabelAttribute()
    {
        return collect(static::IS_GST_ENABLED_RADIO)->firstWhere('value', $this->is_gst_enabled)['label'] ?? '';
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
