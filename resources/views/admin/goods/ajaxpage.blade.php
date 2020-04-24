<table>
	<tr>
		<td>商品ID</td>
		<td>商品名字</td>
		<td>商品价格</td>
		<td>库存</td>
		<td>商品图片</td>
		<td>相册</td>
		<td>商品介绍</td>
		<td>商品积分</td>
		<td>是否新品</td>
		<td>是否精品</td>
		<td>是否热卖</td>
		<td>是否上架</td>
		<td>品牌</td>
		<td>分类</td>
		<td>操作</td>
	</tr>
@foreach($goods as $v)
	<tr>
		<td>{{$v->goods_id}}</td>
		<td>{{$v->goods_name}}</td>
		<td>{{$v->goods_price}}</td>
		<td>{{$v->goods_num}}</td>
		<td>
			@if($v->goods_img)
				<img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}"width=50>
			@endif
		</td>
		<td>
			@if($v->goods_imgs)
			@php $goods_imgs=explode("|",$v->goods_imgs);@endphp
			@foreach($goods_imgs as $vv)
				<img src="{{env('UPLOADS_URL')}}{{$vv}}"width=30>
			@endforeach
			@endif
		</td>
		<td>{{$v->goods_desc}}</td>
		<td>{{$v->goods_score}}</td>
		<td>
			{{$v->is_new}}</td>
		<td>{{$v->is_best}}</td>
		<td>{{$v->is_hot}}</td>
		<td>{{$v->is_up}}</td>
		<td>{{$v->brand_name}}</td>
		<td>{{$v->cate_name}}</td>
		<td><a href="{{url('/Goods/destroy/'.$v->goods_id)}}">删除</a>
			<a href="{{url('/Goods/edit/'.$v->goods_id)}}">修改</a>
		</td>
	</tr>
@endforeach

</table>

