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
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('price');
            $table->boolean('is_active')->default(true)->comment("To Show His Items In Sale Page");
            $table->foreignId('shop_id')->constrained('shops')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('unit_id')->constrained('units')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::enableForeignKeyConstraints();
            Schema::dropIfExists('items');
        Schema::disableForeignKeyConstraints();
    }
};
