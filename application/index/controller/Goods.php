<?php
namespace app\index\controller;
use \think\View;
class Goods{
    public function index(){
        echo "我是Goods控制器index方法";
    }
    public function jiazai(){
        // return view();

        $view = new View();
        return $view->fetch();
    }
}