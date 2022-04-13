<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceItemsTable extends Migration
{
    public function up()
    {
        Schema::create('service_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->float('estimated_effort_in_hours', 11, 2)->nullable();
            $table->float('cost_per_hour', 15, 2)->nullable();
            $table->float('actual_effort_in_hour', 15, 2)->nullable();
            $table->datetime('deadline')->nullable();
            $table->datetime('ended_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
