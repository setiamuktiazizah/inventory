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
        Schema::create('loan_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('loan_date');
            $table->date('max_return_date');
            $table->string('path_file_cdn')->nullable();
            $table->string('status');
            $table->text('note')->nullable();
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
        Schema::dropIfExists('loan_requests');
    }
};
