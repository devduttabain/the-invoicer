<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasAdvancedFilter;
    use SoftDeletes;
    use HasFactory;

    public const IS_GST_ENABLED_RADIO = [
        [
            'label' => 'No',
            'value' => '0',
        ],
        [
            'label' => 'Yes',
            'value' => '1',
        ],
    ];

    public $table = 'invoices';

    protected $appends = [
        'is_gst_enabled_label',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'invoice_no',
        'service.title',
        'client.name',
        'is_gst_enabled',
        'gstin',
        'invoice_tax_rate_cgst',
        'invoice_tax_rate_sgst',
    ];

    protected $filterable = [
        'id',
        'invoice_no',
        'service.title',
        'client.name',
        'is_gst_enabled',
        'gstin',
        'invoice_tax_rate_cgst',
        'invoice_tax_rate_sgst',
    ];

    protected $fillable = [
        'invoice_no',
        'service_id',
        'client_id',
        'is_gst_enabled',
        'gstin',
        'invoice_tax_rate_cgst',
        'invoice_tax_rate_sgst',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
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
