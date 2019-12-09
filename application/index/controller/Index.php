<?php
namespace app\index\controller;
// use app\admin\controller\Index as adminIndex;
// use think\Db
use  \think\Config;
class Index
{
    public function index()
    {
        // return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="ad_bd568ce7058a1091"></think>';
        return "龚烁宇";

        // 从数据库中读取数据
        // $data = Db::table('user')->select();
        // var_dump ($data); 

    }

// ******************第四节*方法调用和框架加载流程*************
    public function test(){
        return "我是用户自己创建的test方法";
    }

    public function diaoyong()
    {
        echo "调用前台user控制器 第一种方式 使用命名空间";
        echo "<br>";
        $model = new \app\index\controller\User;
        echo $model->index();
        echo "<hr>";

        echo "调用前台user控制器 第二种方式 use方法";
        echo "<br>";
        $model = new User();
        echo $model->index();
        echo "<hr>";

        echo "调用前台user控制器 第三种方式 使用系统方法";
        echo "<br>";
        $model = controller('User');
        echo $model->index();
        echo "<hr>";



        echo "调用后台admin index控制器 第一种方式 使用命名空间";
        echo "<br>";
        $model = new \app\admin\controller\Index;
        echo $model->index();
        echo "<hr>";

        echo "调用后台admin index控制器 第二种方式 use方法";
        // use app\admin\controller\index as adminIndex;
        echo "<br>";
        $model = new adminIndex;
        echo $model->index();
        echo "<hr>";

        echo "调用后台admin index控制器 第三种方式 使用系统方法";
        echo "<br>";
        $model = controller('admin/Index');
        echo $model->index();
        echo "<hr>";
    }


    // 调用当前控制器中的方法
    public function fangfa(){
        // 调用当前控制器中的test方法
        // $this代表当前控制器
        echo "使用this方法<br>";
        echo $this->test();
        echo "<hr>";
        // self代表当前控制器
        echo "使用self方法"."<br>";
        echo self::test();

        echo "<hr>";
        // 直接使用当前控制器名字找到方法名
        echo "使用Index控制器"."<br>";
        echo Index::test();

        echo "<hr>";
        // 直接使用当前控制器名字找到方法名
        echo "使用系统方法 action"."<br>";
        echo action('test');

    }

    // 调用其他控制器中的方法
    public function othersfangfa()
    {
        // 传统方法
        echo "传统方法";
        echo "<br>";
        $model = new \app\index\controller\User;
        echo $model->index();
        echo "<hr>";
        // 系统方法
        echo "系统方法";
        echo "<br>";
        echo action('User/index');
        echo "<hr>";
    }

    // 调用后台模块的index方法
    public function houtaimokuai()
    {
        // 传统方法
        echo "传统方法";
        echo "<br>";
        $model = new \app\admin\controller\Index;
        echo $model->index();
        echo "<hr>";
        // 系统方法
        echo "系统方法";
        echo "<br>";
        echo action('admin/Index/index');

    }


// ******************第五节*配置相关(上)***********************
    // 读取配置文件
    public function getConfig()
    {
        // 直接通过键获取值 惯例配置
        echo '惯例配置';
        echo "<br>";
        echo '直接通过键获取值';
        echo "<br>";
        // 输出配置文件  config()方法 用于读取系统方法
        echo config('name');
        echo "<br>";
        echo config('age');
        echo "<br>";
        echo config('address');
        echo "<br>";

        // 通过系统类进行配置
        // 如果配置项存在直接输出，不存在返回NULL
        echo Config::get('name');
        echo "<br>";
        echo Config::get('age');
        echo "<br>";
        echo Config::get('address');
        echo "<br>";


        // 获取整个键值对数组
        echo '获取整个键值对数组';
        echo "<br>";
        dump(config('teacher'));
        echo "<br>";
        echo '获取单个键值对数组元素';
        echo "<br>";
        dump(config('teacher.name'));
        echo "<br>";
        dump(config('teacher.age'));
        echo "<br>";
        dump(config('teacher.address'));


        // 应用配置
        echo "<hr>";
        echo '应用配置';
        echo "<br>";
        dump(config('app_name.name'));


        // 扩展配置
        echo "<hr>";
        echo '扩展配置';
        echo "<br>";
        echo '读取database所有配置项';
        echo "<br>";
        dump(config('database'));
        echo '读取database单个配置项';
        echo "<br>";
        dump(config('database.hostname'));


        // 自定义扩展配置
        echo "<hr>";
        echo '自定义扩展配置';
        echo "<br>";
        echo '读取user所有配置项';
        echo "<br>";
        dump(config('user'));
        echo '读取user单个配置项';
        echo "<br>";
        dump(config('user.name'));

    }
}

