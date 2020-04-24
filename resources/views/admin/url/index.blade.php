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
<table>
	<tr>
		<td>ID</td>
		<td>网站名称</td>
		<td>网站网址</td>
		<td>网站类型</td>
		<td>网址联系人</td>
		<td>网站详情</td>
		<td>网站是否展示</td>
		<td>网站logo</td>
		<td>操作</td>
	</tr>
@foreach($res as $v)
	<tr>
		<td>{{$v->url_id}}</td>
		<td>{{$v->url_name}}</td>
		<td>{{$v->url_wang}}</td>
		<td>{{$v->url_type}}</td>
		<td>{{$v->url_people}}</td>
		<td>{{$v->url_info}}</td>
		<td>{{$v->url_show}}</td>
		<td><img src="{{env('UPLOADS_URL')}}{{$v->url_logo}}"width=50></td>
		<td>
			<a href="{{url('Url/edit/'.$v->url_id)}}">修改</a>
			<a href="{{url('Url/destroy/'.$v->url_id)}}">删除</a>
		</td>
	</tr>
@endforeach
</table>