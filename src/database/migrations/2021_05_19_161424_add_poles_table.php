<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poles', function (Blueprint $table) {
            $table->id();
            $table->string('type_id');
            $table->decimal('lon', 11, 8);
            $table->decimal('lat', 10, 8);
            $table->string('nv');
            $table->integer('zspr');
            $table->string('console');
            $table->string('isolation');
            $table->string('grounded');
            $table->string('disconnector');
            $table->json('rev')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('poles');
    }
}
