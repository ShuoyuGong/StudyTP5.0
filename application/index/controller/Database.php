<?php
namespace app\index\controller;

use think\Db;


class Database
{
// ***************************************插入**************
    // 插入一条数据
    public function insertone(){
        /*声明数组
            数据中的键名字必须与数据库中的字段名保持一致
            插入一条数据
        */
        $data = [
            'id'=>null,
            'name'=> "gsy",
            'age' => 20,
            'address' => "河南职业技术学院",
        ];

        // 插入数据库 返回值  受影响行数
        $res = Db::table("user_info")->insert($data);
        dump($res);
    }

    // 插入多条数据
    public function insertmore(){
        /*声明数组
            数据中的键名字必须与数据库中的字段名保持一致
            插入多条数据
        */
        $data = [
            [
                'id'=>null,
                'name'=> "gsy",
                'age' => 20,
                'address' => "河南职业技术学院",
            ],
            [
                'id'=>null,
                'name'=> "syh",
                'age' => 25,
                'address' => "河南职业",
            ],
        ];

        // 插入数据库 返回值  受影响行数
        $res = Db::table("user_info")->insertAll($data);
        dump($res);
    }

    // 获取插入的最后一条数据的ID
    public function getLastId(){
        $data = [
                'id'=>null,
                'name'=> "gsy",
                'age' => 20,
                'address' => "河南职业技术学院",
        ];
        // 插入数据库 返回值  插入的最后一条数据的ID
        $code = Db::table('user_info')->insertGetId($data);
        echo Db::getLastSql();
        dump($code);
    }

    // 使用助手函数插入数据
    public function helperfun(){
        // 插入一条数据
            // $data = [
            //     'id'=>null,
            //     'name'=> "助手函数",
            //     'age' => 20,
            //     'address' => "河南职业技术学院",
            // ];
        // 插入多条数据
            $data = [
                [
                    'id'=>null,
                    'name'=> "gsy",
                    'age' => 20,
                    'address' => "河南职业技术学院",
                ],
                [
                    'id'=>null,
                    'name'=> "ccw",
                    'age' => 25,
                    'address' => "河南职业",
                ],
            ];
        $res = db("user_info")->insertAll($data);
        dump($res);
    }


// ***************************************修改**************
    public function update(){
        // 修改数据 返回值 影响行数
        // 修改user_info表中的id大于14的name字段值为ccw，age字段值为2
        // $res = Db::table("user_info")->where("id",">","14")->update(['name'=>'ccw',"age"=>2]);
        // 修改user_info表中的id字段等于14的age字段值为20
        // $res = Db::table("user_info")->update(["age"=>"20","id"=>14]);
        // 修改user_info表中的id字段等于1的name字段值为ccw
        // $res = Db::table("user_info")->where("id",1)->setField("name","ccw");
        // 设置user_info表中的id字段等于14的age字段自增
        // $res = Db::name("user_info")->where("id","14")->setInc("age");
        // 设置user_info表中的id字段等于14的age字段自减
        // $res = Db::name("user_info")->where("id","14")->setDec("age",3);
        // 使用助手函数设置user_info表中的id字段等于14的age字段自增
        // $res = db("user_info")->where("id",14)->setInc("age");
        // 使用助手函数设置user_info表中的id字段等于14的age字段自减
        // $res = db("user_info")->where("id",14)->setDec("age");
        echo Db::getLastSql();
        dump($res);
    }

// ***************************************删除数据**************
    public function delete(){
        // 删除字段id等于14的一条数据
        // $res = Db::table("user_info")->where("id",14)->delete();
        // $res = Db::table("user_info")->delete(15);
        // 删除多条数据
        // $res = Db::table("user_info")->where("id in(10,12,13)")->delete();
        // $res = Db::table("user_info")->delete([7,8]);
        // 删除区间数据
        // $res = Db::table("user_info")->where("id",">","2")->where("id","<","5")->delete();
        // $res = Db::table("user_info")->where("id > 2 and id < 5")->delete();

        echo Db::getLastSql();
        dump($res);
    }



// ***************************************第二十二节**事务机制************
    public function transaction(){
        // 自动控制事务
        // Db::transaction(function(){
        //     // 删除一条数据
        //     Db::table("user_info")->delete(5);
        //     // 故意写错方法，删除数据
        //     Db::table("user_info")->dete();
        // });

        // 手动控制事务
    }
    
}
