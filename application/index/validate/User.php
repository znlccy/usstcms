<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/10
 * Time: 17:01
 */
namespace app\index\validate;

use think\Loader;
use think\Validate;

class User extends Validate {

    protected $rule = [
        'u_name' => 'require|max:30',
        'u_email' => 'email',
        'u_password' => 'require|max:8',
    ];

    protected $message = [
        'u_name.require' => '名称必须',
        'u_name.max' => '名称最多不能超过30个字符',
        'u_mail' => '邮箱格式不正确',
        'u_password.require' => '密码必须',
        'u_password.max' => '密码长度不能超过8个字符'
    ];

    protected $data = [
        'u_name' => 'tinkphp',
        'u_eamil' => 'thinkphp@qq.com',
        'u_password' => '2134u324'
    ];

}