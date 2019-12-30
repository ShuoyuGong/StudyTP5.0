<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Db;

class Users extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //查询blog数据
        $data = Db::query('select * from user_info');
        // dump($data);
        $this->assign("data",$data);
        return view();
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
        return view();
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    // 处理增加的数据
    public function save(Request $request)
    {
        //接收数据
        $data = input("post.");
        //执行数据库插入
        $code = Db::execute("INSERT INTO `user_info`( `id`,`name`, `sex`, `address`) VALUES (null,:name,:sex,:address)",$data);
        $this->ifSQL($code);
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //从数据库中查询被修改数据
        $data = Db::query("SELECT * FROM `user_info` WHERE id = ?",[$id]);
        $this->assign('data',$data[0]);
        return view();
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //获取除了_method其他变量
        $data = Request::instance()->except('_method');  
        // 执行数据库更新操作
        $code = Db::execute("UPDATE `user_info` SET `name` = ?,`sex` = ?,`address` = ? WHERE `id` = ?",[$data['name'],$data['sex'],$data['address'],$data['id']]);
        $this->ifSQL($code);
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        $code = Db::execute("DELETE FROM `user_info` WHERE id = ?",[$id]);
        $this->ifSQL($code);
    }

    /*
        判断sql语句执行完毕后是否成功
    */ 
    public function ifSQL($code){
        if($code){
            $this->success('SQL语句执行成功','/user');
        }else{
            $this->error('SQL语句执行失败');
        }
    }

    // ajax删除数据
    public function ajax_del(){
        // 接收用户想要删除的数据
        $id = input("post.id/d");
        // 执行删除
        $code = Db::execute("delete from user_info where id = $id");
        if($code){
            $data = [
                'status'=>200,
                'info'=>'删除成功'
            ];
        }else{
            $data = [
                'status'=>400,
                'info'=>'删除失败'
            ];
        }
        return $data;
    }
}
