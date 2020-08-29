<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'body', 'author', 'is_active', 'post_id', 'email', 'photo'
    ];



    public function replies(){
        return $this->hasMany('App\CommentReply');
    }

    public function post(){
        return $this->belongsTo('App\Post');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

}
