<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('dog_id');
            $table->text('review');
            $table->timestamps();

            $table->foreign('user_id','fk_user')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('dog_id','fk_dog')
                ->references('id')
                ->on('dogs')
                ->onDelete('cascade');

            $table->enum('status',['moderation', 'active', 'rejected']);

        });

    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
