<?php

use Bittacora\Seo\SeoFacade;
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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->mediumText('title');
            $table->mediumText('text_info')->nullable();
            $table->mediumText('text')->nullable();
            $table->boolean('active')->default(true);
            $table->boolean('inscription')->default(false);
            $table->unsignedInteger('order_column')->nullable();
            SeoFacade::addDatabaseFields($table);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
