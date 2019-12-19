<?php
namespace app\index\Controller;

use think\Controller;
class Userinfo extends Controller{
    // 前置操作
    protected $beforeActionList = [
        'one',
        // 除去index1方法都可以使用two这个方法
        'two'=>['except'=>'index'],
        // 只让index1使用there这个方法
        'three'=>['only'=>'index1'],
    ];
    public function one(){
        echo "one";
    }
    public function two(){
        echo "two";
    }
    public function three(){
        echo "three";
    }
    public function index(){
        echo "<hr>";
        echo "userinfo控制器中index方法";
    }
    public function index1(){
        echo "<hr>";
        echo "userinfo控制器中index方法";
    }
}