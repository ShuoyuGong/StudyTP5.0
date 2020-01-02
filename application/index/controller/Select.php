<?php
namespace app\index\controller;

use think\Db;
class   Select
{
    // table方法
    public function index(){
        // 查询所有数据
        $data = Db::table("user_info")->select();
        // 查询一条数据
        $data = Db::table("user_info")->find();
        dump($data);
    }

    // name方法
    public function name(){
        // 查询所有数据
        $data = Db::name("info")->select();
        // 查询一条数据
        // $data = Db::name("info")->find();
        dump($data);
    }

    // 助手函数
    public function helper(){
        $data = db('info')->select();
        $data = db('info')->find();
        dump($data);
    }

    // 条件匹配查询
    public function where(){
        $data = Db::table('user_info')->where("id",">",5)->where("id","<",12)->select();

        $data = Db::table('user_info')->where("name","like","%s%")->select();

        $data = Db::table("user_info")->where("name","龚烁宇")->where("sex","男")->where("id","10")->select();
        dump($data);
    }

    // whereOr或者匹配
    public function whereOr(){
        $data = Db::table("user_info")->where("id",">=",5)->whereOr("id","<=",11)->select();
        $data = Db::table("user_info")->where("name","like","%gsy%")->whereOr("name","like","syh")->select();
        dump($data);
    }

    // limit截取数据
    public function limit(){
        $data = Db::name('info')->limit(2)->select();
        $data = Db::name('info')->limit(2,2)->select();
        dump($data);
    }

    // order排序数据
    public function order(){
        $data = Db::name('info')->order("id","desc")->select();
        dump($data);
    }

    //field设置查询字段
    public function field(){
        $data = Db::name('info')->field("name,sex")->select();
        dump($data);
    }

    //sql系统函数
    public function sqlfun(){
        $data = Db::name('info')->field("count(*) as tot")->select();
        $data = Db::name('info')->field(['name'=>'uname','sex'])->select();
        $data = Db::name('info')->field(['count(*)' => 'tot'])->select();
        $data = Db::name('info')->field("name,sex",true)->select();
        $data = Db::name('info')->field(['name','sex'],true)->select();

        dump($data);
    }
    
    // page方法
    public function page(){
        $data = Db::name('info')->page("1,5")->select();
        dump($data);
    }

     // group方法
     public function group(){
        $data = Db::name('info')->field("name,count(*) tot")->group("name")->select();
        dump($data);
    }

    // having方法
    public function having(){
        $data = Db::name('info')->field("name,count(*) tot")->group("name")->having("tot >= 4 ")->select();
        dump($data);
    }


    // *****************************************第二十节*数据库查询操作(2)*************************************
    
    // 多表查询 原生sql语句方法
    public function tablesSelect(){
        $data = Db::query("select commodity_info.*,commodity_name.name cname from commodity_name,commodity_info where commodity_info.cid = commodity_name.id");
        dump($data);
    }

    // 多表查询 jion方法 默认内连接
    public function join(){
        $data = Db::name("commodity_info")->field("commodity_info.*,commodity_name.name cname")->join("commodity_name","commodity_info.cid = commodity_name.id")->select();
        echo Db::getLastSql();
        dump($data);
    }

    // 多表查询 jion方法 右连接方法
    public function joinRight(){
        $data = Db::name("commodity_info")->field("commodity_info.*,commodity_name.name cname")->join("commodity_name","commodity_info.cid = commodity_name.id",'right')->select();
        echo Db::getLastSql();
        dump($data);
    }

    // 给表起别名 alias方法
    public function alias(){
        $data = Db::name("commodity_info")->alias("i")->field("i.*,n.name cname")->join("commodity_name n","i.cid = n.id",'right')->select();
        echo Db::getLastSql();
        dump($data);
    }

    // 合并多个select语句的结果集 union方法
    // 1.必须由两条或者两条以上的select语句组成，语句之间用关键字union分隔
    // 2.每个查询中必须包含相同的列，表达式或聚集函数(顺序可以不同)
    // 3.列数据类型必须兼容，类型不必完全相同，但必须是DBMS可以隐含地转换的类型。
    public function union(){
        $data = Db::field("name")->table("commodity_name")->union("select name from commodity_info")->select();
        echo Db::getLastSql();
        dump($data);
    }


}