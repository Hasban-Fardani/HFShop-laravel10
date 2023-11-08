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
        //
        Schema::table('expedition_prices', function (Blueprint $table) {
            $table->unsignedBigInteger("city_from_id");
            $table->unsignedBigInteger("city_to_id");
            $table->foreign("city_from_id")->references("id")->on("cities");
            $table->foreign("city_to_id")->references("id")->on("cities");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
