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
        Schema::table('productentries', function (Blueprint $table) {
            $table->string('image',  '100')->nullable()->change();
            $table->string('image1', '100')->nullable()->change();
            $table->string('image2', '100')->nullable()->change();
            $table->string('image3', '100')->nullable()->change();
            $table->string('image4', '100')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('productentries', function (Blueprint $table) {
            $table->string('image',  '100')->nullable(false)->change();
            $table->string('image1', '100')->nullable(false)->change();
            $table->string('image2', '100')->nullable(false)->change();
            $table->string('image3', '100')->nullable(false)->change();
            $table->string('image4', '100')->nullable(false)->change();
        });
    }
};
