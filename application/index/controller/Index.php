<?php
namespace app\index\controller;
//use think\log;
use think\Db;

use think\Config;

class Index
{
    public function index()
    {

    	//dump(Db::query("select * from box_gdt"));
        //
         //加了日志就报错
    	//Log::info('查看是否存在记录');
        //
       // $res =Db::table('box_gdt')->where('master_id',0)->select();
        //dump($res);
       // $res1=Db::table('index_box')->select();
        //dump($res1);
        //echo  json_encode($res1);
        // return $res1 ;

        //打印配置信息
        // dump(Config::get());	
        return "kaming的服务器";
    }

    public function ceshi()
    {
        return  "index模块下的index控制器ceshi方法" ;
    }
     public function test()
    {
        return  "index模块下的index控制器test方法2222" ;
    }

    public function sendEmail() //本地发送不成功，服务器上才行
    {
        $data=sendEmail([['user_email'=>'954087620@qq.com','content'=>'资源鸟，让一切变得简单，加qq
     群 623918245 畅聊']]);
        return   $data ;
    }
}
