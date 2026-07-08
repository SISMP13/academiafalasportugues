<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private string $locationModule = 'home';
    private string $locationName = 'Imagen del slide';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('home_slides', function (Blueprint $table) {
            $table->id();
            $table->mediumText('title')->nullable();
            $table->mediumText('text')->nullable();
            $table->mediumText('text_btn')->nullable();
            $table->mediumText('url_btn')->nullable();
            $table->mediumText('text_btn2')->nullable();
            $table->mediumText('url_btn2')->nullable();
            $table->unsignedInteger('order_column')->nullable();
            $table->boolean('active')->default(true);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });

        if (Schema::hasTable('content_multimedia_images_location')) {
            DB::table('content_multimedia_images_location')->insert([
                'module' => $this->locationModule,
                'name' => $this->locationName,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_slides');

        if (Schema::hasTable('content_multimedia_images_location')) {
            DB::table('content_multimedia_images_location')
                ->where('module', $this->locationModule)
                ->where('name', $this->locationName)
                ->delete();
        }
    }
};
