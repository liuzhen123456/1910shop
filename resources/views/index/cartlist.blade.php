     @extends("layouts.shop")
     @section("title",'购物车列表')
     @section('content')
    <div class="maincont">
     <header>
      @csrf
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>购物车</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/static/index/images/head.jpg" />
     </div><!--head-top/-->
     <table class="shoucangtab">
      <tr>
       <td width="75%"><span class="hui">购物车共有：<strong class="orange">{{$count}}</strong>件商品</span></td>
       <td width="25%" align="center" style="background:#fff url(/static/index/images/xian.jpg) left center no-repeat;">
        <span class="glyphicon glyphicon-shopping-cart" style="font-size:2rem;color:#666;"></span>
       </td>
      </tr>
     </table>
     @foreach($cartInfo as $k=> $v)
     <div class="dingdanlist">
      <table>
        @if($k==0)
       <tr>
        <td width="100%" colspan="4">
          <a href="javascript:;"><input type="checkbox" name="1" /> 全选</a></td>
       </tr>
       @endif
       <tr goods_num="{{$v->goods_num}}">
        <td width="4%"><input type="checkbox" name=""id="box" value="{{$v->cart_id}}"/></td>
        <td class="dingimg" width="15%"goods_id="{{$v->goods_id}}"><img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" /></td>
        <td width="50%">
         <h3>{{$v->goods_name}}</h3>
         <time>下单时间：{{date('Y-m-d H:i:s')}}</time>
        </td>
        <td align="right" goods_id="{{$v->goods_id}}">
          
            <input type="text" id="buy_{{$v->cart_id}}" class="spinnerExample" />
            <th colspan="4"><strong class="orange">{{$v->goods_price *  $v->buy_number}}</strong></th>
        </td>
       </tr>
       <tr>
        
       </tr>
      </table>
     </div><!--dingdanlist/-->
     @endforeach
      <tr>
        <td width="100%" colspan="4"><a href="javascript:;"><input type="checkbox" name="1" /> 删除</a></td>
       </tr>
     <div class="height1"></div>
     <div class="gwcpiao">
     <table>
      <tr>
       <th width="10%"><a href="javascript:history.back(-1)"><span class="glyphicon glyphicon-menu-left"></span></a></th>
       <td width="50%">总计：<strong class="orange">¥{{$totalprice}}</strong></td>
       <td width="40%"><a href="{{url('/cartpay')}}" class="jiesuan">去结算</a></td>
      </tr>
     </table>
    </div><!--gwcpiao/-->
    </div><!--maincont-->
  
   <script src="/jquery.js"></script>
   <script>
        $(function(){
          //给+号绑定点击事件
          $(document).on("click",".increase",function(){
           // alert(123);
            var _this=$(this);
            var buy_number=_this.prev("input").val();
            //console.log(buy_number);
            //获取库存
            var goods_num=_this.parents('tr').attr("goods_num");
            //console.log(goods_num);
            
            //获取商品ID
            var goods_id=_this.parents('td').attr("goods_id");
            //console.log(goods_id);
            //修改购买数量
            changeNumber(goods_id,buy_number);
            //获取小计
            getTotal(goods_id,_this);
            //获取总价
            AllMoney();
          });

          //给-号绑定点击事件
          $(document).on("click",".decrease",function(){
              var _this=$(this);
              var buy_number=_this.next("input").val();
              //console.log(buy_number);
              //获取库存
              var goods_num=_this.parents('tr').attr("goods_num");
              //console.log(goods_num);
              
              //获取商品ID
              var goods_id=_this.parents('td').attr("goods_id");
               changeNumber(goods_id,buy_number);
               //获取小计
              getTotal(goods_id,_this);

              AllMoney();
          });
          //复选框选中
          $(document).on("click","#box",function(){
              var _this=$(this);
              var status=_this.prop('checked');
              AllMoney();
          });
          //更改购买数量
          function changeNumber(goods_id,buy_number){
              //通过ajax将商品ID传给控制器
              $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

              $.get(
                "{{url('/changeNumber')}}",
               
                {goods_id:goods_id,buy_number:buy_number},
               
                'json',
                function(res){
                  console.log(res);
                }
              )
          }
          //获取小计
          function getTotal(goods_id,_this){
            $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
            $.get(
                "{{url('getTotal')}}",
                {goods_id:goods_id},
                function(res){
                  //console.log(res);
                  _this.parents('td').next().text(res);
                }
              );
          }
          //获取总价
          function AllMoney(){
            var _box=$(".box:checked");
            //console.log(_box);
            var goods_id='';
            _box.each(function(index){
              goods_id+=$(this).parent("td").next().attr('goods_id')+',';
            })
            console.log(goods_id);
          }
        })
   </script>
    @endsection