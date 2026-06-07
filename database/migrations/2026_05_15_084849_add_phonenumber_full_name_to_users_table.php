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
        Schema::table('users', function (Blueprint $table) {
            if(!schema::hasColumn('users', 'phone_number')){
                $table->string('phonenumber')->nullable()->after('email');
            }
            if(!schema::hasColumn('users', 'full_name')){
                $table->string('full_name')->nullable()->after('phonenumber');
            }
            if(!schema::hasColumn('users', 'profile')){
                $table->string('profile')->nullable()->after('full_name');
            }
            if(!schema::hasColumn('users', 'bio')){
                $table->text('bio')->nullable()->after('profile');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
