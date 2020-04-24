<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News;
use Illuminate\Support\Facades\Cache;
class NewsController extends Controller
{
   public function index(){
   	$page=request()->page??1;

   	//$slide=Cache::get('slide');
   	
   	$news_name=request()->news_name??'';
   	$news=Cache::get('news_'.$page.'_'.$news_name);
   	//dump($news_name);
   	$where=[];
   	if($news_name){
   		$where[]=["news_name",'like',"%$news_name%"];
   	}
   	$pagsize=1;
   	if(!$news){
   		echo "2";
   		$newsInfo=News::where($where)->paginate($pagsize);
   		Cache::put('news_'.$page.'_'.$news_name,$newsInfo,15);
   	}
   	$newsInfo=News::where($where)->paginate($pagsize);
   	if(request()->ajax){
   		return view ('index.news_ajax',['newsInfo'=>$newsInfo]);

   	}else{
   		return view ('index.news_list',['newsInfo'=>$newsInfo]);
   	}
   	
   }
}
