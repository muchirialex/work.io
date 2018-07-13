<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    // Table Name
    protected $table = 'works';
    //Primary Key
    protected $primarykey = 'id';
    //Timestamps
    public $timestamps = true;
}
