<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Url;
use Validator;
use Illuminate\Validation\Rule;
class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res=Url::all();
        return view('admin/url/index',['res'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/url/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post=$request->except('_token');
        //dump($post);
        $request->validate([
            'url_name'=>'required|unique:url|regex:/^[\x{4e00}-\x{9fa5}\w]{2,10}$/u',
            'url_wang'=>'required|regex:/http[s]{0,1}:\/\/([\w.]+\/?)\S*/',
        ],[
            'url_name.required'=>"网站名称必填",
            'url_name.unique'=>"网站名称已存在",
            'url_name.regex'=>"网站名称由中文数字字母开头 长度为2-10位",
            'url_wang.required'=>"网址必填",
            'url_wang.regex'=>"网址应由http://开头"
        ]);
        //文件上传
        if($request->hasFile('url_logo')){
            $post['url_logo']=upload('url_logo');
        }
        //dd($post['url_logo']);
        $res=Url::insert($post);
        if($res){
            return redirect('Url');
        }
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
        $res=Url::find($id);
        return view('admin/url/update',['res'=>$res]);
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
        $post=$request->except('_token');
        $Validator=Validator::make($post,[
            'url_name'=>[
                'required',
                    Rule::unique('url')->ignore($id,'url_id'),
            'regex:/^[\x{4e00}-\x{9fa5}\w]{2,10}$/u'
        ],
            'url_wang'=>'required|regex:/http[s]{0,1}:\/\/([\w.]+\/?)\S*/',
        ],[
            'url_name.required'=>"网站名称必填",
            'url_name.unique'=>"网站名称已存在",
            'url_name.regex'=>"网站名称由中文数字字母开头 长度为2-10位",
            'url_wang.required'=>"网址必填",
            'url_wang.regex'=>"网址应由http://开头"
        ]);
        if($Validator->fails()){
            return redirect('Url/edit/'.$id)->withErrors($Validator)->withInput();
        }
        $res=Url::where('url_id',$id)->update($post);
        if($res!==false){
            return redirect('/Url');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res=Url::destroy($id);
        if($res){
            return redirect('/Url');
        }
    }
}
