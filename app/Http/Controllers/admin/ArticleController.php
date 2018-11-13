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
}
