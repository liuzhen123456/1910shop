@extends("layouts.shop")
     @section("title",'商品详情')
     @section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>产品详情</h1>
      </div>
     </header>
     <div id="sliderA" class="slider">
      @if(isset($goods->goods_imgs))
      @php $imgs=explode('|',$goods->goods_imgs);@endphp
      @foreach($imgs as $img)
      <img src="{{env('UPLOADS_URL')}}{{$img}}" />
      @endforeach
      @endif
     </div><!--sliderA/-->
     <table class="jia-len">
      <tr>
       <th><strong class="orange">{{$goods->goods_price}}</strong></th>
       <td>
        <input type="text" class="spinnerExample"id="buy_number" />
       </td>
      </tr>
      <tr>
       <td>
        <strong>{{$goods->goods_name}}</strong>
        <p class="hui">{{$goods->goods_desc}}</p>
        <p>浏览数量:{{$visit}}</p>
       </td>
       <td align="right">
        <a href="javascript:;" class="shoucang"><span class="glyphicon glyphicon-star-empty"></span></a>
       </td>
      </tr>
     </table>
     <div class="height2"></div>
     <h3 class="proTitle">商品规格</h3>
     <ul class="guige">
      <li class="guigeCur"><a href="javascript:;">50ML</a></li>
      <li><a href="javascript:;">100ML</a></li>
      <li><a href="javascript:;">150ML</a></li>
      <li><a href="javascript:;">200ML</a></li>
      <li><a href="javascript:;">300ML</a></li>

      <div class="clearfix"></div>
     </ul><!--guige/-->
     <div class="height2"></div>
     <div class="zhaieq">
      <a href="javascript:;" class="zhaiCur">商品简介</a>
      <a href="javascript:;">商品参数</a>

      <a href="javascript:;" style="background:none;">订购列表</a>
      <div class="clearfix"></div>
     </div><!--zhaieq/-->
     <div class="proinfoList">
      <img src="{{env('UPLOADS_URL')}}{{$goods->goods_img}}" width="636" height="822" />
     </div><!--proinfoList/-->
     <div class="proinfoList">
      暂无信息....
     </div><!--proinfoList/-->
     <div class="proinfoList">
      暂无信息......
     </div><!--proinfoList/-->
     <table class="jrgwc">
      <tr>
       <th>
        <a href="index.html"><span class="glyphicon glyphicon-home"></span></a>
       </th>
       <td><a href="javascript:;"class="addcar">加入购物车</a></td>
      </tr>
     </table>
    </div><!--maincont-->
 
<script >
    $('.addcar').click(function(){
      var goods_id={{$goods->goods_id}};
      var buy_number=$('#buy_number').val();

      //alert(goods_id);
      //alert (buy_number);
      $.get('/addcar',
        {goods_id:goods_id,buy_number:buy_number},
        function(result){
          console.log(result);
          alert(result.msg);
          //console.log(result);
       if(result.code=="00001"){
        location.href="/login?refer="+window.location.href;
       }
       
      },
      'json');
    })
</script>
@include('index.public.foot')

 @endsection
