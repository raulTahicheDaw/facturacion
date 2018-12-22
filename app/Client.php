<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    protected $guarded = ['id'];
    use SoftDeletes;
    protected $dates = ['deleted_at'];

}
