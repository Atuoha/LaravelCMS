<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;


class Post extends Model 
{
    //
    use SoftDeletes;

    use Sluggable;
    use SluggableScopeHelpers;



  

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    protected $fillable = ['title', 'body', 'user_id', 'status', 'comment_id', 'view', 'photo_id', 'category_id'];


    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
