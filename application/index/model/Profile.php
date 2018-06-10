<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/10
 * Time: 11:13
 */

namespace app\index\model;

use think\Model;

class Profile extends Model {

    public function user() {
        return $this->belongsTo('User');
    }
}