<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // drop id_item on LoanRequest
        Schema::table('loan_requests', function (Blueprint $table) {
            $table->dropForeign(['id_item']);
            $table->dropColumn('id_item');
        });

        // create LoanObject
        Schema::create('loan_objects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_loan_request');
            $table->unsignedBigInteger('id_item');

            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->foreign('id_loan_request')->references('id')->on('loan_requests');
            $table->foreign('id_item')->references('id')->on('items');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan_objects');

        Schema::table('loan_requests', function (Blueprint $table) {
            $table->unsignedBigInteger('id_item');
            $table->foreign('id_item')->references('id')->on('items');
        });
    }
};
