<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientCustomDatasTable extends Migration
{
    public function up()
    {
        Schema::create('client_custom_datas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('label');
            $table->string('value')->nullable();
            $table->string('value_type');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
