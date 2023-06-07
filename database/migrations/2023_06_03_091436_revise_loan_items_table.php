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
        Schema::table('loan_items', function($table) {
            $table->string('status');

            $table->dropColumn('quantity');
            $table->dropColumn('max_return_date');
            $table->dropForeign(['id_item']);
            $table->dropColumn('id_item');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('loan_items', function($table) {
            $table->dropColumn('status');

            $table->unsignedBigInteger('quantity');
            $table->date('max_return_date');
            $table->unsignedBigInteger('id_item');
            $table->foreign('id_item')->references('id')->on('items');
        });
    }
};
