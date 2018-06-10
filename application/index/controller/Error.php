<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/5
 * Time: 15:29
 */
namespace app\index\controller;

use think\Request;

class Error {

    /*public function index(Request $request) {
        //根据当前控制器名来判断要执行的哪个城市的操作
        $cityName = $request->controller();
        return $this->showCity($cityName);
    }*/

    /**
     * 注意city方法本身是protected
     * @param $name
     */
    /*protected function showCity($name) {
        //和$name这个城市相关的处理
        return '当前城市 '. $name;
    }*/
}