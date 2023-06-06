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
        //
        Schema::table('return_items', function (Blueprint $table) {
            $table->dropForeign(['id_loan']);
            $table->dropColumn('id_loan');

            $table->unsignedBigInteger('id_loan_item');
            $table->foreign('id_loan_item')->references('id')->on('loan_items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign(['id_loan_item']);
        $table->dropColumn('id_loan_item');

        $table->unsignedBigInteger('id_loan');
        $table->foreign('id_loan')->references('id')->on('loan_items');
    }
};
