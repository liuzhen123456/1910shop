<form method="post"action="{{url('/Login/logindo/')}}">
	@csrf
	<table>
		<tr>
			<td>账号</td>
			<td><input type="text" name="admin_account"></td>
		</tr>
		<tr>
			<td>密码</td>
			<td><input type="password" name="admin_pwd">
				
			</td>
		</tr>
		<tr>
			<td><input type="submit" value="登陆"></td>
			<td></td>
		</tr>
		{{session('msg')}}
	</table>
</form>