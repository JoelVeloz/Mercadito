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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->decimal("price");
            $table->string("title");
            $table->json("data");
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("category_id");

            $table->foreign("user_id")->references("id")->on("roles");
            $table->foreign("category_id")->references("id")->on("categories");
            
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
};
