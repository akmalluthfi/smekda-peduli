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
        Schema::create('donations', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->enum('status', ['success', 'pending', 'failed']);
            $table->integer('amount');
            $table->string('snap_token')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('campaign_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donations');
    }
};
