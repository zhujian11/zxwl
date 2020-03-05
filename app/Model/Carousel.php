<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $table = 'wl_carousel';
    protected $primaryKey = 'carousel_id';
    protected $guarded = ['carousel_id'];
}
