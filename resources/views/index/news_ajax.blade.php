@foreach ($newsInfo as $k=> $v)
	<tr>
		<td>{{$v->news_id}}</td>
		<td>{{$v->news_name}}</td>
		<td>{{$v->news_people}}</td>
		<td>{{$v->news_info}}</td>
		<td></td>
	</tr>
@endforeach
</table>
{{$newsInfo->links()}}