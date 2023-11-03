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
        Schema::create('product_promos', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // promo name
            $table->string('code')->unique();  // promo code
            $table->enum('discount_type', ['percen','number'])->default('number');
            $table->unsignedInteger('discount');
            $table->unsignedInteger('max_enrolled');
            $table->timestamp('discount_expired');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_promos');
    }
};
