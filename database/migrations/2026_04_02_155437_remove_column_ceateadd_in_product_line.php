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
        Schema::table('product_line', function (Blueprint $table) {
            if (Schema::hasColumn('product_line','create_add')){
                $table->dropColumn('create_add');
            }
               if (Schema::hasColumn('product_line','update_add')){
                $table->dropColumn('update_add');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_line', function (Blueprint $table) {
            //
        });
    }
};
