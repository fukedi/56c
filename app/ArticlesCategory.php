<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticlesCategory extends Model{
    //
    protected $table='articles_category';

    public $fillable=[
        'category_name','parent_id','is_expand'
    ];

    public $timestamps=false;

    public function getIsExpandAttribute($value){
        return $value==1?'是':'否';
    }
}
