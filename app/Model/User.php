<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use Ramsey\Uuid\Uuid;

class User extends Model
{
    
    protected $table = 'wl_user';

    protected $primaryKey = 'user_id';

    public $incrementing = false;

    protected $guarded = [];
}
