<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'wl_category';
    protected $primaryKey = 'category_id';
    public $incrementing = false;
    protected $guarded = [];

    public function getFatherName($pid)
    {
        if($pid != '0'){
            return Category::find($pid)->category_name;
        }
        return '无';
    }

    /* 删除时判断该栏目下有无子栏目 */
    public static function hasChildrenCate($id)
    {
        $pid = Category::find($id)->category_pid;
        if($pid == '0'){
            $ids = Category::where('category_pid',$id)->pluck('category_id')->toArray();
            
            array_push($ids,$id);
            return $ids;
        }else{
            return false;
        }
    }
}
