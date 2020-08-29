<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    //

    protected $fillable = [
        'reply', 'author', 'email' , 'comment_id', 'is_active','photo'
    ];


    public function comment(){
        return $this->belongsTo('App\Comment');
    }
}
