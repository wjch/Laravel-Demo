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
            background-image: url({{asset('images/background/congruent_pentagon.png')}});

        }
        .error-pos {
            margin: 42px auto auto;
            width: 400px;
            text-align: center;
        }

        .form-pos {
            margin-top: 8%;
            margin-left: 28%;
            width: 40%;
            padding: 4% 6%;
            background: white;
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

<body >

{{ Form::open(array('url'=>'user/register','class'=>'form-horizontal form-pos' ,'role'=>'form')) }}
<div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label">Email</label>

    <div class="col-sm-9">
        <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
    </div>
</div>
<div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">密码</label>

    <div class="col-sm-9">
        <input type="password" name="pass" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
</div>
<div class="form-group">
    <label for="inputPassword3"  class="col-sm-3 control-label">重复密码</label>

    <div class="col-sm-9">
        <input type="password" name="pass2" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
</div>
<div class="form-group">

        <label class="col-sm-3 control-label" for="input01">验证码</label>
        <div class="col-sm-9">
        <img src="/comment/authcode" onclick="this.src='/comment/authcode?'+Math.random();"/>
        <input type="text" placeholder="验证码" class="input-xlarge" name="authcode">
        </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success btn-lg">注册</button>
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