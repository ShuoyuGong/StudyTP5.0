<?php
// 声明命名空间
namespace app\index\controller;
use \think\View;
use \think\Controller;
// 声明控制器

class User extends Controller{
    public function load(){
        return $this->fetch();
    }
    public function _initialize(){
        echo "控制器初始化";
    }
}