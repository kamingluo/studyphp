<?php
// +----------------------------------------------------------------------
// | 用户信息操作
// +----------------------------------------------------------------------
 

namespace app\wxcarminiapp\controller;
use think\Db;
use think\Request;

class User
{
    /** 获取用户openid */
    public function openid($wxcode)
    {
    	$url = 'https://api.weixin.qq.com/sns/jscode2session';
    	$data['appid']=Config('appid');
        $data['secret']= Config('secret');
        $data['js_code']= $wxcode;
        $data['grant_type']= 'authorization_code';
    	$wxopenid = http($url, $data, 'GET');
    	return json_decode($wxopenid,true);//去除转义
    }
    
    /** 用户注册 */
    public function register(Request $request){
        $data = $request->param();//接收所有传过来的post值
        $wxcode=$data['code'];
        $wxdata=$this->openid($wxcode);
        $rest=array_key_exists("errcode",$wxdata);//判断返回值存在errcode证明code有误
        if($rest){ 
            return $wxdata;
        }
        else{
            $openid=$wxdata['openid'];
            $time =date('Y-m-d H:i:s',time());//获取当前时间
            $dbnum =db('user')->where('openid',$openid)->find();
            if($dbnum==null){
                $channel=$data["channel"];
                $master_id=$data["master_id"];
                $dbdata = ['id'=>'','openid' =>$openid,'channel' => $channel,'score' => 0,'master_id' => $master_id,'create_time' =>$time ,'updata_time' =>$time];
                $dbreturn=db('user')->insert($dbdata);
                return $dbreturn; //返回1
            }
            else{
                 //更新信息
                 $dbreturn= db('user')->where('openid',$openid)->update(['updata_time' => $time]);
                return $dbreturn;//返回1
            }
        }

    }

     public function test(Request $request)
    {
        $data =$request->param();//接收所有传过来的post值
        //$data =$request->param("name");//接收所有传过来的post值
        $name=$data['name'];//获取某个固定值
         return $name;
        // $test = test();
        // return $test;
    }
}
