<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/5
 * Time: 16:41
 */
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\db\exception\DataNotFoundException;
use think\db\exception\ModelNotFoundException;
use think\db\Query;
use think\exception\DbException;
use think\Request;
use think\Session;
use think\View;
use app\index\model\User as User;
use think\Log as Log;
use think\Validate;
use think\Cache;

class Login extends Controller {

    public function method() {
        Request::hook('user', 'getUserInfo');
    }

    public function getUserInfo(Request $request, $userId) {
        return $userId;
    }

    public function index() {
        /*$info = Request::instance()->user($userId);*/
        return view();
    }

    public function check() {
        $request = Request::instance();

        $username = $_POST['username'];
        $password = $_POST['password'];

        /*$user = new \app\index\model\User();
        $user->u_name = $username;
        $user->u_password = $password;
        $user->save();*/

        /*$user = new \app\index\model\User($_POST);
        $user->allowField(['u_name', 'u_password'])->save();*/

        //使用model助手函数实例化User模型
        /*$user = model('User');*/
        //模型对象赋值
        /*$user->data([
            'u_name' => 'shift',
            'u_password' => 'shiwrtuew231234',
        ]);
        $user->save();*/

        /*$user = model('User');
        //批量更新
        $list = [
            ['u_name' => 'brophp', 'u_password' => 'brosfs1231'],
            ['u_name' => 'zendframework', 'u_password' => 'zend21413'],
        ];
        $user->saveAll($list);*/

        //遍历更新
        /*$user = new \app\index\model\User();
        $list = [
            ['u_id' => 2, 'u_name' => 'gun', 'u_password' => 'gun234e', 'u_email' => '34214341@qq.com'],
            ['u_id' => 4, 'u_name' => 'knife', 'u_password' => 'knife223', 'u_email' => '23123421@qq.com'],
        ];

        foreach ($list as $data) {
            $user->data($data,true)->isUpdate(true)->save();
        }*/

        //或者这样更新
        /*$user = new \app\index\model\User();*/
        /*$user->where('u_id', 2)
            ->update(['u_name' => 'crontab']);*/

        /*$user->update(['u_id' => 6, 'u_name' => 'daoke']);*/

        \app\index\model\User::where('u_id',4)->update(['u_name' => 'gaokao']);


        //获取当前请求的username变量
        echo '获取请求的用户名'.$request->param('username').'<br/>';
        //获取当前请求的password变量
        echo '获取请求的密码'.$request->param('password').'</br>';
        //获取所有请求参数
        dump($request->param());
        echo '<br/>';
        //检测是否包含username参数
        echo '检测是否包含username参数: '. $request->has('username', 'post'). '<br/>';
        echo '检测是否包含username参数: '. input('?post.username').'<br/>';
        echo '检测是否包含password参数: '. input('?post.password'). '<br/>';

        echo '获取所有参数</br>';
        dump(input('param.'));
        echo '用户名: '.input('param.username');
        echo '密码: '.input('param.password');


        //判断是否登录成功
        if ($username == 'admin' && $password == '123') {
            $this->success('登录成功', url('/'),'', 3);
            $request->cache('blog/:id', 3600);
        } else {
            $this->error('登录失败');
        }

        /*dump($_POST);*/
    }

    /**
     * 请求测试
     */
    public function request() {
        $request = Request::instance();
        //获取当前域名
        echo 'domain: '.$request->domain() . '<br/>';
        //获取当前入口文件
        echo 'file: '.$request->baseFile() . '<br/>';
        //获取当前URL地址 不含域名
        echo 'url with domain: '. $request->url() .'<br/>';
        //获取包含域名的完成URL地址
        echo 'url without query: '. $request->url(true) . '<br/>';
        //获取当前URL地址 不含QUERY_STRING
        echo 'root:' . $request->baseUrl() . '<br/>';
        //获取URL访问的ROOT地址
        echo 'root: '. $request->root() . '<br/>';
        //获取URL访问的ROOT地址
        echo 'root with Domain: '. $request->root(true) . '<br/>';
        //获取URL地址中的PATH_INFO信息
        echo 'pathinfo: ' . $request->path() . '<br/>';
        //获取URL地址中的后缀信息
        echo 'ext: ' . $request->ext() . '<br/>';
        //获取当前模块名称
        echo 'module: '. $request->module() . '<br/>';
        //获取当前控制器名称
        echo 'controller: ' . $request->controller() . '<br/>';
        //获取当前操作名称
        echo 'action: '. $request->action() . '<br/>';
    }

    public function typeRequest($id) {
        $request = Request::instance();
        echo '判断是否有id的get方法'.$request->has('id', 'get'). '<br/>';
        echo '判断是否有id的get方法'.input('?get.id');
    }

    public function setRequest() {


        $request = Request::instance();

        echo '设置get变量';
        dump($request->get(['id' => 10]));
        echo '设置post变量';
        dump($request->port(['name' => 'thinkphp']));

        echo '是否是get请求'.$request->isGet(). '<br/>';
        echo '是否是post请求'.$request->isPost(). '<br/>';
        echo '是否是delete请求'.$request->isDelete(). '<br/>';

        if($request->isAjax()) {
            echo 'Ajax请求'. '<br/>';
            $info = $request->header();
            echo $info['accept']. '<br/>';
            echo $info['accept-encoding']. '<br/>';
            echo $info['user-agent']. '<br/>';
        } elseif ($request->isPjax()){
            echo 'Pjax请求'. '<br/>';
        }
    }

    public function db() {
        echo '<pre>';
        /*$result = Db::query('select * from tb_user where u_id=?', [2]);
        Db::execute('insert into tb_user(u_id, u_name, u_password) values (:u_id, :u_name, :u_password)',['u_id' => 3, 'u_name' => 'test', 'u_password' => 'test123']);*/
        $result = Db::table('tb_user')->where('u_id', 1)->find();
        $data = \db('tb_user')->where('u_name', 'ccy')->select();
        dump($data);
        dump($result);
        echo '</pre>';
    }

    public function query() {
        /*$query = new Query();
        $query->table('tb_user')->where('u_id', 2);
        Db::find($query);

        $data = Db::select($query);*/
        /*$data = Db::select(function ($query) {
            $query->table('tb_user')->where('u_name','znl');
        });*/

        /*$data = Db::table('tb_user')->where('u_id', '2')->column('u_name');
        $result = Db::table('tb_user')->where('u_id', '1')->column('u_id', 'u_name');*/

        //数据集分批处理
        Db::table('tb_user')->chunk(100, function ($users) {
            foreach ($users as $user) {
                dump($user);
            }
        });

        $result = Db::table('tb_user')->where('u_email', '2138474543@qq.com')->find();
        dump($result);
    }

    public function insert() {
        $data = ['u_id' => '8', 'u_name' => 'rabit', 'u_password' => 'rabit123456', 'u_email' => '29918273@163.com'];
       /*$id = Db::table('tb_user')->insertGetId($data);*/
        /*Db::name('user')->insert($data);
       $userId = Db::name('user')->getLastInsID();*/
        $userId = Db::name('user')->insertGetId($data);
       if ( $userId == null) {
           echo "没有获取到";
       }
       else {
           echo '插入的id是'.$userId;
       }
    }

    public function update() {
        /*Db::table('tb_user')->update(['u_name' => 'thinkphp', 'u_id' => 1]);*/
        /*Db::table('tb_user')->where('u_id',1)->update([
            'u_name' => 'laravel',
            'u_count'=> ['exp', 'u_count+1'],
        ]);*/
        /*\db('user')->where('u_id',2)->setField('u_name', 'thinkphp');*/
        Db::table('tb_user')->where('u_id','3')->setField('u_name','yii');
        Db::table('tb_user')->where('u_id',6)->setInc('u_count');
        Db::name('user')->where('u_id',7)->setInc('u_count',6);
        Db::table('tb_user')->where('u_id', 4)->setDec('u_count',1);
        Db::name('user')->where('u_id',5)->setDec('u_count',5);

        \db('user')->where('u_id', 1)->setInc('u_count',2, 30);
        \db('user')->where('u_id', 2)->setDec('u_count',1, 3);
    }

    public function delete() {
        Db::table('tb_user')->delete(1);
        Db::table('tb_user')->delete([1,2,3]);
        Db::name('user')->where('u_id',1)->delete();
        Db::table('tb_user')->where('u_id',2)->delete();
        Db::table('tb_user')->where('u_id','>', 6)->delete();
    }

    public function select() {
        /*$data = Db::table('tb_user')
            ->where('u_name','like', '%think%')
            ->where('u_status', 1)
            ->find();*/

        /*$result = Db::name('user')
            ->where('u_name&u_nickname', 'like', '%thinkphp')
            ->find();*/

        /*$r1 = Db::table('tb_user')->whereLike('u_name','%thinkphp')->find();*/
        /*$redis = new \Redis();
        $con = $redis->connect('127.0.0.1',6379);
        if ($redis->get('far')) {
            dump($redis->get('far'));
        }
        else {
            $result = Db::table('tb_user')->where('u_id','exp', 'in (1,3,4,5)')->field('u_name');
            $redis->set('far', 'chen');
            $data = $redis->get('far');
            dump($data);
        }*/

        /*$result = Db::table('tb_user')
            ->where('u_status', 1)
            ->order('u_create_time')
            ->limit(10)
            ->select();

        $data = Db::table('tb_user')
            ->field('u_id, u_name, u_count,u_create_time')
            ->where('u_id','gt',3)
            ->select();*/

        /*$map['u_name'] = 'thinkphp';
        $map['u_status'] = '1';
        $data = \db('user')
            ->where($map)
            ->select();

        $result = Db::table('tb_user')
            ->where($map)
            ->select();*/

        /*$result = Db::table('__USER__')
            ->where('u_name','like', '%znl%')
            ->select();

        Db::field('user.name, role.title')
            ->table(['tb_user' => 'user', 'tb_role' => 'role'])
            ->limit(10)
            ->select();*/

        /*$result = Db::table('tb_user')
            ->alias('a')
            ->join('tb_user_statistics b', 'b.s_id=a.u_id')
            ->field('a.u_name, a.u_id, b.s_id, b.s_cout')
            ->select();*/

        //分页查询
        /*$result = Db::table("tb_user")->page(1,3)->select();
        $data = Db::table('tb_user')->page(2,3)->select();

        dump($result);
        dump($data);*/

        /*$result = Db::table('tb_user')
            ->fetchSql(true)
            ->find(1);*/

        //强制使用索引
        /*$result = Db::table('tb_user')
            ->force('index_user_name')
            ->find(3);*/

        /*$result = Db::table('tb_user')
            ->where('u_id',':u_id')
            ->where('u_name', ':u_name')
            ->bind(['u_id' => [5
                , \PDO::PARAM_INT], 'u_name' => 'thinkphp'])
            ->select();*/

        /*$result = Db::table("tb_user")
            ->whereTime('u_create_time','today')
            ->select();*/

        /*$result = Db::view('view_user')
            ->field('u_name','u_password')
            ->where('u_name','like','%think%')
            ->select();*/

        /*$result = Db::table('tb_user')
            ->field(['u_id','u_name'])
            ->where('u_id','>',3)
            ->fetchSql(true)
            ->select();*/

        /*$result = Db::table('tb_user')
            ->field('u_id,u_name')
            ->where('u_id','>',5)
            ->buildSql();*/

        /*$result = Db::table('tb_user')
            ->field('u_id,u_name')
            ->where('u_id','in',function ($query) {
                $query->table('tb_user')->where('u_status','=','1')->filed('u_id');
            })
            ->select();*/

        //自动提交事务
        /*Db::transaction(function (){
            Db::table('tb_user')->find(1);
            Db::table('tb_user')->find(3);
            Db::table('tb_user')->delete(1);
        });*/

        //手动提交事务
        //启动事务
        /*Db::startTrans();
        try {
            Db::table('tb_user')->find(2);
            Db::table('tb_user')->delete(3);
            //提交事务
            Db::commit();
        } catch (Exception $e) {
            //事务回滚
            Db::rollback();
        }*/

        //调用存储过程
        /*$result = Db::query('call sp_query(4)');*/
        /*$result = Db::query('call sp_query(?)',[6]);*/
        /*$result = Db::query('call sp_query(:uid)',['uid' => 8]);*/

        //数据集
        //获得数据集
        $users = Db::table('tb_user')->select();
        //直接操作第一个元素
        $item = $users[0];
        //获取记录集记录数
        $count = count($users);
        //遍历数据集
        foreach ($users as $user) {
            echo $user['u_name'];
            /*echo $user['u_password'];*/
        }
        /*echo $count;*/
        /*dump($result);*/
    }

    public function user() {
        /*$user = \app\index\model\User::get(2);
        dump($user['u_name']);*/

        $user = new \app\index\model\User();
        /*$user->data([
            'u_name' => 'java',
            'u_password' => '167864234',
        ]);*/
        $user->u_name = 'SpringMVC';
        $user->u_password = 'dao836723';
        $user->u_count = 6;
        $user->u_email = 'znlccy603704@163.com';
        $user->save();
    }

    /**
     * 修改界面
     */
    public function modify() {
        /*$user = new \app\index\model\User();
        $user->u_name = "Laravel";
        $user->u_password = 'youxiu';
        $user->save();
        echo $user->create_time;
        echo $user->update_time;*/

        //软删除
        /*\app\index\model\User::destroy(15);*/

        //真实删除
        /*\app\index\model\User::destroy(15, true);*/
        /*$user = \app\index\model\User::get(15);*/
        //软删除
        /*$user->delete();*/
        //真实删除
        /*$user->delete(true);*/

        /*$user = \app\index\model\User::get(16);
        $user->delete();

        \app\index\model\User::withTrashed()->find();
        \app\index\model\User::withTrashed()->select();

        \app\index\model\User::onlyTrashed()->find();
        \app\index\model\User::onlyTrashed()->select();*/

        /*$user = \app\index\model\User::scope('name')->get();
        dump($user->u_name);

        $data = \app\index\model\User::scope('age')->all();
        dump($data);*/

        //模型分层
        /*\think\Loader::model('User');
        \think\Loader::model('User', 'logic');
        \think\Loader::model('User', 'service');*/

        //数组转换
        /*$user = \app\index\model\User::get(12);
        dump($user->toArray());*/
        //隐藏create_time和update_time
        /*dump($user->hidden(['create_time','update_time','delete_time'])->toArray())."<br/>";*/

        //转换为json
        /*echo $user->toJson();*/
        /*echo $user->hidden(['create_time','update_time','delete_time'])->toJson();*/

        //注册事件
        /*\app\index\logic\User::event('before_update', function ($user){
            if ($user->u_status != 1) {
                return false;
            }
        });

        \app\index\logic\User::event('before_insert', function ($user) {
            if ($user->u_staus  != 1) {
                return false;
            }
        });*/
    }

    public function view() {
        $view = new View();
        /*$view->name = "ThinkPHP";*/
        $data['name']= 'ThinkPHP';
        /*$data['email'] = "thinkphp@qq.com";*/
        $view->assign('data', $data);
        $a = 2;
        $b = 35;
        $view->assign('a',$a);
        $view->assign('b', $b);
        return $view->fetch();
    }

    public function show() {
        Log::init([
            'type' => 'File',
            'path' => APP_PATH.'logs/'
        ]);

        $list = User::all();
        $this->assign('list', $list);
        $a = 3;
        $b = 35;
        $this->assign('a',$a);
        $this->assign('b', $b);
        return $this->fetch();
    }

    public function dbcheck() {
        /*$validate = new Validate([
            'name' => 'require|max:25',
            'email' => 'email'
        ]);
        $data = [
            'name' => 'thinkphp',
            'email' => 'thinkphp@qq.com'
        ];
        if (!$validate->check($data)) {
            dump($validate->getError());
        } else {
            echo "格式正确";
        }*/
        $rule = [
            'name' => 'require|max:25',
            'email' => 'email',
            'age' => 'number|between:1,120'
        ];

        $message = [
            'name.require' => '名称必须',
            'name.max' => '名称必须不能超过25个字符',
            'email' => '邮件格式不正确',
            'age.number' => '年龄必须是数字',
            'age.between' => '年龄只能在1-120之间',
        ];

        $data = [
            'name' => 'thinkphp',
            'age' => 123,
            'email' => 'thinkphp@qq.com'
        ];

        $validate = new Validate($rule, $message);

        $result = $validate->check($data);

        if (!$result) {
            dump($validate->getError());
        } else {
            echo "格式正确";
        }

    }

    public function cache() {
        Cache::set('name', 'znlccy', 3600);
        Session::set('name','ThinkPHP');
        dump(Cache::get('name'));
        dump(Session::get('name'));
    }

    public function language() {

    }

}