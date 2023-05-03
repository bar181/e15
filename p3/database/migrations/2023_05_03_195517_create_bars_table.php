<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bars', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->bigInteger('user_id')->unsigned();
            $table->string('name');
            $table->string('slug');
            $table->string('topic');
            $table->boolean('share');

            $table->string('title1')->nullable();
            $table->text('content1')->nullable();
            $table->bigInteger('image1')->nullable()->unsigned();

            $table->string('title2')->nullable();
            $table->text('content2')->nullable();
            $table->bigInteger('image2')->nullable()->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('image1')->references('id')->on('images');
            $table->foreign('image2')->references('id')->on('images');
            $table->index('share');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bars');
    }
};