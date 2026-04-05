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
        Schema::create('icum', function (Blueprint $table) {
            $table->string('UMID')->primary();
            $table->string('UMNAME');
            $table->string('UMNAME2');
            $table->string('USERADD');
            $table->timestamp('CREATE_ADD')->nullable();
            $table->timestamp('DATE_EDIT')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('icum');
    }
};
