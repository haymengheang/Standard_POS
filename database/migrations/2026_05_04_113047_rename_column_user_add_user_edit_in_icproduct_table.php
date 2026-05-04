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
                 $table->renameColumn('user_add','useradd');
             }
             if (Schema::hasColumn('icproduct','user_edit')){
                 $table->renameColumn('user_edit','useredit');
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
