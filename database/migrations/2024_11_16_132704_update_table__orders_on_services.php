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
        Schema::table('orders_on_services', function (Blueprint $table) {
            $table->integer('services_idService');
            $table->foreign('services_idService')->references('id')->on('services')->onDelete('NO ACTION')->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders_on_services', function (Blueprint $table) {
            $table->dropForeign('orders_on_services_users_iduser_foreign');
            $table->dropColumn('rooms_idService');
        });
    }
};
