<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table = 'wl_config';
    protected $primaryKey = 'config_id';
    protected $guarded = ['config_id'];
}
