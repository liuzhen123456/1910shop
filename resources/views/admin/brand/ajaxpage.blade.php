
<table>
	<tr>
		<td>id</td>
		<td>品牌名称</td>
		<td>品牌logo</td>
		<td>品牌网址</td>
		<td>品牌信息</td>
		<td>操作</td>
	</tr>
@foreach($brands as $v)

	<tr>
		<td>{{$v->brand_id}}</td>
		<td>{{$v->brand_name}}</td>
		<td>@if($v->brand_logo)
			<img src="http://uploads.1910.com/{{$v->brand_logo}}" width=50>
			@endif
		</td>
		<td>{{$v->brand_url}}</td>
		<td>{{$v->brand_info}}</td>
		<td><a href="{{url('/brand/destroy/'.$v->brand_id)}}">删除</a>
			<a href="{{url('/brand/edit/'.$v->brand_id)}}">修改</a>
		</td>
	</tr>
@endforeach
</table>
