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
        Schema::create('productentries', function (Blueprint $table) {
          $table->id();
            $table->string('category','50');
            $table->string('pnameid','50');
            $table->string('company','50');
            $table->string('color','50');
            $table->string('material','50');
            $table->string('size','50');
            $table->string('description','5000');
            $table->string('image','100');
            $table->string('image1','100');
            $table->string('image2','100');
            $table->string('image3','100');
            $table->string('image4','100');
            $table->boolean('productstatus')->default(1);
            $table->string('price','100');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productentries');
    }
};
