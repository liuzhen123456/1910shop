<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Goods;
use App\Cart;
use Illuminate\Support\Facades\Redis;
class GoodsController extends Controller
{
    public function index($id){
    	//echo $id;
    	$goods=Goods::find($id);
        $visit=Redis::setnx('visit_'.$id,1)?1:Redis::incr('visit_'.$id);
    	//dump($res);
    	return view('index.goods',['goods'=>$goods,'visit'=>$visit]);
    }
    public function addcar(){
    	$goods_id=request()->goods_id;
    	$buy_number=request()->buy_number;
    	if($buy_number==0){
    		echo json_encode(['code'=>"00005",'msg'=>'至少购买一件商品']);die;
    	}
    	//echo $goods_id;
    	//echo $buy_number;
    	//判断用户是否登录
    	$member=session('member');
    	//dd($member);
    	if(!$member){
    		echo json_encode(['code'=>"00001",'msg'=>'请先登录']);die;
    	}
    	$goods=Goods::select('goods_price','goods_img','goods_name','goods_id','goods_num')->find($goods_id);
    	$goods_num=$goods->goods_num;
    	//dd($goods);
    	if($goods_num < $buy_number){
    		echo json_encode(['code'=>"00002",'msg'=>'库存不足']);die;
    	}
    	$where=[
    		'mem_id'=>$member->mem_id,
    		'goods_id'=>$goods_id
    	];
    	$cart=Cart::where($where)->first();
    	if($cart){
    		//更新购买数量 累加
    		$buy_number=$cart->buy_number+$buy_number;
    		if($goods->goods_num < $buy_number){
    			$buy_number = $goods_num;
    		}


    		$res=Cart::where('cart_id',$cart->cart_id)->update(['buy_number'=>$buy_number]);
    		if($res!==false){
    			echo json_encode(['code'=>"00004",'msg'=>'累计添加成功']);
    			//return redirect('cartlist');
    		}
    	}else{
    		//添加
    		//echo 456;
    		$data=[
    			'mem_id'=>$member->mem_id,
    			'buy_number'=>$buy_number,
    			'create_time'=>time()
    		];
    		$data=array_merge($data,$goods->toArray());
			$res=Cart::create($data);
			if($res!==false){
    			echo json_encode(['code'=>"00000",'msg'=>'添加成功']);
    			//return redirect('cartlist');
    		}
    	}
    	
    }
    public function test(){
    	dump(session('member'));
    	$member=session(['member'=>null]);
    	echo $member;
    }
    
}
