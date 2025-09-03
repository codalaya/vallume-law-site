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
        Schema::table('testimonials', function (Blueprint $table) {
            $table->string('type')->nullable()->after('image');
            $table->string('video_path')->nullable()->after('type');
            $table->unsignedBigInteger('service_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('testimonials', function (Blueprint $table) {
            $table->dropColumn(['type', 'video_path', 'service_id']);
        });
    }
};
