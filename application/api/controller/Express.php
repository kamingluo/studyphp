<?php

// +----------------------------------------------------------------------
// | 快递查询接口
// +----------------------------------------------------------------------
namespace app\api\controller;

class Express
{
     public function index()
    {//定义一个要发送的目标URL；
       $expressNumber=$_GET['number'];//拿到快递单号
       $url = 'https://www.kuaidi100.com/autonumber/autoComNum';
       //定义传递的参数数组；
       $data['resultv2']='1';
       $data['text']=$expressNumber;
       //定义返回值接收变量；
       $httpstr = http($url, $data, 'GET', array("application/json, text/javascript, */*; q=0.01"));
       //echo $httpstr;
       $arr = json_decode($httpstr,true);
       //echo $arr['auto'][0]['comCode'];
       $comCode=$arr['auto'][0]['comCode'];//拿到快递名称
      
       $expressurl='https://www.kuaidi100.com/query';
       $data2['type']=$comCode;
       $data2['postid']=$expressNumber;
       $data2['temp']="0.37299124094928297";
       $httpstr2 = http($expressurl, $data2, 'POST', array("application/json, text/javascript, */*; q=0.01"));
       echo $httpstr2;

     }
    

    public function express()
    { 
      $expressnumber=$_GET['number'];
      $expressdata=getOrderTracesByJsonnumber($expressnumber);//订单识别返回
      $expressarr = json_decode($expressdata,true);
      $ShipperCode=$expressarr['Shippers'][0]['ShipperCode'];//拿到快递公司编码
      $ShipperName=$expressarr['Shippers'][0]['ShipperName']; //拿到快递公司名称
      //echo $ShipperName;
      $json = $ShipperName;
      //echo $expressdata;
     $logisticResult=getOrderTracesByJson($ShipperCode,$expressnumber);

     $newJson = json_encode(
array_merge(
json_decode($logisticResult, true),
array('ShipperName' =>$json)
)
);

     echo $newJson;

    }

}
