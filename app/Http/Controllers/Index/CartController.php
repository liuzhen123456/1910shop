<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Goods;
use App\Cart;
use DB;
class CartController extends Controller
{
     public function cartlist(){
     	//取用户ID
     	$mem_id=session('member')->mem_id;
    	$cartInfo=\DB::select("select *,buy_number*goods_price as price from cart where mem_id=?",
    		[$mem_id]);
    	//print_r($cartInfo);die;
    	//dd($cartInfo);
    	//取出每件商品的购买数量
    	
    	$buy_number=array_column($cartInfo, 'buy_number');
    	$goods_price=array_column($cartInfo, 'goods_price');
    	//print_r($goods_price);
    	//print_r($buy_number);die;
    	//算出共购买几件商品
    	$count=array_sum($buy_number);
    	$cart_id=array_column($cartInfo, "cart_id");
    	$CheckBuy_number=array_combine($cart_id, $buy_number);
    	
    	//总价
    	$totalprice=array_sum(array_column($cartInfo,'price'));
    	//dd($totalprice);
    	return view('index.cartlist',compact('cartInfo','count','CheckBuy_number','totalprice','buy_number','goods_price'));
    }
    //修改购买数量
    public function changeNumber(){
    	$goods_id=request()->goods_id;
    	$buy_number=request()->buy_number;
    	//dump($goods_id);
    	//dump($buy_number);
    	$mem_id=session('member')->mem_id;
    	//dump($mem_id);
    	$where=[
    		['goods_id','=',$goods_id],
    		['mem_id','=',$mem_id],
    		['cart_del','=',1]

    	];
    	$res=Cart::where($where)->update(['buy_number'=>$buy_number]);
    	if($res!==false){
    		echo json_encode(['code'=>"00004",'msg'=>'']);
    	}else{
    		echo json_encode(['code'=>"00005",'msg'=>'操作失败']);
    	}
    }
    //修改小计
    public function getTotal(){
    	$goods_id=request()->goods_id;
    	//dump($goods_id);
    	//根据商品ID获取价格
    	$goods_price=Goods::where('goods_id','=',$goods_id)->value('goods_price');
    	//dump($goods_price);
    	//从cart表获取购买数量
    	$mem_id=session('member')->mem_id;
    	$where=[
    		['mem_id','=',$mem_id],
    		['goods_id','=',$goods_id],
    		['cart_del','=',1]
    	];
    	$buy_number=Cart::where($where)->value('buy_number');
    	//dump($buy_number);
    	echo $goods_price*$buy_number;
    }
    public function cartpay(){
        $mem_id=session('member')->mem_id;
    	$cartInfo=\DB::select("select *,buy_number*goods_price as price from cart where mem_id=?",
            [$mem_id]);
       // dd($cartInfo);
        //$cartInfo=$cartInfo->toArray();
        //$buy_number=array_column($cartInfo,'buy_number');
        $totalprice=array_sum(array_column($cartInfo,'price'));
        //dd($totalprice);
    	return view('index.cartpay',compact('cartInfo','totalprice'));
    }
}
