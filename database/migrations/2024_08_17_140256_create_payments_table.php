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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->timestamp('payment_date')->useCurrent();
            $table->decimal('amount', 10, 2);
            $table->enum('payment_method', ['card', 'mobile', 'cash']);
            $table->enum('payment_status', ['paid', 'unpaid', 'refunded'])->default('unpaid');
            $table->string('transaction_id')->nullable();
            $table->string('code')->unique();
            $table->boolean('actif')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
