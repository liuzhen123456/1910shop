<form>
	<input type="text" name="news_name">
	<button>搜索</button>
</form>

<table>
	<meta name="csrf-token" content="{{csrf_token()}}">
	<tr>
		<td>新闻ID</td>
		<td>新闻标题</td>
		<td>新闻添加人</td>
		<td>详细信息</td>
		<td>操作</td>
	</tr>
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
<script src="/jquery.js"></script>
<script>
$(document).on("click",".page-item a",function(){
    var url=$(this).attr("href");
    //alert(url);
    // $.get(url,function(res){
    //    $("body").html(res);
    // });
    $.ajaxSetup({headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr("content")}})
   $.get(url,function(res){
       $("body").html(res);
   })
    return false;
})
</script>