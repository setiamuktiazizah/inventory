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
        Schema::table('items', function (Blueprint $table) {
            $table->boolean("is_empty");

            $table->dropColumn("barcode");
            $table->dropColumn("name");
            $table->dropColumn("brand");

            $table->dropForeign(["id_category"]);
            $table->dropColumn("id_category");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('is_empty');

            $table->unsignedBigInteger('barcode');
            $table->string('name');
            $table->string('brand');
            $table->unsignedBigInteger('id_category');
            $table->foreign('id_category')->references('id')->on('categories');
        });
    }
};
