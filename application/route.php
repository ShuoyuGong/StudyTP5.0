<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];


// 引入系统类 
use think\Route;

// 定义路由规则
// 1.静态地址路由
// Route::rule('test','index/index/test');
// 2.注册带参数路由
// Route::rule('test/:id','index/index/test');
// 如果路由设置两个参数，必须设置两个参数的路由
// Route::rule('test/:id/:name','index/index/test');
// 3.可选参数的路由
// Route::rule('test/:id/[:name]','index/index/test');
// 4.全动态路由
// Route::rule(':id/[:name]','index/index/test');
// 5.完全匹配路由
// Route::rule('test$/::id/[:name]','index/index/test');
// 如果写成http://www.tp.com:81/test1  可以成功访问
// 如果写成http://www.tp.com:81/test1/waf/gds,如果test1后面写一些东西，则不能访问
// 6.路由额外带参数
// Route::rule('test','index/index/test?id=10&name=gsy');
// Route::rule('test$/::id/[:name]','index/index/test?id=10&name=gsy');


// a.设置路由请求类型
    // 1.get
    // 支持get请求(两种方式)
        // Route::rule('type','index/index/type','get');
        // Route::get('type','index/index/type');
    // 2.post
    // 支持post请求(两种方式)
        // Route::rule('type','index/index/type','post');
        // Route::post('type','index/index/type');
    // 3.同时支持get和post方式
        // Route::rule('type','index/index/type','get|post');
    // 4.支持所有请求方式
        // Route::rule('type','index/index/type','*');
        // Route::any('type','index/index/type','*');
    // 4.put
        // Route::rule('type','index/index/type','put');
        // Route::put('type','Index/index/type');
    // 5.delete
        // Route::rule('type','index/index/type','delete');
        // Route::delete('type','Index/index/type');
    // 6.Route::rule()默认支持所有请求方式



// 动态批量注册路由
// Route::rule([
//     '路由规则1'=>'路由地址和参数',
//     '路由规则2'=>['路由地址和参数','匹配参数（数组）','变量规则（数组）']
//     ...
//     ],'','请求类型','匹配参数（数组）','变量规则');
    // Route::rule([
    //     "test" => "index/index/test",
    //     "course/:id" => "index/index/course",
    // ],'','get');

    // Route::get([
    //     "test" => "index/index/test",
    //     "course/:id" => "index/index/course",
    // ]);

    // 使用配置文件进行批量注册
    // return [
    //     "test" => "index/index/test",
    //     "course/:id" => "index/index/course",
    // ];

    // 变量规则
        // Route::rule("course/:id","index/index/course",'get',[],['id'=>'\d{1,3}']);
    // 路由参数
        // Route::rule("course/:id","index/index/course",'get',['method'=>'get','ext'=>'html'],['id'=>'\d{1,3}']);
        

    // 声明资源路由
        // Route::resource('blog','index/blog');
    // 声明资源路由
        // Route::controller('blog','index/blog');

    
