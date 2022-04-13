<?php

namespace App\Http\Requests;

use App\Models\Service;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class StoreServiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('service_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'client_id' => [
                'integer',
                'exists:clients,id',
                'required',
            ],
            'starts_from' => [
                'date_format:' . config('project.date_format'),
                'required',
            ],
            'type' => [
                'nullable',
                'in:' . implode(',', Arr::pluck(Service::TYPE_RADIO, 'value')),
            ],
            'priority' => [
                'nullable',
                'in:' . implode(',', Arr::pluck(Service::PRIORITY_RADIO, 'value')),
            ],
            'ends_at' => [
                'date_format:' . config('project.date_format'),
                'nullable',
            ],
        ];
    }
}
