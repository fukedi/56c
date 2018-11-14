<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model{

    protected $table='articles';
    //
    protected $fillable=[
        'title','content','author','category_id'
    ];

    //转化时间格式
    public function fromDateTime($value){
        return time(parent::fromDateTime($value));
    }
}
