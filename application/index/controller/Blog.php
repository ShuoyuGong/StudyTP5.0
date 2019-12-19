<?php
namespace app\index\controller;
use think\Url;
class Blog{
    public function index()
    {
        dump(Url::build('index/index/index'));
        dump(url('index/index/index'));
        // 带参数
        dump(url('index/index/index/id/10'));
        dump(url('index/index/index',['id'=>5,'name'=>'gsy']));
        dump(url('index/index/index','id=10&name=gsy'));
        // 带锚点
        dump(url('index/index/index#name'));
        // 带域名
        dump(url('index/index/index@blog'));
        // 加上入口文件
        Url::root('/index.php');
        dump(url('index/index/index@blog'));
    }

}