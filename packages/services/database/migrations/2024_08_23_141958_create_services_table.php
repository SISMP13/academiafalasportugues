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
        Schema::create(config('bpanel4-services.table_name'), function (Blueprint $table) {
            $table->id();
            $table->mediumText('title');
            $table->mediumText('text_home')->nullable();
            $table->mediumText('text')->nullable();
            $table->unsignedInteger('order_column')->nullable();
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
        Schema::dropIfExists(config('bpanel4-services.table_name'));
    }
};
