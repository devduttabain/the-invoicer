<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceItemsTable extends Migration
{
    public function up()
    {
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('unit')->nullable();
            $table->float('quantity', 8, 2);
            $table->string('price_per_unit');
            $table->float('sub_total_price', 15, 2)->nullable();
            $table->float('discount', 15, 2)->nullable();
            $table->float('discount_percentage', 15, 2)->nullable();
            $table->float('tax', 15, 2)->nullable();
            $table->float('tax_percentage', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
