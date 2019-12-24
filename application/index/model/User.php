<?php
namespace app\index\model;

use think\Model;

class User extends Model{
    // 使用数组配置连接
    // protected $connction = [
    //     // 数据库类型
    //     'type'            => 'mysql',
    //     // 服务器地址
    //     'hostname'        => '127.0.0.1',
    //     // 数据库名
    //     'database'        => 'user',
    //     // 用户名
    //     'username'        => 'root',
    //     // 密码
    //     'password'        => 'yDUTtnzSXqGG0sM3',
    //     // 端口
    //     'hostport'        => '3308',
    // ];
    



    // 使用字符串配置连接
    protected $connction = "mysql://root:yDUTtnzSXqGG0sM3@127.0.0.1:3308/user#utf8";
}