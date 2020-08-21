<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //

    protected $fillable = ['name'];
    protected $upload = '/images/';

    public function getNameAttribute($photo){
        return $this->upload . $photo;
    }
}
