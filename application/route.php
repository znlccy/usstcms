<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;
Route::rule('/','index/index/index');
/*Route::rule('config', 'index/index/config');
Route::rule('new/:id', 'index/index/read');

Route::rule('course/:id', 'index/index/course');*/

Route::rule('time/:year/[:month]', 'index/index/shijian');

Route::rule('test2','index/index/test2?id=10&name=ze');

/*Route::rule('type','index/index/type','post|get');*/

Route::get('type', 'index/index/type');

Route::put('type', 'index/index/type');

Route::delete('type', 'index/index/type');

Route::delete('delete', 'index/index/type');

/*Route::rule('course/:id/:name', 'index/index/course','get', [], ['id' => '\d{1,3}', 'name' => '\w+']);*/
/*Route::rule('course/:id/:name', 'index/index/course','get', ['method' => 'get', 'ext' => 'html'], ['id' => '\d{1,3}', 'name' => '\w+']);*/

//声明资源路由
Route::resource('blog', 'index/index/blog');

Route::controller('blog','index/blog');

/*Route::miss('blog/miss');*/

Route::get('hello', function () {
    return 'Hello, word!';
});

Route::get('nihao/:name', function ($name) {
    return 'hello'.$name;
});

Route::bind("index");

/*Route::rule([
    'config' => 'index/index/config',
    'course/:id' => 'index/index/course'
],'', 'get');*/

/*Route::get([
    'config' => 'index/index/config',
    'course/:id' => 'index/index/course'
]);*/

/*return [
    'config' => 'index/index/config',
    'course/:id' => 'index/index/course'
];*/

/*Route::get('type', 'index/index/type');*/
/*Route::rule('news/:id', 'index/News/read');
Route::rule('news/:id', 'News/update', 'POST');
Route::post('news/:year', 'News/read');*/

/*return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];*/

