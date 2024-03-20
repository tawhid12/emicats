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
            $table->integer('pt')->default(0);
            $table->decimal('pt_value', 10, 2)->default(0.00)->comment('Platinium Value for calculation');
            $table->integer('pt_per')->default(0);
            $table->integer('pd')->default(0);
            $table->decimal('pd_value', 10, 2)->default(0.00)->comment('Pladdium Value for calculation');
            $table->integer('pd_per')->default(0);
            $table->integer('rh')->default(0);
            $table->decimal('rh_value', 10, 2)->default(0.00)->comment('Rhodium Value for calculation');
            $table->integer('rh_per')->default(0);
            $table->decimal('exchange_rate', 10, 2)->default(0.00)->comment('AED to Dollar Conversion Rate');
            $table->decimal('minus_val', 10, 2)->default(0.00)->comment('Per Kilo Minus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
