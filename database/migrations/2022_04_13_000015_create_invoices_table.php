<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('invoice_no')->nullable();
            $table->string('is_gst_enabled')->nullable();
            $table->string('gstin')->nullable();
            $table->float('invoice_tax_rate_cgst', 15, 2)->nullable();
            $table->float('invoice_tax_rate_sgst', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
