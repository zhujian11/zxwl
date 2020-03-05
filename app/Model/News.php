<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'wl_news';
    protected $primaryKey = 'news_id';
    protected $guarded =['news_id'];
}
