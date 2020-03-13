<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $table= "books";
    protected $fillable = ['name','description'];

    public function bookRatings(){
        return $this->hasMany('App\Rating');
    }
}
