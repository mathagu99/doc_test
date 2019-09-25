<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //table name changing here
    
//Table name
protected $table = 'posts';
//Primary key
public $primaryKey = 'id';
//Timestamps
public $timestamps = true;
    
}
