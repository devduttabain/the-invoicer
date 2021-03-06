<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInvoiceItemsTable extends Migration
{
    public function up()
    {
        Schema::table('invoice_items', function (Blueprint $table) {
            $table->unsignedBigInteger('invoice_id')->nullable();
            $table->foreign('invoice_id', 'invoice_fk_6425478')->references('id')->on('invoices');
            $table->unsignedBigInteger('service_id')->nullable();
            $table->foreign('service_id', 'service_fk_6425582')->references('id')->on('services');
            $table->unsignedBigInteger('service_item_id')->nullable();
            $table->foreign('service_item_id', 'service_item_fk_6425583')->references('id')->on('service_items');
        });
    }
}
