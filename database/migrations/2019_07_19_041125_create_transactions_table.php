<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('transaction_code');
            $table->unsignedInteger('member_id');
            $table->string('member_name');
            $table->unsignedInteger('treatment_id');
            $table->string('code_treatment');
            $table->string('treatment_name');
            $table->string('catatan');
            $table->integer('extra');
            $table->integer('total');
            $table->unsignedInteger('user_id');
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
        Schema::dropIfExists('transactions');
    }
}
