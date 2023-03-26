<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        # tip to rollback last if need to redo last migration
        # php artisan migrate:rollback
        # php artisan migrate

        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('book_id'); # foreign key: books
            $table->text('content');
            $table->string('first_name');
            $table->string('last_name');
            $table->smallInteger('rating');
            $table->boolean('recommended');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};