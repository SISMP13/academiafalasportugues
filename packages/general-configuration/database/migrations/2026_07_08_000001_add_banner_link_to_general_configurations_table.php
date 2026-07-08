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
        Schema::table('general_configurations', function (Blueprint $table) {
            $table->mediumText('banner_link')->nullable()->after('business_fax');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('general_configurations', function (Blueprint $table) {
            $table->dropColumn('banner_link');
        });
    }
};
