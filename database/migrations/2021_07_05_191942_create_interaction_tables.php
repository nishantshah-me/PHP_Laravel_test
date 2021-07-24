<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInteractionTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->id();
            $table->dateTime('created_at', $precision = 0);
            $table->foreignId('creator_id')->constrained();
            $table->foreignId('fan_id')->constrained();
        });
        Schema::create('views', function (Blueprint $table) {
            $table->id();
            $table->dateTime('created_at', $precision = 0);
            $table->foreignId('fan_id')->constrained();
            $table->foreignId('post_id')->constrained();
        });
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->dateTime('created_at', $precision = 0);
            $table->foreignId('fan_id')->constrained();
            $table->foreignId('post_id')->constrained();
        });
        Schema::create('shares', function (Blueprint $table) {
            $table->id();
            $table->dateTime('created_at', $precision = 0);
            $table->foreignId('fan_id')->constrained();
            $table->foreignId('post_id')->constrained();
        });
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->dateTime('created_at', $precision = 0);
            $table->foreignId('fan_id')->constrained();
            $table->foreignId('post_id')->constrained();
            $table->string('text');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        foreach(['follows', 'views', 'comments', 'likes', 'shares'] as $name) {
            Schema::dropIfExists($name);
        }
    }
}
