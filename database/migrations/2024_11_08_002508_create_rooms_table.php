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
        Schema::create('rooms', function (Blueprint $table) {
            $table->integer('idRoom')->autoIncrement()->primary();
            $table->integer('Users_idUser');
            $table->integer('TypeRoom_idTypeRoom');
            $table->integer('Number');
            $table->string('StatusRoom', 12);
            $table->foreign('Users_idUser')->references('idUser')->on('users')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->foreign('TypeRoom_idTypeRoom')->references('idTypeRoom')->on('typeRooms')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
