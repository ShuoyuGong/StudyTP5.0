<?php
// 声明命名空间
namespace app\index\controller;
use \think\Db;
use \think\Controller;
// 声明控制器

// class User extends Controller{
//     public function load(){
//         return $this->fetch();
//     }
//     public function _initialize(){
//         echo "控制器初始化";
//     }
// }

class User extends Controller{
    // 增
    public function insert(){
        // 返回受影响行数
        for ($i=6; $i < 50; $i++) { 
            $data = Db::execute("insert into user_info value($i,'syh','女','河南职业')");
        }
        // $data = Db::execute("insert into user_info value(2,'syh','女','河南职业')");
        // $data = Db::execute("insert into user_info value(4,?,?,?)",["ccw","女","职业"]);
        // $data = Db::execute("insert into user_info value(1,:name,:sex,:address)",['name'=>'gsyyy','sex'=>'男','address'=>'职业学院']);
        dump($data);
    }
    // 删
    public function delete(){
        // $data = Db::execute("delete from user_info where id < 6");
        // $data = Db::execute("delete from user_info where id > ?",[5]);
        $data = Db::execute("delete from user_info where id <= :id",['id'=>10]);
        dump($data);
    }
    // 改
    public function update(){
        $data = Db::execute("update user_info set name = 'lpz' where id = 15");
        dump($data);
    }
    // 查
    public function select(){
        // 使用系统类
        // $data = Db::query("select * from user_info");
        // 
        $data = Db::query("select * from user_info where id >= ? and id <= ?",[0,5]);
        dump($data);
        // 获取最后执行的sql语句
        echo Db::getLastSql();
     }
}