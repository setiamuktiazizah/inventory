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
        Schema::table('add_items', function (Blueprint $table) {
            $table->dropColumn('date');
            // $table->date('date');
        });
        Schema::table('add_items', function (Blueprint $table) {
            // $table->dropColumn('date');
            $table->date('date');
        });
        

        Schema::table('reduce_items', function (Blueprint $table) {
            $table->dropColumn('date');
            // $table->date('date');
        });
        Schema::table('reduce_items', function (Blueprint $table) {
            // $table->dropColumn('date');
            $table->date('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('add_items', function (Blueprint $table) {
            $table->dropColumn('date');
            // $table->dateTime('date');
        });
        Schema::table('add_items', function (Blueprint $table) {
            // $table->dropColumn('date');
            $table->dateTime('date');
        });


        Schema::table('reduce_items', function (Blueprint $table) {
            $table->dropColumn('date');
            // $table->dateTime('date');
        });
        Schema::table('reduce_items', function (Blueprint $table) {
            // $table->dropColumn('date');
            $table->dateTime('date');
        });
    }
};
