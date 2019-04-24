<?php
// +----------------------------------------------------------------------
// | 二手车价格查询接口
// +----------------------------------------------------------------------
// | kaming
// +----------------------------------------------------------------------
namespace app\api\controller;
class Usedcar
{ 
    //转义
    public function index()
    {
       $a="{\"msg\":\"\",\"success\":true,\"FinancialProductList\":[],\"price\":28.14,\"status\":100}";
       $b=stripslashes($a);
       echo $b;
       //echo "ceshi111";
       //return  "index模块下的my控制器my类index方法11111111" ;
    }
    
    //省份列表
    public function province()
    {
       $curl = curl_init();  
      curl_setopt($curl, CURLOPT_URL, 'http://v.juhe.cn/usedcar/province?dtype=&key=d26555c5f122f182cb078ab804786329');   
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);  
      $data = curl_exec($curl);  
      curl_close($curl);  
      //print_r($data);
      echo $data;
    }

    //城市列表province是上面城市列表获得
     public function city()
    {
       $curl = curl_init();  
      curl_setopt($curl, CURLOPT_URL, 'http://v.juhe.cn/usedcar/city?dtype=&province=4&key=d26555c5f122f182cb078ab804786329');   
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);  
      $data = curl_exec($curl);  
      curl_close($curl);  
      //print_r($data);
      echo $data;
    }
     
     //品牌接口车辆类型：passenger(乘用车)/commercial(商用车)
     public function brand()
    {
       $curl = curl_init();  
      curl_setopt($curl, CURLOPT_URL, 'http://v.juhe.cn/usedcar/brand?dtype=&vehicle=passenger&key=d26555c5f122f182cb078ab804786329');   
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);  
      $data = curl_exec($curl);  
      curl_close($curl);  
      //print_r($data);
      echo $data;
    }


    //车系列表brand从上个接口品牌接口获取
     public function series()
    {
       $curl = curl_init();  
      curl_setopt($curl, CURLOPT_URL, 'http://v.juhe.cn/usedcar/series?dtype=&brand=2000438&key=d26555c5f122f182cb078ab804786329');   
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);  
      $data = curl_exec($curl);  
      curl_close($curl);  
      //print_r($data);
      echo $data;
    }


     //车型列表车系id(从“二手车价值评估/车系列表”接口获取)
     public function car()
    {
       $curl = curl_init();  
      curl_setopt($curl, CURLOPT_URL, 'http://v.juhe.cn/usedcar/car?dtype=&series=10000292&key=d26555c5f122f182cb078ab804786329');   
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);  
      $data = curl_exec($curl);  
      curl_close($curl);  
      //print_r($data);
      echo $data;
    }
    

    //车型年份列表车型id(从“二手车价值评估/车型列表”接口获取)
     public function year()
    {
       $curl = curl_init();  
      curl_setopt($curl, CURLOPT_URL, 'http://v.juhe.cn/usedcar/year?dtype=&car=1088141&key=d26555c5f122f182cb078ab804786329');   
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);  
      $data = curl_exec($curl);  
      curl_close($curl);  
      //print_r($data);
      echo $data;
    }

      public function oldcar()
    {
       $curl = curl_init();  
      curl_setopt($curl, CURLOPT_URL, 'http://appraise.jingzhengu.com/carSourceLoan/getCarLoan?styleId=129491&regdate=2019-1-1&mileage=15456&cityId=105');   
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);  
      $data = curl_exec($curl);  
      curl_close($curl);
      $data=substr($data,1,strlen($data)-2); //截取两边的“”号
      //print_r($data);
      echo stripslashes($data);
    }



    
}