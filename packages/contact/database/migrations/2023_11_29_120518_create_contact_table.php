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
        Schema::create('contact', function (Blueprint $table) {
            $table->id();
            $table->longText('title')->nullable();
            $table->longText('text')->nullable();
            $table->longText('address')->nullable();
            $table->longText('phone')->nullable();
            $table->longText('mobile')->nullable();
            $table->longText('fax')->nullable();
            $table->longText('email')->nullable();
            $table->longText('latitude')->nullable();
            $table->longText('longitude')->nullable();
            $table->longText('zoom')->nullable();
            \Bittacora\Seo\SeoFacade::addDatabaseFields($table);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('contact');
        Schema::enableForeignKeyConstraints();
    }
};
