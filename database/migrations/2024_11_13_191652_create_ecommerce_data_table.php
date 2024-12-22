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
        Schema::create('ecommerce_data', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("webpage_banner");
            $table->string("email");
            $table->string("instagram");
            $table->string("facebook");
            $table->string("whatsapp");
            $table->string("webpage_icon");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ecommerce_data');
    }
};
