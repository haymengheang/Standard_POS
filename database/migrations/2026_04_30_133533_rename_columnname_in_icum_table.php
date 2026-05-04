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
        Schema::table('icum', function (Blueprint $table) {
            // if (Schema::hasColumn('icum','UMID')){
            //     $table->renameColumn('UMID','umid');
            // }
            //     if (Schema::hasColumn('icum','UMNAME')){
            //     $table->renameColumn('UMNAME','umname');
            // }
            //     if (Schema::hasColumn('icum','UMNAME2')){
            //     $table->renameColumn('UMNAME2','umname2');
            // }
            //     if (Schema::hasColumn('icum','USERADD')){
            //      $table->renameColumn('USERADD','useradd');
            // }
            //     if (Schema::hasColumn('icum','CREATE_ADD')){
            //      $table->renameColumn('CREATE_ADD','create_add');
            // }
            //     if (Schema::hasColumn('icum','DATE_EDIT')){
            //     $table->renameColumn('DATE_EDIT','date_edit');
            // }
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('icum', function (Blueprint $table) {
            //
        });
    }
};
