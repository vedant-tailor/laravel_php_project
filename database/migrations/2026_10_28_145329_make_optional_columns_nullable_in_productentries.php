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
            $table->string('company',   '50')->nullable()->change();
            $table->string('color',     '50')->nullable()->change();
            $table->string('material',  '50')->nullable()->change();
            $table->string('size',      '50')->nullable()->change();
            $table->string('description', '5000')->nullable()->change();
            $table->string('price',     '100')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('productentries', function (Blueprint $table) {
            $table->string('company',   '50')->nullable(false)->change();
            $table->string('color',     '50')->nullable(false)->change();
            $table->string('material',  '50')->nullable(false)->change();
            $table->string('size',      '50')->nullable(false)->change();
            $table->string('description', '5000')->nullable(false)->change();
            $table->string('price',     '100')->nullable(false)->change();
        });
    }
};
