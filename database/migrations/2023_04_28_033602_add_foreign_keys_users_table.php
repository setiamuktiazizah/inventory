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
<<<<<<< HEAD:database/migrations/2014_10_12_100000_create_password_resets_table.php
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
=======
        //
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('id_role')->references('id')->on('roles');
>>>>>>> 4b529e1a64299f95ccef84ac80c230ba588b987e:database/migrations/2023_04_28_033602_add_foreign_keys_users_table.php
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['idRole']);
        });
    }
};
