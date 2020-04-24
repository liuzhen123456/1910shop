
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Bootstrap 实例 - 默认的导航栏</title>
  <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
  <div class="navbar-header">
    <a class="navbar-brand" href="#">电子商务</a>
  </div>
  <div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="{{url('/brand')}}">品牌管理</a></li>
      <li><a href="{{url('/Goods')}}">商品管理</a></li>
      <li><a href="{{url('/Admin')}}">管理员管理</a></li>
      <li><a href="{{url('/Url')}}">链接管理</a></li>
      <li class="dropdown">
        <a href="{{url('/Category')}}" class="dropdown-toggle" data-toggle="dropdown">
          分类管理
          <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="#">jmeter</a></li>
          <li><a href="#">EJB</a></li>
          <li><a href="#">Jasper Report</a></li>
          <li class="divider"></li>
          <li><a href="#">分离的链接</a></li>
          <li class="divider"></li>
          <li><a href="#">另一个分离的链接</a></li>
        </ul>
      </li>
    </ul>
  </div>
  </div>
</nav>

</body>
</html>
<form action="{{url('Goods/update/'.$res->goods_id)}}"enctype="multipart/form-data"method="post">
	@csrf
	<table>
		<tr>
			<td>商品名称</td>
			<td><input type="text"name="goods_name"value="{{$res->goods_name}}">
				<span>{{$errors->first('goods_name')}}</span>
				
			</td>
		</tr>
		<tr>
			<td>商品价格</td>
			<td><input type="text"name="goods_price"value="{{$res->goods_price}}">
				<span>{{$errors->first('goods_price')}}</span>
			</td>
		</tr>
		<tr>
			<td>商品库存</td>
			<td><input type="text"name="goods_num"value="{{$res->goods_num}}">
				<span>{{$errors->first('goods_num')}}</span>
			</td>
		</tr>
		<tr>
			<td>商品图片</td>
			<td><input type="file"name="goods_img"><img src="{{env('UPLOADS_URL')}}{{$res->goods_img}}"width=50></td>
		</tr>
		<tr>
			<td>商品相册</td>
			<td><input type="file"name="goods_imgs"></td>
		</tr>
		<tr>
			<td>商品介绍</td>
			<td><textarea name="goods_desc">{{$res->goods_desc}}</textarea></td>
		</tr>
		<tr>
			<td>商品编号</td>
			<td><input type="text"name="goods_score"value="{{$res->goods_score}}"></td>
		</tr>
		<tr>
			<td>是否新品</td>
			<td>
				<input type="radio"value="是" name="is_new">是
				<input type="radio"value="否" name="is_new">否
			</td>
		</tr>
		<tr>
			<td>是否精品</td>
			<td>
				<input type="radio"value="是" name="is_best">是
				<input type="radio"value="否"  name="is_best">否
			</td>
		</tr>
		<tr>
			<td>是否热卖</td>
			<td>
				<input type="radio"value="是" name="is_hot">是
				<input type="radio"value="否"  name="is_hot">否
			</td>
		</tr>
		<tr>
			<td>是否上架</td>
			<td>
				<input type="radio"value="是" name="is_up">是
				<input type="radio"value="否"  name="is_up">否
			</td>
		</tr>
		<tr>
			<td>品牌</td>
			<td>
				
				<select name="brand_id">
					<option value="">请选择</option>
					@foreach ($brand as $v)
					<option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
					@endforeach
				</select>
				<span>{{$errors->first('brand_id')}}</span>
			</td>
		</tr>
		<tr>
			<td>分类</td>
			<td>
				<select name="cate_id">
					<option value="">请选择</option>
					@foreach ($category as $v)
					<option value="{{$v->cate_id}}">{{$v->cate_name}}</option>
					@endforeach
				</select>
				<span>{{$errors->first('cate_id')}}</span>
			</td>
			
		</tr>
		<tr>
			<td><input type="submit" value="修改"></td>
		</tr>
	</table>
</form>
