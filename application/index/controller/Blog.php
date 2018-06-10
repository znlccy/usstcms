<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/5
 * Time: 11:28
 */
namespace app\index\controller;

use think\Url;

class Blog {

    //index方法
    public function index() {
        dump(Url::build('index/blog/index'));
        echo "我是blog控制器index方法";
    }

    public function create() {
        echo "创建博客";
    }

    public function save() {
        echo "保存博客";
    }

    public function read($id) {
        dump(Url::build('index/blog/index'));
        dump(\url('index/index/course/id/10'));
        dump(Url::build('@index/blog/read', 'id=5'));
        dump(\url('@index/blog/read', 'id=3'));
        dump(Url::root("/index.php"));
        dump(Url::build("index/blog/read@blog", "id=5"));
        echo "读取博客id=".$id;
    }

    public function edit($id) {
        echo "编辑博客id=".$id;
    }

    public function update($id) {
        echo "更新博客id=".$id;
    }

    public function delete($id) {
        echo "删除博客id=".$id;
    }

    public function getInfo() {
        echo "通过get请求获取信息";
    }

    public function getPhone() {
        echo "通过get请求获取电话";
    }

    public function postInfo() {
        return json("通过post请求获得信息");
    }

    public function putInfo() {
        return json("通过put请求更新信息");
    }

    public function deleteInfo() {
        echo "通过delete请求删除信息";
    }

    public function miss() {
        echo "不匹配的路由";
    }
}
