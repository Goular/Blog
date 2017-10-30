<?php
namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];
    //protected $fillable = [];
    //protected $hidden = [];

    public function category()
    {
        return $this->hasOne('App\Entities\Category','id','cate_id');
    }
}