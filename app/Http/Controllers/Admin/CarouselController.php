<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Carousel;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Carousel::paginate(10);
        return view('admin.carousel.carousel-list',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.carousel.carousel-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $car = new Carousel;
        $car->carousel_img = $request->uploaded_url;
        if(isset($request->switch)){
            $car->carousel_status = $request->switch;
        }
        $res = $car->save();
        if($res){
            $data=['status'=>200,'message'=>'添加成功'];
        }else{
            $data=['status'=>400,'message'=>'添加失败'];
        }
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $car = Carousel::find($id);
        $car->carousel_status = $request->num;
        $res = $car->save();
        if($res){
            
            $data=['status'=>200,'message'=>'设置成功'];
        }else{
            $data=['status'=>400,'message'=>'设置失败'];
        }
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Carousel::destroy($id);
        if($res){
            
            return response()->json(['code'=>200,'message'=>'删除成功']);
        }else{
            return response()->json(['code'=>400,'message'=>'删除失败']);
        }
    }
}
