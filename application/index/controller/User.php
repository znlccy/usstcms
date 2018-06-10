<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/16
 * Time: 17:55
 */
namespace app\index\controller;

use app\index\model\Artitle;
use think\Controller;
use think\View;

class User extends Controller {

    public function index() {
        $artitle = new Artitle();
        $data = "nihjapo";
        $result = $artitle->save($data);
        if ($result) {
            $this->success(' 新增成功','Artitle/list');

        } else {
            $this->error('新增失败');
        }
        return "我是user控制器下面的index方法";
    }
}