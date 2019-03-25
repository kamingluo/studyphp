<?php
namespace app\index\controller;
//use think\log;
use think\Db;

class Index
{
    public function index()
    {

    	//dump(Db::query("select * from box_gdt"));
         //加了日志就报错
    	//Log::info('查看是否存在记录');
        // $res =Db::table('box_gdt')->where('master_id',0)->select();
        // dump($res);
        // $res1=Db::table('index_box')->select();
        // dump($res1);
        dump("1234")
         //dump(Config::get());	
    }
}
