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
        Schema::create('general_configurations', function (Blueprint $table) {
            $table->id();

            $table->mediumText('sender_name')->nullable();
            $table->mediumText('sender_email')->nullable();
            $table->mediumText('reception_email')->nullable();

            $table->mediumText('title')->nullable();
            $table->mediumText('meta_title')->nullable();
            $table->mediumText('meta_description')->nullable();
            $table->mediumText('meta_keywords')->nullable();

            $table->mediumText('facebook')->nullable();
            $table->mediumText('x')->nullable();
            $table->mediumText('instagram')->nullable();
            $table->mediumText('linkedin')->nullable();
            $table->mediumText('whatsapp')->nullable();
            $table->mediumText('youtube')->nullable();
            $table->mediumText('tiktok')->nullable();

            $table->mediumText('business_address')->nullable();
            $table->mediumText('business_postal_code')->nullable();
            $table->mediumText('business_city')->nullable();
            $table->mediumText('business_province')->nullable();
            $table->mediumText('business_country')->nullable();
            $table->mediumText('business_phone')->nullable();
            $table->mediumText('business_fax')->nullable();
            $table->mediumText('business_mobile')->nullable();
            $table->mediumText('business_email')->nullable();

            $table->mediumText('footer_copyright')->nullable();
            $table->mediumText('footer_description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('general_configurations');
        Schema::enableForeignKeyConstraints();
    }
};
