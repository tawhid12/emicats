<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Constants\Status;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('ref')->index()->nullable();
            $table->text('ref1')->index()->nullable();
            $table->text('ref2')->index()->nullable();
            $table->text('description')->nullable();
            $table->text('years')->nullable();
            $table->foreignId('manufacturer_id')->nullable()->constrained('manufacturers');
            $table->decimal('weight', 10, 2)->default(0.00);
            $table->integer('pt')->default(0);
            $table->integer('pd')->default(0);
            $table->integer('rh')->default(0);
            $table->string('status')->default(Status::DRAFT);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
