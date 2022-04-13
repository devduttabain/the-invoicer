<?php

namespace App\Http\Requests;

use App\Models\InvoiceItem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreInvoiceItemRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('invoice_item_create');
    }

    public function rules()
    {
        return [
            'invoice_id' => [
                'integer',
                'exists:invoices,id',
                'required',
            ],
            'title' => [
                'string',
                'nullable',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'unit' => [
                'string',
                'nullable',
            ],
            'quantity' => [
                'numeric',
                'min:0',
                'required',
            ],
            'price_per_unit' => [
                'string',
                'required',
            ],
            'sub_total_price' => [
                'numeric',
                'nullable',
            ],
            'discount' => [
                'numeric',
                'nullable',
            ],
            'discount_percentage' => [
                'numeric',
                'nullable',
            ],
            'tax' => [
                'numeric',
                'nullable',
            ],
            'tax_percentage' => [
                'numeric',
                'nullable',
            ],
            'service_id' => [
                'integer',
                'exists:services,id',
                'nullable',
            ],
            'service_item_id' => [
                'integer',
                'exists:service_items,id',
                'nullable',
            ],
        ];
    }
}
