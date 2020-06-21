<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrashedCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trashed_costs', function (Blueprint $table) {
            $table->integer('id');
            $table->string('accountName');
            $table->integer('price');
            $table->string('journal');
            $table->integer('year');
            $table->integer('month');
            $table->integer('day');
            $table->date('date');
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
        Schema::dropIfExists('trashed_costs');
    }
}
