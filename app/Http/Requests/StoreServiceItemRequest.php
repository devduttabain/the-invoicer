<?php

namespace App\Http\Requests;

use App\Models\ServiceItem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreServiceItemRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('service_item_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'estimated_effort_in_hours' => [
                'numeric',
                'min:1',
                'nullable',
            ],
            'cost_per_hour' => [
                'numeric',
                'nullable',
            ],
            'actual_effort_in_hour' => [
                'numeric',
                'nullable',
            ],
            'deadline' => [
                'date_format:' . config('project.datetime_format'),
                'nullable',
            ],
            'ended_at' => [
                'date_format:' . config('project.datetime_format'),
                'nullable',
            ],
            'service_id' => [
                'integer',
                'exists:services,id',
                'required',
            ],
        ];
    }
}
