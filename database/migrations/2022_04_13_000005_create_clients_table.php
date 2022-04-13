<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('is_business')->nullable();
            $table->string('business_name')->nullable();
            $table->string('is_gst_enabled')->nullable();
            $table->string('gstin')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
