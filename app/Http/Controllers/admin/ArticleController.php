<?php

namespace App\Http\Controllers\Admin;

use App\ArticlesCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller{
    //

    public function categoryList(){

        return view('admin.article.categoryList');
    }

    public function createCategory(Request $request){
        $data=$request->input('category');
        $cate=ArticlesCategory::create($data);

        return redirect('admin/categoryList');

        //return 'createCategory';
    }

    //添加文章
    public function createArticle(){

        return view('admin.article.createArticle');
    }

    public function addArticle(Request $request){

        $data=$request->input();
        dd($data);

    }
}
