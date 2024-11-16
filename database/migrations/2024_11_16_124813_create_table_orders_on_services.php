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
        Schema::create('orders_on_services', function (Blueprint $table) {
            $table->integer('id')->primary()->autoIncrement();
            $table->integer('rooms_idRoom');
            $table->integer('users_idUser');
            $table->foreign('rooms_idRoom')->references('id')->on('rooms')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->foreign('users_idUser')->references('id')->on('users')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->string('status', 15);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_on_services');
    }
};
