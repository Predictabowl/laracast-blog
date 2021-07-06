<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId("post_id")->constrained()->cascadeOnDelete(); // it's the same as the 2 rows below
            $table->foreignId("user_id")->constrained()->cascadeOnDelete(); // it's the same as the 2 rows below
            $table->text("body");
            $table->timestamps();

            /*$table->unsignedBigInteger("post_id"); //must be the same type as the Post id
            $table->foreign("post_id")->references("id")->on("posts")->cascadeOnDelete();*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
