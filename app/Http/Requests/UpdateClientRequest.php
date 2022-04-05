<?php

namespace App\Http\Requests;

use App\Models\Client;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class UpdateClientRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('client_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'min:3',
                'max:255',
                'required',
            ],
            'email' => [
                'nullable',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'is_business' => [
                'nullable',
                'in:' . implode(',', Arr::pluck(Client::IS_BUSINESS_RADIO, 'value')),
            ],
            'business_name' => [
                'string',
                'nullable',
            ],
            'is_gst_enabled' => [
                'nullable',
                'in:' . implode(',', Arr::pluck(Client::IS_GST_ENABLED_RADIO, 'value')),
            ],
            'gstin' => [
                'string',
                'nullable',
            ],
        ];
    }
}
