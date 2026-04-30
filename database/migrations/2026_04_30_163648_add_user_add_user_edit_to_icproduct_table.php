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
        Schema::table('icproduct', function (Blueprint $table) {
            if (!Schema::hasColumn('icproduct','useradd')){
                $table->string('user_add')->nullable();
            }
            if (!Schema::hasColumn('icproduct','useredit')){
                $table->string('user_edit')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('icproduct', function (Blueprint $table) {
            //
        });
    }
};
