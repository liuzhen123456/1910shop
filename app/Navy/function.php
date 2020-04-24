<?php
/**
 * 公用的方法  返回json数据，进行信息的提示
 * @param $status 状态
 * @param string $message 提示信息
 * @param array $data 返回数据
 */
    function abc(){
    	echo 123;
    }
     //文件上传
    function upload($filename){
        if(request()->file($filename)->isValid()){
            //接受文件
            $file=request()->$filename;
            //上传文件
            $path=$file->store('uploads');
            //dd($path);
            return $path;
        }
        exit('文件上传错误');
    }
     //多文件上传
    function MoreUpload($goods_imgs){
        $file=request()->$goods_imgs;
        if(!is_array($file)){
            return ;
        }
        foreach($file as $k=>$v){
            $path[$k]=$v->store('uploads');
        }
        return $path;
        exit('上传文件错误');
    }
    //无限极分类
    function getcateinfo(){
    	$info=DB::table('category')->get();
    	$result =list_level($info,$parent_id=0,$level=0);
    	return $result;
    }
    function list_level($data,$parent_id,$level){
    	static $array=array();
    	foreach ($data as $k => $v) {

    		if($parent_id==$v->parent_id){
    			$v->level=$level;
    			$array[]=$v;
    			list_level($data,$v->cate_id,$level+1);
    		}
    	}
    	return $array;
    }
    function ShowMsg($code,$msg){
        $data=[
            'code'=>$code,
            'msg'=>$msg
        ];
        echo json_encode($data);die;
    }

?>