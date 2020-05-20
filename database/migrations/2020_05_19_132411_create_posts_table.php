<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string("title", 150)->unique();
            $table->string("slug")->unique();
            $table->longText("body");
            $table->string("author")->nullable();
            $table->string("img_path")->default("https://bit.ly/3cMH2qM")->nullable();
            $table->boolean("published")->default(0);
            $table->dateTime("published_at")->nullable();
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
        Schema::dropIfExists('posts');
    }
}
