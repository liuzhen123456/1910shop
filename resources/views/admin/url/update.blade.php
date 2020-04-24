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
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
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
<form method="post"action="{{url('Url/update/'.$res->url_id)}}"enctype="multipart/form-data">
	@csrf
	<table>
		<tr>
			<td>网站名称</td>
			<td><input type="text" name="url_name"value="{{$res->url_name}}">
				<span>{{$errors->first('url_name')}}</span>
			</td>
		</tr>
		<tr>
			<td>网站网址</td>
			<td><input type="text" name="url_wang"value="{{$res->url_wang}}">
				<span>{{$errors->first('url_wang')}}</span>
			</td>
		</tr>
		<tr>
			<td>连接类型</td>
			<td><input type="radio" name="url_type"value=1>LOGO链接
				<input type="radio" name="url_type"value=2>文字链接
			</td>
		</tr>
		<tr>
			<td>网站logo</td>
			<td><input type="file" name="url_logo"></td>
		</tr>
		<tr>
			<td>网站联系人</td>
			<td><input type="text" name="url_people"value="{{$res->url_people}}"></td>
		</tr>
		<tr>
			<td>网站介绍</td>
			<td><textarea name="url_info">{{$res->url_info}}</textarea></td>
		</tr>
		<tr>
			<td>是否显示</td>
			<td><input type="radio" name="url_show"value=1>是
				<input type="radio" name="url_show"value=2>否
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="修改"></td>
		</tr>
	</table>
</form>