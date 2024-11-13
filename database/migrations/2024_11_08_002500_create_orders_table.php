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
            $table->integer('id')->autoIncrement()->primary();
            $table->mediumText('message')->nullable();
            $table->date('onDate');
            $table->integer('duration');
            $table->integer('users_idUser');
            $table->integer('typeRoom_idTypeRoom');
            $table->foreign('users_idUser')->references('id')->on('users')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->foreign('typeRoom_idTypeRoom')->references('id')->on('type_rooms')->onDelete('NO ACTION')->onUpdate('NO ACTION');
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
