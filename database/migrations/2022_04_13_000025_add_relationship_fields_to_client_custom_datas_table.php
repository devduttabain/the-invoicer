<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToClientCustomDatasTable extends Migration
{
    public function up()
    {
        Schema::table('client_custom_datas', function (Blueprint $table) {
            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id', 'client_fk_6365291')->references('id')->on('clients');
        });
    }
}
