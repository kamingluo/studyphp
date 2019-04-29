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
    	$openiddata=json_decode($wxopenid,true);
        $rest=array_key_exists("errcode",$openiddata);//判断返回值存在errcode证明code有误
        if($rest){ 
            die("code错误或者过期了！");
        }
        else{
            $openid=$openiddata['openid'];
            return $openid;
        }
    }
    
    /** 用户注册 */
    public function register(Request $request){
        $data = $request->param();//接收所有传过来的post值
        $wxcode=$data['code'];
        $openid=$this->openid($wxcode);
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


     //请求获取openid
    public function obtainopenid(Request $request)
    {
        $wxcode =$request->param("code");//接收所有传过来的值
        $openid=openid($wxcode);
        return $openid;
    }

     public function test( Request $request)
    {

        $token =$request->isPost();
        return $token;
        // $data =$request->param();//接收所有传过来的post值
        // //$data =$request->param("name");//接收所有传过来的post值
        // $wxcode=$data['code'];//获取某个固定值
        // $openid=openid($wxcode);
        // return $openid;
        // // $test = test();
        // // return $test;
    }
}
