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
        Schema::create('invoice_settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('client-name')->default(true);
            $table->boolean('client-address')->default(true);
            $table->boolean('client-email')->default(true);
            $table->boolean('client-phone')->default(true);

            $table->boolean('shop-name')->default(true);
            $table->boolean('shop-address')->default(true);
            $table->boolean('shop-email')->default(true);

            $table->boolean('invoice-id')->default(true);
            $table->boolean('invoice-qr')->default(true);
            $table->boolean('invoice-date')->default(true);
            $table->foreignId('shop_id')->constrained('shops')->onDelete('cascade')->onUpdate('cascade');
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
            Schema::dropIfExists('invoice_settings');
        Schema::disableForeignKeyConstraints();
    }
};
