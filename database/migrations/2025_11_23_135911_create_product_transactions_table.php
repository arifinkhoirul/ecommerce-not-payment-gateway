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
        Schema::create('product_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->text('address');
            $table->string('city');
            $table->string('post_code');
            $table->string('booking_trx_id');

            $table->foreignId('shoe_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('shoe_size');

            $table->unsignedBigInteger('quantity');
            $table->unsignedBigInteger('sub_total_amount');

            $table->foreignId('promo_code_id')->nullable()->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('discount_amount');

            $table->unsignedBigInteger('grand_total_amount');

            $table->boolean('is_paid');
            $table->string('proof');
            $table->softDeletes();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_transactions');
    }
};
