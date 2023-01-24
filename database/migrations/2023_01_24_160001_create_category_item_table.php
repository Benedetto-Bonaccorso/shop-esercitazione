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
        Schema::create('category_item', function (Blueprint $table) {
            $table->unsignedBigInteger('item_id');
            $table->foreign("item_id")->references("id")->on("items")->cascadeOnDelete();

            $table->unsignedBigInteger('category_id');
            $table->foreign("category_id")->references("id")->on("categories")->cascadeOnDelete();

            $table->primary(["item_id", "category_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_item');
    }
};
