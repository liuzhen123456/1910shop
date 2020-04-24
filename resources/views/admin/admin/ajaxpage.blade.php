<table>
	<tr>
		<td>管理员ID</td>
		<td>管理员账号</td>
		<td>管理员手机</td>
		<td>管理员邮箱</td>
		<td>添加时间</td>
		<td>操作</td>
	</tr>
@foreach ($res as $v)
	<tr>
		<td>{{$v->admin_id}}</td>
		<td>{{$v->admin_account}}</td>
		<td>{{$v->admin_tel}}</td>
		<td>{{$v->admin_email}}</td>
		<td>{{date("Y-m-d H:i:s",$v->create_time)}}</td>
		<td>
			<a href="{{url('Admin/edit/'.$v->admin_id)}}">修改</a>
			<a href="{{url('Admin/destroy/'.$v->admin_id)}}">删除</a>
		</td>
	</tr>
@endforeach
</table>