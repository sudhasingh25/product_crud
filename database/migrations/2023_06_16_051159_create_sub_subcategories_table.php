<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_subcategories', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->string('subsubcategory_name_en');
            $table->string('subsubcategory_name_hi');

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
        Schema::dropIfExists('sub_subcategories');
    }
}
