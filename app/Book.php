<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // Table Name
    protected $table ='books';
    //primary key
    public $primaryKey = 'id';
    //Timestamp
    public $timesTamp = true;

    public function user(){
        return $this -> belongsTo('App\User');

    }
}
