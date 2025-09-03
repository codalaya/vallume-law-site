<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lawyer_reviews', function (Blueprint $table) {
            $table->collation = 'utf8mb4_unicode_ci';
            $table->charset = 'utf8mb4';

            $table->integer('id', true);
            $table->integer('lawyer_id')->nullable();
            $table->integer('customer_id')->nullable();
            $table->double('rating')->nullable();
            $table->double('experience')->nullable()->default(0);
            $table->double('communication')->nullable()->default(0);
            $table->double('service')->nullable()->default(0);
            $table->text('comment')->nullable();
            $table->integer('is_active')->default(1);
            $table->boolean('is_approved')->nullable()->default(false);
            $table->boolean('is_featured')->nullable()->default(false);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lawyer_reviews');
    }
};
