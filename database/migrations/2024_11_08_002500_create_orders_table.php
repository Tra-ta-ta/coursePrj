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
        Schema::create('orders', function (Blueprint $table){
            $table->integer('idOrder')->autoIncrement()->primary();
            $table->mediumText('Message')->nullable();
            $table->date('OnDate');
            $table->integer('Duration');
            $table->integer('Users_idUser');
            $table->integer('TypeRoom_idTypeRoom');
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
        Schema::dropIfExists('orders');
    }
};
