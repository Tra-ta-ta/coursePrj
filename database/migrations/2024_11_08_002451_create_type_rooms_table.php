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
        Schema::create('typeRooms', function (Blueprint $table){
            $table->integer('idTypeRoom')->autoIncrement()->primary();
            $table->tinyText('TypeRoom');
            $table->double('Price');
            $table->mediumText('Description');
            $table->string('Image', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_rooms');
    }
};
