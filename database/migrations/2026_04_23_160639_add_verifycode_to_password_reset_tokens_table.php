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
        Schema::table('password_reset_tokens', function (Blueprint $table) {
            if (!Schema::hasColumn('password_reset_tokens','verifycode')){
                $table->string('verifycode','255')->nullable();
            }
        });
    }

    //  if (!Schema::hasColumn('icproduct', 'action')) {
    //         $table->string('action',255)->nullable();
    //     }
    //     });
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('password_reset_tokens', function (Blueprint $table) {
            //
        });
    }
};
