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
        Schema::create('product_line', function (Blueprint $table) {
            $table->string("productlineid")->primary();
            $table->string("productlinename");
            $table->string("productlinename2");
            $table->string("noted");
            $table->double("disc");
            $table->string("picture");
            $table->integer("active");
            $table->string("useradd");
            $table->string("useredit");
            $table->timestamp("create_add")->nullable();
            $table->timestamp("update_add")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_line');
    }
};
