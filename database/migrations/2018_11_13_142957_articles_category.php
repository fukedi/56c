<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ArticlesCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_name',50)->unique('category_name')->default('')->comment('栏目名称');
            $table->unsignedInteger('parent_id')->default(0)->comment('父级栏目id');
            $table->unsignedTinyInteger('is_expand')->default(0)->comment('是否展开,0否1是');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
