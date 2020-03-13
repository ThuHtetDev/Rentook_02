<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = "ratings";
    public function users(){
        return $this->belongsTo('App\User');
    }
    public function book(){
        return $this->belongsTo('App\Book');
    }
    // public function book($bid){
    //     return $this->belongsTo('App\Book')->where('id', $bid);
    // }
}
