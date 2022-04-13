<?php

namespace App\Http\Requests;

use App\Models\Invoice;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class UpdateInvoiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('invoice_edit');
    }

    public function rules()
    {
        return [
            'service_id' => [
                'integer',
                'exists:services,id',
                'nullable',
            ],
            'client_id' => [
                'integer',
                'exists:clients,id',
                'nullable',
            ],
            'is_gst_enabled' => [
                'nullable',
                'in:' . implode(',', Arr::pluck(Invoice::IS_GST_ENABLED_RADIO, 'value')),
            ],
            'gstin' => [
                'string',
                'nullable',
            ],
            'invoice_tax_rate_cgst' => [
                'numeric',
                'nullable',
            ],
            'invoice_tax_rate_sgst' => [
                'numeric',
                'nullable',
            ],
        ];
    }
}
