<?php

namespace App\Http\Requests;

use App\Models\ClientCustomData;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class UpdateClientCustomDataRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('client_custom_data_edit');
    }

    public function rules()
    {
        return [
            'label' => [
                'string',
                'required',
            ],
            'value' => [
                'string',
                'nullable',
            ],
            'value_type' => [
                'required',
                'in:' . implode(',', Arr::pluck(ClientCustomData::VALUE_TYPE_RADIO, 'value')),
            ],
            'client_id' => [
                'integer',
                'exists:clients,id',
                'required',
            ],
        ];
    }
}
