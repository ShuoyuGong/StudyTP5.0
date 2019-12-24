<?php
namespace app\index\controller;
// use app\admin\controller\Index as adminIndex;
// use think\Db
use  \think\Config;
use  \think\Env;
use  \think\Controller;
use  \think\View;
use  \think\Request;
use  \think\Db;
class Index extends Controller
{
    public function index()
    {
        return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="ad_bd568ce7058a1091"></think>';
        // return "龚烁宇";

        // 从数据库中读取数据
        // $data = Db::table('user')->select();
        // var_dump ($data); 

    }
    
// ******************第四节*方法调用和框架加载流程*************
    public function test(){
        echo input('id');
        echo input('name');
        dump(input());
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


// ******************第五节*配置相关(上\下)***********************
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


        // 自定义模块配置
        echo "<hr>";
        echo '自定义模块配置';
        echo "<br>";
        echo '读取前台模块配置项';
        echo "<br>";
        dump(config('index'));

        // 自定义动态配置
        echo "<hr>";
        echo '自定义动态配置';
        echo "<br>";
        echo '通过系统方法进行配置';
        echo "<br>";
        dump(config('name','PHP开发'));
        echo "<br>";
        echo '通过系统类进行配置';
        echo "<br>";
        dump(\think\Config::set('name','WEB前端'));
        echo "<br>";
        dump(Config::set('name','JAVA'));

        // 自定义环境变量配置
        echo "<hr>";
        echo '自定义环境变量配置';
        echo "<br>";
        echo '系统类';
        // use  \think\Env;
        dump(env::get('name'));
        echo "<br>";
        // echo '通过系统类进行配置';
        // echo "<br>";
        // dump(\think\Config::set('name','WEB前端'));
        // echo "<br>";
        // dump(Config::set('name','JAVA'));
        
        

    }

// ******************第八节*动态注册路由***************************
    public function type()
    {
        dump(input());
        return view();
    }
// ******************第九节*路由设置和url生成**********************
    public function course()
    {
        dump(input());
        echo input("id");
    }

// ******************第十三节*获取请求类和URL基本信息***************
    public function request(Request $request){
        // // 使用系统方法
        // $request = request();
        // // TP request类
        // $request = Request::instance();
        // // 使用系统控制器类
        dump($request);
    }
    public function getUrl(Request $request){
        // 获取域名
        dump($request->domain());
        // 获取url地址
        dump($request->url());
        // 获取入口文件
        dump($request->baseFile());
        // 获取pathinfo路径
        dump($request->pathInfo());
        // 获取不带后缀的path
        dump($request->path());
        // 只获取Url伪静态后缀
        dump($request->ext());
    }
    // 获取信息
    public function getInfo(Request $request){
        // 当前模块信息
        dump($request->module());
        // 当前控制器
        dump($request->controller());
        // 当前方法名
        dump($request->action());
    }




// ******************第十四节*输入变量******************************
    public function getType(Request $request){
        // 请求类型
        dump($request->method());

        // 资源类型
        dump($request->type());

        // 访问地址
        dump($request->ip());

        // 判断是否ajax请求
        dump($request->isAjax());

        // 获取请求参数
        dump($request->param());
    
        // 获取特定字段参数
        dump($request->only(['name']));

        // 剔除某些字段
        dump($request->except(['name']));
    }
    public function isajax(){
        return view();
    }
    // 获取地址栏变量
    public function getData(Request $request){
        // 判断get请求类型的中的id是否存在
        dump($request->has('id','get'));
        dump(input('?get.id'));

        // 读取变量
        dump($request->get('id'));
        dump(input('get.id'));

        // 读取所有变量
        dump($request->get());
        dump(input('get.'));
    }
    // 变量过滤
    public function reg(){
        return view();
    }
    public function guolv(Request $request){
        dump(input('post.'));
        // 转实体 过滤一次
        // $request->filter("htmlspecialchars");
        // 多种方法过滤
        // $request->filter(["htmlspecialchars","strip_tags"]);
        // 针对get参数过滤
        // dump($request->post('text','','htmlspecialchars,md5'));
        // 获取变量'user'
        dump($request->only('user'));
        // 排除变量'user'
        dump($request->except('user'));
        // 排除post类型下的变量'user'
        dump($request->except('user','post'));
        // dump(input('post.'));
    }
    // 变量的修饰符
    public function xiushi(Request $request){
        dump(input('get.id/d'));//强制转换整形
        dump(input('get.name/s'));//强制转换为字符串
        dump($request->get('id/d'));
    }
    // 更改变量
    public function changeData(Request $request){
        dump($request->get('id'));
        dump($request->get(['id'=>20]));
    }
    // 类型
    public function iftype(Request $request){
        dump($request->isGet());
        dump($request->isPost());
        dump($request->isPut());
        dump($request->isDelete());
        dump($request->isAjax());
    }
    //模拟put、delete请求
    public function main(){
        return view();
    }
    // 伪静态
    public function jingtai(Request $request){
        // echo url('index/index');
        // dump($request->ext());
        dump($this->main());
    }
    // 参数绑定
    public function bangding($id,$name){
        dump($id);
        dump($name);
    }

// ******************第十六节*数据库连接方法******************************
    public function dataSql(){
        // 实例化系统数据库类
        $db = new Db;
        // 查询数据
        
    }









// ******************课堂**********************
    public function tpl(){
        // 定义数据
        // $hi = "hello";
        // 将变量绑定到模版
        // $this->assign('hi',$hi);
        $view = new View();
        // $view->name = 'gsy';


        // 将数组绑定在模版之上
        // 定义数组
        $arr=[
            'name' => 'gsy',
            'age'  => 19,
            'sex'  => '男',
            'collage'=> '河南职业技术学院',
        ];
        // 定义对象数据
        $obj = json_decode(json_encode($arr));
        $view->assign('obj',$obj);


        
        // 把数据渲染到页面
        // return $this->fetch();
        return $view->fetch();
    }


    public function a(){
        return view();
    }
    public function b(Request $request){
        $id = $request->get('id');
        if($id == 1){
            $this->redirect('index/a');
        }
    }





}







