<?php

namespace App\Http\Controllers\Admin;

use App\Articles;
use App\ArticlesCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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

    //文章新增入库
    public function addArticle(Request $request){

        $data=$request->input();

        $info['title']=$data['title'];
        $info['category_id']=$data['category_id'];
        $info['author']=$data['author'];
        $info['content']=$data['content'];

        if(Articles::create($info)){
            return redirect('admin/articleList');
        }
    }

    //文章列表
    public function articleList(){
        $data=Articles::paginate(2);
        return view('admin.article.articleList',['list'=>$data]);
    }
}
