<?php
namespace app\index\controller;
use \think\View;
class Goods{
    public function index(){
        echo "我是Goods控制器index方法";
    }
    public function jiazai(){
        return view();

        // $view = new View();
        // return $view->fetch();
    }
    public function aaa(){
        // echo "afadsf";
        return view();
        // $view = new View();
        // return $view->fetch();
        // return $view->fetch('E:\WAMP\www\StudyTP5.0\application\index\view\goods\jiazai2.html');
    }
    // public function aaa(){
    //     return view();
    // }
}