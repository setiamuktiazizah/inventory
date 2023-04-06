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
        Schema::create('reduce_items', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->int('quantity');
            $table->string('cause');
            $table->foreignId('id_item')->constrained('items')->nullOnDelete();
            $table->dateTime('created_at');
            $table->foreignId('created_by')->constrained('users')->nullOnDelete();
            $table->dateTime('updated_at')->nullable();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reduce_items');
    }
};
