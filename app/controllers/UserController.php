<?php

class UserController extends BaseController
{


//登录，登出操作
    public function getLogin()
    {
        if(Sentry::getUser()){
            return Redirect::to('/');
        }
        return View::make('user.login');
    }

    public function postLoginCheck()
    {
        //空用户，用户名错误，密码错误
        $email = Input::get('email');
        $pass = Input::get('pass');

        if (empty($email) || empty($pass)) {
            return Redirect::to('user/login')->with('message', '你的邮箱或密码不能为空！');
        }
        $session_code = Session::get("authcode");
        if(Input::get('authcode')!=$session_code){
            return Redirect::to('user/login')->with('message', '验证码不正确!');
        }

        try {
            $credentials = array(
                'email' => $email,
                'password' => $pass,
            );

            $userflag = Sentry::authenticate($credentials, false);

        } catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
            return Redirect::to('user/login')->with('message', '你的用户名不能为空');
        } catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
            return Redirect::to('user/login')->with('message', '你的密码不能为空');
        } catch (Cartalyst\Sentry\Users\WrongPasswordException $e) {
            return Redirect::to('user/login')->with('message', '你的密码错误');
        } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
            return Redirect::to('user/login')->with('message', '用户不存在');
        } catch (Cartalyst\Sentry\Users\UserNotActivatedException $e) {
            return Redirect::to('user/login')->with('message', '用户尚未激活');
        }

        if ($userflag) {
            $user = Sentry::findUserByCredentials($credentials);
            $admin = Sentry::findGroupByName('admin');
            Session::put('user', $user);
            if ($user->inGroup($admin)) {
                Sentry::login($user, false);
                return Redirect::to(Session::get('last_url'));
            }
            return Redirect::to(Session::get('user_url'));
        } else {
            return Redirect::to('user/login')->with('message', '你的用户名或密码错误');
        }

    }

    public function getLogout()
    {
        Sentry::logout();
        Session::remove('user');
        return Redirect::to('/');
    }

//用户操作：添加,删除,更新	
    public function getAllUser()
    {

        if (Sentry::getUser() == null) {
            return Redirect::to('/user/login');
        }
        $user = Sentry::getUser();
        $admin = Sentry::findGroupByName('admin');
        if (!$user->inGroup($admin)) {
            return Redirect::to('/user/login');
        }
        $users = User::orderBy('id')->paginate(3);

        return View::make('user.list')->with(array('users' => $users, 'message' => '你已经登录成功'));
    }


    public function postAddUser()
    {
        if (Sentry::getUser() == null) {
            return Redirect::to('/user/login');
        }
        $user = Sentry::getUser();
        $admin = Sentry::findGroupByName('admin');
        if (!$user->inGroup($admin)) {
            return Redirect::to('/user/login');
        }
        $name = Input::get('username');
        $pass = Input::get('password');
        $email = Input::get('email');
        $user = new User();
        $user->username = $name;
        $user->password = Hash::make($pass);
        $user->email = $email;
        $user->save();

        return "user added";
    }

    public function getTest()
    {
        return 'hello,你get了这个页面';
    }

    public static function intoCheck()
    {
        if (!Session::get('user')) {
            return Redirect::to('/user/login')->with("error", "Please login to access your account");
        }
    }

    public function getReg()
    {
        return View::make('user.reg');
    }

    public function postRegister()
    {
//        $email = Input::get('email');
        $email= $_POST['email'];
        $pass= $_POST['pass'];
//        $pass = Input::get('pass');
        $session_code = Session::get("authcode");
        if(Input::get('authcode')!=$session_code){
            return Redirect::to('user/reg')->with('message', '"验证码不正确!');
        }
        if (empty($email) || empty($pass)) {
            return Redirect::to('user/reg')->with('message', '你的邮箱或密码不能为空！');
        }
        try {
            $user = Sentry::register(array(
                'email' => $email,
                'password' => $pass,
            ));
            $activationCode = $user->getActivationCode();
            $ac_url="http://112.193.141.186/activate?email=".$email."&c=".$activationCode;
            $data=array('email'=>$email,'activationCode'=>$activationCode,'ac_url'=>$ac_url);
            Mail::send('emails.one', $data, function($message)
            {
                $message->to($_POST['email'], 'admin')->subject('欢迎注册数字逻辑');
            });

        } catch (Cartalyst\Sentry\Users\UserExistsException $e) {
            return Redirect::to('user/reg')->with('message', '邮箱已经存在');
        }
        return Redirect::to('/user/login')->with('message', '验证邮箱已经发送');
    }

    public function  beforeCheck()
    {
        if (Sentry::getUser() == null) {
            return Redirect::to('/user/login');
        }
        $user = Sentry::getUser();
        $admin = Sentry::findGroupByName('admin');
        if (!$user->inGroup($admin)) {
            return Redirect::to('/user/login');
        }
    }

}