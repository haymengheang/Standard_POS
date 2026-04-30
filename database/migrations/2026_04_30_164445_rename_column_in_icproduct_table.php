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
            if (Schema::hasColumn('icproduct','user_add')){
                $table->renameColumn('useradd','user_add');
            }
                if (Schema::hasColumn('icproduct','user_edit')){
                $table->renameColumn('useredit','user_edit');
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
