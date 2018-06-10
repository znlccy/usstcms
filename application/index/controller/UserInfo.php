<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/5
 * Time: 16:17
 */
namespace app\index\controller;

use think\Controller;

class UserInfo extends Controller {

    protected $beforeActionList = [
        'one',
        'two' => ['except' => 'hello'],
        'three' => ['only' => 'hello,data']
    ];

    public function one() {
        echo "one";
    }

    public function two() {
        echo "two";
    }

    public function three() {
        echo "three";
    }

    public function hello() {
        echo "hello";
    }

    public function data() {
        echo "data";
    }
}