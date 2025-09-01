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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->mediumText('title');
            $table->mediumText('text')->nullable();
            $table->mediumText('title_2')->nullable();
            $table->mediumText('long_text')->nullable();
            $table->mediumText('title_3')->nullable();
            $table->mediumText('long_text_2')->nullable();
            $table->mediumText('title_4')->nullable();
            $table->mediumText('long_text_3')->nullable();
            $table->mediumText('breadcrumb')->nullable();
            SeoFacade::addDatabaseFields($table);
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('pages');
    }
};
