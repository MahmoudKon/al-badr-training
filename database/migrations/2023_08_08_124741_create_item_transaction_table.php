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
        Schema::create('item_transaction', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id')->constrained('shops')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('item_id')->constrained('items')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('invoice_id')->nullable()->constrained('invoices')->onDelete('cascade')->onUpdate('cascade');
            $table->double('qty');
            $table->double('old_qty');
            $table->double('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::enableForeignKeyConstraints();
            Schema::dropIfExists('item_transaction');
        Schema::disableForeignKeyConstraints();
    }
};
