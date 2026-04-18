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
            $table->renameColumn('PRICE','price');
            $table->renameColumn('PRODUCTID','productid');
            $table->renameColumn('PRODUCTNAME','productname');
            $table->renameColumn('PRODUCTNAME2','productname2');
            $table->renameColumn('UNIT_OF_MEASURE','unit_of_measure');
            $table->renameColumn('IMGE','image');
            $table->renameColumn('PRODUCT_LINE','product_line');
            $table->renameColumn('OTHER_PRICE','other_price');
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
