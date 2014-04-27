<?php

Route::get('/', function () {
    //return View::make('hello');
    return View::make('index');
});
//Route::get('paper', function()
//{
//    return View::make('paper.one');
//});
Route::get('add', function () {
    $user = Sentry::createUser(array(
        'email' => '2@me.com',
        'password' => '123456'
    ));
    return 'USER has added';
});
Route::controller('user', 'UserController');
Route::resource('article', 'ArticleController');
Route::get('dash', array('before' => 'guest', function () {
    if (Sentry::getUser() == null) {
        return Redirect::to('/user/login');
    }
    $user = Sentry::getUser();
    $admin = Sentry::findGroupByName('admin');
    if (!$user->inGroup($admin)) {
        return Redirect::to('/user/login');
    }
    return View::make('Teacher.dash');
}));
Route::controller('paper', 'PaperController');
Route::controller('common', 'CommonController');
Route::controller('comment', 'CommentController');
Route::controller('upload', 'UploadController');
Route::controller('video', 'VideoController');

Route::get('/creategroup', function () {

    try {
        $group = Sentry::createGroup(array(
                'name' => 'user',
                'permissions' => array(
                    'user' => 1
                ),
            )
        );
    } catch (Cartalyst\Sentry\Groups\NameRequiredException $e) {
        echo '用户名是必须的';
    } catch (Cartalyst\Sentry\Groups\GroupExistsException $e) {
        echo '该组已经存在';
    }
});

Route::get('/createadminuser', function () {
    try {
        $adminGroup = Sentry::findGroupByName("admin");
        $user = Sentry::createUser(array(
            'email' => 'admin@me.com',
            'password' => '123456',
        ));
        $user->addGroup($adminGroup);
    } catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
        echo '密码是必需的.';
    } catch (Cartalyst\Sentry\Users\UserExistsException $e) {
        echo '该用户已经存在.';
    } catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e) {
        echo '没有找到改组.';
    }
});

Route::get('/pdf', function () {

});

Route::get('mail',function(){

    $data=array('title'=>'你好','content'=>'欢迎');
    Mail::send('emails.one', $data, function($message)
    {
        $message->to('732739262@qq.com', 'John Smith')->subject('Welcome!');
    });
    return "已发送";
});
Route::get('activate',function(){
    $email=Input::get('email');
    $activation=Input::get('c');
//http://localhost/activate?email=database1@foxmail.com&c=fd5e4723
    $user = Sentry::findUserByLogin($email);
    if($user->attemptActivation($activation)){
        $user->activated=1;
        $user->save();
        return Redirect::to('/user/login')->with('message', '验证成功，请登录');
    }else{
        return $email.$activation;
    }
});