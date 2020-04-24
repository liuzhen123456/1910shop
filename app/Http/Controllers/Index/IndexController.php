<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Goods;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class IndexController extends Controller
{
    // 首页
    public function index(){
    	//$slide=Cache::get('slide');
    	$slide=Redis::del('slide');
    	$slide=Redis::get('slide');
    	
    	//dd($slide);
    	if(!$slide){
    		 //echo "123";
    		 $slide=goods::getlist();
    		 
    		 $slide=serialize($slide);
    		 //dd($slide);
    		 Redis::setnx('slide',60,$slide);
    	}
    	//dd($slide);
       $slide=unserialize($slide);
       $aaa=0;
       $aaa=Redis::incr($aaa);
       $goods=Goods::select('goods_price','goods_name','goods_id','goods_img')->get();
       //dd($goods);
       //dd($aaa);
       //dd($slide);
        return view("index.index",['slide'=>$slide,'goods'=>$goods]);
    }
   
}
