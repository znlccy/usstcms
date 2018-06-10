<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/7
 * Time: 9:31
 */
namespace app\index\model;

use think\Model;
use traits\model\SoftDelete;

class User extends Model {

    //设置当前模型对应的完整数据表名称
    protected $table = 'tb_user';

    //设置模型创建时间
    protected $createTime = 'create_time';

    //设置模型修改时间
    protected $updateTime = 'update_time';

    //设置当前模型自动写入时间戳
    protected $autoWriteTimestamp = 'int';

    //使用软删除
    use SoftDelete;

    //设置当前模型删除时间
    protected $deleteTime = 'delete_time';

    /**
     * 查询姓名范围
     * @param $query
     * @return mixed
     */
    protected function scopeName($query) {
        return $query->where('u_name','like','%think%')->field('u_id','u_name');
    }

    /**
     * 查询年龄范围
     * @param $query
     * @return mixed
     */
    protected function scopeAge($query) {
        return $query->where('u_age', '>', '10')->limit(10);
    }

    //一对一关联
    protected function profile() {
        return $this->hasOne('Profile', 'u_id');
    }
}