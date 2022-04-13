<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceItem extends Model
{
    use HasAdvancedFilter;
    use SoftDeletes;
    use HasFactory;

    public $table = 'invoice_items';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'invoice.invoice_no',
        'title',
        'description',
        'unit',
        'quantity',
        'price_per_unit',
        'sub_total_price',
        'discount',
        'discount_percentage',
        'tax',
        'tax_percentage',
        'service.title',
        'service_item.title',
    ];

    protected $filterable = [
        'id',
        'invoice.invoice_no',
        'title',
        'description',
        'unit',
        'quantity',
        'price_per_unit',
        'sub_total_price',
        'discount',
        'discount_percentage',
        'tax',
        'tax_percentage',
        'service.title',
        'service_item.title',
    ];

    protected $fillable = [
        'invoice_id',
        'title',
        'description',
        'unit',
        'quantity',
        'price_per_unit',
        'sub_total_price',
        'discount',
        'discount_percentage',
        'tax',
        'tax_percentage',
        'service_id',
        'service_item_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function serviceItem()
    {
        return $this->belongsTo(ServiceItem::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
