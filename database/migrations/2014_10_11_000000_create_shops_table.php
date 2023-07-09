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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id')->constrained('shops', 'id')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->boolean('is_active')->comment('0 is deactive | 1 is active');
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
        Schema::dropIfExists('shops');
        Schema::disableForeignKeyConstraints();
    }
};
