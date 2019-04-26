<?php
// +----------------------------------------------------------------------
// | 用户信息操作
// +----------------------------------------------------------------------
 

namespace app\wxcarminiapp\controller;

class User
{
    public function openid()
    {
         // $api = "https://api.weixin.qq.com/sns/jscode2session?appid={$appid}&secret={$secret}&js_code={$code}&grant_type=authorization_code";
    	$url = 'https://api.weixin.qq.com/sns/jscode2session';
    	$data['appid']=Config('appid');
        $data['secret']= Config('secret');
        $data['js_code']= $_GET['code'];
        $data['grant_type']= 'authorization_code';
    	$wxopenid = http($url, $data, 'GET');
    	//echo $wxopenid; //转义;
    	//return json_encode($wxopenid,JSON_UNESCAPED_UNICODE);//转义
    	return json_decode($wxopenid);//去除转义

    }

     public function test()
    {
        $test = test();
        return $test;
    }
}
