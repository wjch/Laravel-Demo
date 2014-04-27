<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title></title>
    <!-- 让IE浏览器运行最新的渲染模式 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 最新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
     <link rel="stylesheet" href="{{ asset('css/flat-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nprogress.css') }}">
    <!--[if lt IE 9]>
    <script src="http://cdn.staticfile.org/jquery/1.11.0/jquery.min.js"></script><![endif]-->
    <!--[if gte IE 9]><!-->
    <script src="http://cdn.staticfile.org/jquery/2.1.0/jquery.min.js"></script>
    <!--<![endif]-->
    <script>window.jQuery || document.write('<script src="{{asset('
        js / jquery - 1.10
        .2.min.js
        ')}}"><\/script>'
        )</script>

    <!--    <script src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>-->
    <script src="{{ asset('js/nprogress.js') }}"></script>
    <!--[if lt IE 7]>
    <div id="browsehappy">你正在使用的浏览器版本过低，请<a href="http://c7sky.com/go/browsehappy"
                                            target="_blank"><strong>升级你的浏览器</strong></a>，获得最佳的浏览体验！
    </div><![endif]-->

    <!--[if lte IE 8]>
    <script src="{{ asset('js/html5shiv.js') }}"></script><![endif]-->
    <!--[if lt IE 9]>
    <script src="{{ asset('js/html5shiv.js') }}"></script><![endif]-->
    <style type="text/css">
        body{
            background-image: url({{ asset('images/background/94.jpg') }});
        }

        .form-pos{
            margin: 9% 0 0 31%;
            padding: 1em 1em 1em 1em;
            width: 35%;
            height: 37%;
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 57px;
            box-shadow: 0 0 50px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        .form-title{
            font-size: 2em;
        }
        .form-group {
            position: relative;
            margin-bottom: 0px;
        }
        .form-control{
            height: 48px;
            font-size: 15px;
            box-shadow: none;
            border-radius: 0;
            border: 0;
            border-bottom: 1px solid #d6d6d6;
            padding-left: 0;
            padding-right: 0;
            background: transparent;
        }
        .error-pos{
            margin:42px auto auto;
            width: 400px;
            text-align: center;
        }
        .loginbtn{
            margin-top: 1em;
        }
        .dropdown-menu>li>a:hover, .dropdown-menu>li>a:focus {
            background-color: #16a085;
        }
    </style>
</head>
<nav id="nav">
    <div class="navbar navbar-default ">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">切换导航</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">数字逻辑</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/">首页</a></li>
                    <li><a href="/article/1">教学大纲</a></li>
                    <li><a href="/article/4">授课计划</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">资源<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/upload/all">文档</a></li>
                            <li class="divider"></li>
                            <li><a href="/paper/index">试卷</a></li>
                            <li><a href="/video/all">视频</a></li>
                        </ul>
                    </li>
                    <li><a href="/comment/all">留言</a></li>
                    <li><a href="/comment/all">友情链接</a></li>
                    <li><a href="/common/all">博客</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/user/login">登录</a></li>
                    <li><a href="/user/reg">注册</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</nav>

<body class="form-login">

	{{ Form::open(array('url'=>'user/login-check','class'=>'form-horizontal form-pos' ,'role'=>'form')) }}
    <div class="form-group">
      <a class="form-title">欢迎登陆</a>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

        <div class="col-sm-10">
            <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="请输入你的邮箱">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">密码</label>

        <div class="col-sm-10">
            <input type="password" name="pass" class="form-control" id="inputPassword3" placeholder="请输入你的密码">
        </div>
    </div>
    <div class="form-group">

        <label class="col-sm-3 control-label" for="input01">验证码</label>
        <div class="col-sm-9">
            <img src="/comment/authcode" onclick="this.src='/comment/authcode?'+Math.random();"/>
            <input type="text" placeholder="验证码" class="input-xlarge" name="authcode">
        </div>
    </div>
    <div class="form-group loginbtn">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-danger btn-lg">登录</button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="reset" class="btn btn-danger">重置</button>
        </div>
    </div>
	{{ Form::close() }}
@section('content')
    @if(Session::get('message')!='')
    <div class="alert alert-danger error-pos">
     {{ Session::get('message') }}
    </div>
   @endif
</body>
<footer>
    <script>
        $('.version').text(NProgress.version);
        NProgress.start();
        NProgress.set(0.2);
        setTimeout(function() { NProgress.done(); $('.fade').removeClass('out'); }, 1000);
    </script>
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="{{asset('/js/bootstrap.min.js') }}"></script>
</footer>

</html>