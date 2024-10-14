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
        Schema::create('administrations_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('administrationId')->cascadeOnDelete();
            $table->string('administrativeCategory');
            $table->timestamp('nextAdministration');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrations_details');
    }
};
