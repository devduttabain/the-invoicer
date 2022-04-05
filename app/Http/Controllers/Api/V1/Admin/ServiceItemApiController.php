<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceItemRequest;
use App\Http\Requests\UpdateServiceItemRequest;
use App\Http\Resources\Admin\ServiceItemResource;
use App\Models\Service;
use App\Models\ServiceItem;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ServiceItemApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('service_item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ServiceItemResource(ServiceItem::with(['service'])->advancedFilter());
    }

    public function store(StoreServiceItemRequest $request)
    {
        $serviceItem = ServiceItem::create($request->validated());

        return (new ServiceItemResource($serviceItem))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('service_item_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'service' => Service::get(['id', 'title']),
            ],
        ]);
    }

    public function show(ServiceItem $serviceItem)
    {
        abort_if(Gate::denies('service_item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ServiceItemResource($serviceItem->load(['service']));
    }

    public function update(UpdateServiceItemRequest $request, ServiceItem $serviceItem)
    {
        $serviceItem->update($request->validated());

        return (new ServiceItemResource($serviceItem))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(ServiceItem $serviceItem)
    {
        abort_if(Gate::denies('service_item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new ServiceItemResource($serviceItem->load(['service'])),
            'meta' => [
                'service' => Service::get(['id', 'title']),
            ],
        ]);
    }

    public function destroy(ServiceItem $serviceItem)
    {
        abort_if(Gate::denies('service_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $serviceItem->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
