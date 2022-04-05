<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Http\Resources\Admin\ServiceResource;
use App\Models\Client;
use App\Models\Service;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ServiceApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('service_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ServiceResource(Service::with(['client'])->advancedFilter());
    }

    public function store(StoreServiceRequest $request)
    {
        $service = Service::create($request->validated());

        return (new ServiceResource($service))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('service_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'client'   => Client::get(['id', 'name']),
                'type'     => Service::TYPE_RADIO,
                'priority' => Service::PRIORITY_RADIO,
            ],
        ]);
    }

    public function show(Service $service)
    {
        abort_if(Gate::denies('service_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ServiceResource($service->load(['client']));
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        $service->update($request->validated());

        return (new ServiceResource($service))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Service $service)
    {
        abort_if(Gate::denies('service_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new ServiceResource($service->load(['client'])),
            'meta' => [
                'client'   => Client::get(['id', 'name']),
                'type'     => Service::TYPE_RADIO,
                'priority' => Service::PRIORITY_RADIO,
            ],
        ]);
    }

    public function destroy(Service $service)
    {
        abort_if(Gate::denies('service_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $service->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
