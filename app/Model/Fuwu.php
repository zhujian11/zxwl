<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use Ramsey\Uuid\Uuid;

class Fuwu extends Model
{

    protected $table = 'wl_fuwu';

    protected $primaryKey = 'fuwu_id';

    public $incrementing = false;

    protected $guarded = [];
    
}
