<?php

namespace App\Http\Controllers\Admin;

use App\Articles;
use App\ArticlesCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use function MongoDB\BSON\toJSON;

class ArticleController extends Controller{

    public function categoryList(Request $request){
        return view('admin.article.categoryList');
    }

    public function getCategoryList(){
        $data=ArticlesCategory::select('id','category_name','parent_id')->get();
        return response()->json($data);
    }

    public function createCategory(){
        return view('admin.article.createCategory');
    }

    //栏目新增入库
    public function addCategory(Request $request){
        $data=$request->input('category');
        $cate=ArticlesCategory::create($data);

        return redirect('admin/categoryList');
    }

    //检测栏目是否存在
    public function checkCategory(Request $request){
        $name=$request->input('name');
        $result=ArticlesCategory::where('category_name','=',$name)->first();
        if($result){
            $status=1;
        }else{
            $status=0;
        }
        return response()->json(['status'=>$status]);
    }

    //添加文章
    public function createArticle(){
        $cate=ArticlesCategory::where('parent_id','=','0')->get();
        return view('admin.article.createArticle',['cate'=>$cate]);
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
        //$data1=Articles::->jget();
        //dd($data1);


        $data=Articles::join('articles_category','articles.category_id','articles_category.id')->select('articles.*','articles_category.category_name')->paginate(2);
        return view('admin.article.articleList',['list'=>$data]);
    }
}
