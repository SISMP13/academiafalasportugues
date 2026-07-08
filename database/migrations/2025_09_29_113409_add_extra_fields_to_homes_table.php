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
        Schema::table('homes', function (Blueprint $table) {
            $table->mediumText('title_bloque_1')->nullable()->after('title4');
            $table->mediumText('title_bloque_2')->nullable()->after('title_bloque_1');
            $table->mediumText('title_bloque_3')->nullable()->after('title_bloque_2');
            $table->mediumText('title_bloque_4')->nullable()->after('title_bloque_3');

            $table->mediumText('text_bloque_1')->nullable()->after('title_bloque_4');
            $table->mediumText('text_bloque_2')->nullable()->after('text_bloque_1');
            $table->mediumText('text_bloque_3')->nullable()->after('text_bloque_2');
            $table->mediumText('text_bloque_4')->nullable()->after('text_bloque_3');

            $table->mediumText('text_btn1')->nullable()->after('text_bloque_4');
            $table->mediumText('url_btn1')->nullable()->after('text_btn1');

            $table->mediumText('text_btn3')->nullable()->after('url_btn1');
            $table->mediumText('url_btn3')->nullable()->after('text_btn3');

            $table->mediumText('text_btn4')->nullable()->after('url_btn3');
            $table->mediumText('url_btn4')->nullable()->after('text_btn4');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('homes', function (Blueprint $table) {
            $table->dropColumn([
                'title_bloque_1',
                'title_bloque_2',
                'title_bloque_3',
                'title_bloque_4',
                'text_bloque_1',
                'text_bloque_2',
                'text_bloque_3',
                'text_bloque_4',
                'text_btn1',
                'url_btn1',
                'text_btn3',
                'url_btn3',
                'text_btn4',
                'url_btn4',
            ]);
        });
    }
};
