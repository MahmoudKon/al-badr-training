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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id')->constrained('shops')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('show_item_name')->default(true);
            $table->boolean('show_item_price')->default(true);
            $table->boolean('show_item_index')->default(true);
            $table->boolean('show_client_name')->default(true);
            $table->boolean('show_company_name')->default(true);
            $table->boolean('show_invoice_number')->default(true);
            $table->boolean('show_creator_name')->default(true);
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
            Schema::dropIfExists('settings');
        Schema::disableForeignKeyConstraints();
    }
};
