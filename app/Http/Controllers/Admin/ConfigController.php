<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Config;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configs = Config::get();
        return view('admin.config.config-list',compact('configs'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.config.config-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $config = new Config;
        $config->config_title = $request->config_title;
        $config->config_name = $request->config_name;
        $config->config_content =$request->content;
        $res = $config->save();
        if($res){
            $this->putContent();
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
        $config = Config::find($id);
        
        return view('admin.config.config-edit',compact('config'));
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
        $config = Config::find($id);
        $config->config_title = $request->config_title;
        $config->config_name = $request->config_name;
        $config->config_content =$request->content;
        $res = $config->save();
        if($res){
            $this->putContent();
            $data=['status'=>200,'message'=>'编辑成功'];
        }else{
            $data=['status'=>400,'message'=>'编辑失败'];
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
        $res = Config::destroy($id);
        if($res){
            $this->putContent();
            return response()->json(['code'=>200,'message'=>'删除成功']);
        }else{
            return response()->json(['code'=>400,'message'=>'删除失败']);
        }
    }

    public function onlyName(Request $request)
    {
        $res = Config::where('config_name',$request->name)->first();
        if($res){
            return 1;
        }else{
            return 0;
        }
    }

    public function onlyEditName(Request $request)
    {
        if($request->name!=$request->originname){
            $res = Config::where('config_name',$request->name)->first();
            if($res){
                return 1;
            }else{
                return 0;
            }
        }

        return 0;
    }

    public function putContent()
    {
        $content = Config::pluck('config_content','config_name')->all();
        
        $str = '<?php return '.var_export($content,true).';';
        
        file_put_contents(config_path().'/webconfig.php',$str);
    }
}
