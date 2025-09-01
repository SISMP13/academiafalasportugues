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
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->mediumText('title')->nullable();
            $table->mediumText('text')->nullable();
            $table->mediumText('text_btn')->nullable();
            $table->mediumText('url_btn')->nullable();
            $table->mediumText('text_btn2')->nullable();
            $table->mediumText('url_btn2')->nullable();
            $table->mediumText('title2')->nullable();
            $table->mediumText('text2')->nullable();
            $table->mediumText('title3')->nullable();
            $table->mediumText('text3')->nullable();
            $table->mediumText('title4')->nullable();
            $table->mediumText('text4')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homes');
    }
};
