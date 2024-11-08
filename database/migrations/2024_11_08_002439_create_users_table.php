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
            $table->integer('idUser')->autoIncrement()->primary();
            $table->tinyText('Name');
            $table->tinyText('Surname');
            $table->tinyText('Thirdname');
            $table->string('Phone', 17);
            $table->tinyText('Login');
            $table->tinyText('Password');
            $table->integer('roles_idRole');
            $table->foreign('roles_idRole')->references('idRole')->on('roles')->onDelete('NO ACTION')->onUpdate('NO ACTION');
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
