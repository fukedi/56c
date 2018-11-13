<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Articles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',255)->unique('title')->default('')->comment('标题');
            $table->string('author',50)->default('')->comment('作者');
            $table->unsignedInteger('category_id')->default(0)->comment('分类id');
            $table->unsignedTinyInteger('nature')->default(0)->comment('属性:1头条,2推荐,3特荐,4加粗,5跳转');
            $table->text('content')->comment('内容');
            $table->string('pic',255)->default('')->comment('封面图片');
            $table->string('tag',255)->default('')->comment('标签');
            $table->string('seo_title')->default('')->comment('seo标题');
            $table->string('seo_key')->default('')->comment('seo关键词');
            $table->string('seo_desc')->default('')->comment('seo描述');
            $table->unsignedInteger('hits')->default('0')->comment('点击量');
            $table->unsignedTinyInteger('order_id')->default('0')->comment('排序');
            $table->unsignedInteger('creeated_at')->default(0)->comment('创建时间');
            $table->unsignedInteger('updated_at')->default(0)->comment('更新时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
