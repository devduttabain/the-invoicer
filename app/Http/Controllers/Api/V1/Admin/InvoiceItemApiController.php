<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInvoiceItemRequest;
use App\Http\Requests\UpdateInvoiceItemRequest;
use App\Http\Resources\Admin\InvoiceItemResource;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Service;
use App\Models\ServiceItem;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InvoiceItemApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('invoice_item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InvoiceItemResource(InvoiceItem::with(['invoice', 'service', 'serviceItem'])->advancedFilter());
    }

    public function store(StoreInvoiceItemRequest $request)
    {
        $invoiceItem = InvoiceItem::create($request->validated());

        return (new InvoiceItemResource($invoiceItem))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('invoice_item_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'invoice'      => Invoice::get(['id', 'invoice_no']),
                'service'      => Service::get(['id', 'title']),
                'service_item' => ServiceItem::get(['id', 'title']),
            ],
        ]);
    }

    public function show(InvoiceItem $invoiceItem)
    {
        abort_if(Gate::denies('invoice_item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InvoiceItemResource($invoiceItem->load(['invoice', 'service', 'serviceItem']));
    }

    public function update(UpdateInvoiceItemRequest $request, InvoiceItem $invoiceItem)
    {
        $invoiceItem->update($request->validated());

        return (new InvoiceItemResource($invoiceItem))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(InvoiceItem $invoiceItem)
    {
        abort_if(Gate::denies('invoice_item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new InvoiceItemResource($invoiceItem->load(['invoice', 'service', 'serviceItem'])),
            'meta' => [
                'invoice'      => Invoice::get(['id', 'invoice_no']),
                'service'      => Service::get(['id', 'title']),
                'service_item' => ServiceItem::get(['id', 'title']),
            ],
        ]);
    }

    public function destroy(InvoiceItem $invoiceItem)
    {
        abort_if(Gate::denies('invoice_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoiceItem->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
