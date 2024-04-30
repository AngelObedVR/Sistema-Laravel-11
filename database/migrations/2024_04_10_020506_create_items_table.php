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
        Schema::create('items', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name', 150)->required();
            $table->string('description', 255);
            $table->string('barcode', 64)->required();
            $table->decimal('buy_price', total: 8, places: 2)->required();
            $table->decimal('sale_price', total: 8, places: 2)->required();
            $table->smallInteger('stock')->required();
            $table->boolean('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
