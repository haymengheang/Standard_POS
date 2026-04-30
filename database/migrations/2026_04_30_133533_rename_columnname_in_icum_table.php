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
            $table->renameColumn('UMID','umid');
            $table->renameColumn('UMNAME','umname');
            $table->renameColumn('UMNAME2','umname2');
            $table->renameColumn('USERADD','useradd');
            $table->renameColumn('CREATE_ADD','create_add');
            $table->renameColumn('DATE_EDIT','date_edit');
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
