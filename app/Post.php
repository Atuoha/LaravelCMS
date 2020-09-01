<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Post extends Model implements SluggableInterface
{
    //
    use SoftDeletes;

    use SluggableTrait;

    protected $sluggable = [
    'build_from'=> 'title',
    'save_to'  => 'slug',
    'on_update' => true
    ];


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
