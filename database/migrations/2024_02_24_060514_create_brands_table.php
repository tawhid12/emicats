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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('b_name');
            $table->string('status')->default(Status::DRAFT);
            $table->timestamps();
            $table->softDeletes();
        });
        DB::table('brands')->insert([
            ['b_name' => 'ABARTH'],
            ['b_name' => 'ALFA ROMEO'],
            ['b_name' => 'ASTON MARTIN'],
            ['b_name' => 'AUDI'],
            ['b_name' => 'BMW'],
            ['b_name' => 'CHEVROLET'],
            ['b_name' => 'CHRYSLER'],
            ['b_name' => 'CITROEN'],
            ['b_name' => 'DACIA'],
            ['b_name' => 'DAEWOO'],
            ['b_name' => 'DAIHATSU'],
            ['b_name' => 'DAIMLER'],
            ['b_name' => 'DODGE'],
            ['b_name' => 'FERRARI'],
            ['b_name' => 'FIAT'],
            ['b_name' => 'FORD'],
            ['b_name' => 'GALLOPER'],
            ['b_name' => 'HOLDEN'],
            ['b_name' => 'HONDA'],
            ['b_name' => 'HYUNDAI'],
            ['b_name' => 'INNOCENT'],
            ['b_name' => 'ISUZU'],
            ['b_name' => 'IVECO'],
            ['b_name' => 'JAGUAR'],
            ['b_name' => 'JEEP'],
            ['b_name' => 'KIA'],
            ['b_name' => 'LADA'],
            ['b_name' => 'LANCIA'],
            ['b_name' => 'LAND ROVER'],
            ['b_name' => 'LDV'],
            ['b_name' => 'LEXUS'],
            ['b_name' => 'LOTUS'],
            ['b_name' => 'MASERATI'],
            ['b_name' => 'MAZDA'],
            ['b_name' => 'MERCEDES'],
            ['b_name' => 'MG'],
            ['b_name' => 'MINI'],
            ['b_name' => 'MITSUBISHI'],
            ['b_name' => 'MORGAN'],
            ['b_name' => 'NISSAN'],
            ['b_name' => 'OPEL'],
            ['b_name' => 'PEUGEOT'],
            ['b_name' => 'PORSCHE'],
            ['b_name' => 'PROTON'],
            ['b_name' => 'RENAULT'],
            ['b_name' => 'ROVER'],
            ['b_name' => 'SAAB'],
            ['b_name' => 'SEAT'],
            ['b_name' => 'SKODA'],
            ['b_name' => 'SMART'],
            ['b_name' => 'SSANGYONG'],
            ['b_name' => 'SUBARU'],
            ['b_name' => 'SUZUKI'],
            ['b_name' => 'TOYOTA'],
            ['b_name' => 'TVR'],
            ['b_name' => 'VAUXHALL'],
            ['b_name' => 'VOLKSWAGEN'],
            ['b_name' => 'VOLVO']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
