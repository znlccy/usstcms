<?php
namespace app\index\controller;

use think\Config;
use think\Controller;
use think\Env;
use think\View;

class Index extends Controller
{
    /*public function index()
    {
        return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';
    }*/

    /*protected $beforeActionList = [
        'first',
        'second' => ['except'=> 'hello'],
        'third' =>  ['only' => 'hello, data']
    ];*/

    /*protected function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        echo 'nihao</br>';
    }*/

    public function index()
    {
        return $this->fetch();
    }

    public function show() {
        return "Hello, ThinkPHP";
    }

    public function hello($name) {
        return "Hello ".$name;
    }

    public function showName() {
        return "nihao";
    }

    public function api() {
        $data = ['name' => 'thinkphp', 'url' => 'thinkphp.cn'];
        return jsonp(['data' => $data, 'code' => 1, 'message' => '操作完成']);
    }

    public function config() {
        $config = [
            'user' => [
                'type' => 1,
                'name' => 'thinkphp',
            ],
            'db' => [
                'type' => 'mysql',
                'user' => 'root',
                'password' => 'root',
            ]
        ];
        Config::set($config);

        if (Config::has('user')) {
            /*dump(Config::get('database')) ;*/
            echo Env::get('mysql.username');
        } else {
            echo "没有配置参数";
        }
        /*echo Config::get('user.type');*/
    }

    /**
     * 读取函数
     * @param unknown $id
     */
    public function read($id) {
        echo '获取到的id->'.$id;
    }

    public function course() {
        echo input('id');
    }

    /**
     * shianj
     */
    public function shijian() {

        echo input('year').' '.input('month');
    }

    public function test2() {
        dump(input());
    }

    public function type() {
        dump(input());
        echo "我要测试请求类型";
        return view();
    }

    /**
     * 测试模板
     * @return string
     * @throws \think\Exception
     */
    public function test() {
        $view = new View();
        $this->assign('domain',$this->request->url(true));
        return $view->fetch();
    }


}
