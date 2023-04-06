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
        Schema::create('loan_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->int('quantity');
            $table->date('max_return_date');
            $table->foreignId('id_loan_request')->constrained('loan_requests')->cascadeOnDelete();
            $table->foreignId('id_item')->constrained('items')->nullOnDelete();
            $table->dateTime('created_at');
            $table->foreignId('created_by')->constrained('users')->nullOnDelete();
            $table->dateTime('updated_at')->nullable();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
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
        Schema::dropIfExists('loan_items');
    }
};
