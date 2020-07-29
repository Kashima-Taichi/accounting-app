<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('totalBonus');
            $table->integer('healthInsurance');
            $table->integer('employeePension');
            $table->integer('employmentInsurance');
            $table->integer('incomeTax');
            $table->integer('totalDeduction');
            $table->integer('netIncome');
            $table->integer('year');
            $table->integer('month');
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
        Schema::dropIfExists('bonuses');
    }
}
