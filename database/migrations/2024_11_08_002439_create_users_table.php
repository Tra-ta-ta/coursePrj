<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->primary();
            $table->tinyText('name');
            $table->tinyText('surname');
            $table->tinyText('thirdname');
            $table->string('phone', 17);
            $table->tinyText('login');
            $table->tinyText('password');
            $table->integer('roles_idRole')->default(1);
            $table->foreign('roles_idRole')->references('id')->on('roles')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
