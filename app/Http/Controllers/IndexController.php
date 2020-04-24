<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view("index");
    }
    public function doadd(){
        $data=request()->all();
        dd($data);
    }
    // 必选参数
    public function good($id,$name){
        echo$id;
        echo$name;
    }
    // 可选参数
    public function goods($id,$name){
        echo$id;
        echo$name;
    }
}
