<?php
namespace app\index\Controller;
use \think\Controller;
class Login extends Controller{

    public function index(){
        return view();
    }
    public function check(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        // echo $pass;
        if($username == "admin" && $password == "root"){
            $this->success('跳转成功',url('index/index'));
        }else{
            $this->error('登陆失败');
        }
    }
}