<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientCustomDataRequest;
use App\Http\Requests\UpdateClientCustomDataRequest;
use App\Http\Resources\Admin\ClientCustomDataResource;
use App\Models\Client;
use App\Models\ClientCustomData;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClientCustomDataApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('client_custom_data_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ClientCustomDataResource(ClientCustomData::with(['client'])->advancedFilter());
    }

    public function store(StoreClientCustomDataRequest $request)
    {
        $clientCustomData = ClientCustomData::create($request->validated());

        return (new ClientCustomDataResource($clientCustomData))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('client_custom_data_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'client'     => Client::get(['id', 'name']),
                'value_type' => ClientCustomData::VALUE_TYPE_RADIO,
            ],
        ]);
    }

    public function show(ClientCustomData $clientCustomData)
    {
        abort_if(Gate::denies('client_custom_data_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ClientCustomDataResource($clientCustomData->load(['client']));
    }

    public function update(UpdateClientCustomDataRequest $request, ClientCustomData $clientCustomData)
    {
        $clientCustomData->update($request->validated());

        return (new ClientCustomDataResource($clientCustomData))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(ClientCustomData $clientCustomData)
    {
        abort_if(Gate::denies('client_custom_data_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new ClientCustomDataResource($clientCustomData->load(['client'])),
            'meta' => [
                'client'     => Client::get(['id', 'name']),
                'value_type' => ClientCustomData::VALUE_TYPE_RADIO,
            ],
        ]);
    }

    public function destroy(ClientCustomData $clientCustomData)
    {
        abort_if(Gate::denies('client_custom_data_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientCustomData->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
