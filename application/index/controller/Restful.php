<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/5
 * Time: 16:27
 */

namespace app\index\controller;

use think\controller\Rest;
use think\Response;

class Restful extends Rest {

    /*public function rest() {
        switch ($this->method) {
            case 'get':
                if ($this->type == 'html') {

                } elseif ($this->type == 'xml') {

                }
                break;
            case 'post':
                break;
            case 'put':
                break;
            case 'delete':
                break;
        }
    }*/

    public function index() {

        $data = [
            'name'      => 'chencongye',
            'age'       => '23',
            'gender'    => 'male'
        ];

        switch ($this->method) {
            case 'get':
                /*Response::create($data, 'json')->code(200);*/
                echo "get请求";
                break;
            case 'post':
                Response::create($data, 'xml')->code(200);
                break;
            case 'put':
                $this->response($data, 'json', '200');
                break;
            case 'delete':
                json($data, 200);
                break;
        }
    }

}