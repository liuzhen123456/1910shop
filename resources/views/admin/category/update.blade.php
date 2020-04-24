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
<form method="post" action="{{url('Category/update/'.$res->cate_id)}}">
  @csrf
    <table>
      <p><a href="{{url('/Category')}}">分类展示</a></p>
        <tr>
            <td>分类名称</td>
            <td><input type="text"name="cate_name"value="{{$res->cate_name}}"></td>
        </tr>
        <tr>
            <td>分类</td>
            <td><select name="parent_id">
                     <option value="">请选择</option>
                @foreach($res2 as $v)
                    <option value="{{$v->cate_id}}">{{$v->cate_name}}</option>
                @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td>是否展示</td>
            <td><input type="radio"name="is_show_nav"value=1>是
                <input type="radio"name="is_show_nav"value=2>否
            </td>
        </tr>
        <tr>
            <td>分类详情</td>
            <td><textarea name="cate_desc">{{$res->cate_desc}}</textarea></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="修改"></td>
        </tr>
    </table>
</form>