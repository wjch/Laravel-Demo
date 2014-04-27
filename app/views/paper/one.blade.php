
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <!-- 让IE浏览器运行最新的渲染模式 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 最新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
     <link rel="stylesheet" href="{{ asset('css/flat-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <!--[if lte IE 8]><script src="{{ asset('js/html5shiv.js') }}"></script><![endif]-->
    <!--[if lt IE 9]><script src="{{ asset('js/html5shiv.js') }}"></script><![endif]-->
    <style>

        .dropdown-menu>li>a:hover, .dropdown-menu>li>a:focus {
            background-color: #16a085;
        }
    </style>
    <title>随机生成pdf试卷</title>
</head>
<header>
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
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
                    <li><a href="/">首页</a></li>
                    <li><a href="/article/1">教学大纲</a></li>
                    <li><a href="/article/4">授课计划</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">资源<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/upload/all">文档</a></li>
                            <li class="divider"></li>
                            <li  class="active"><a href="/paper/index">试卷</a></li>
                            <li><a href="/video/all">视频</a></li>
                        </ul>
                    </li>
                    <li><a href="/comment/all">留言</a></li>
                    <li><a href="/comment/all">友情链接</a></li>
                    <li><a href="/common/all">博客</a></li>
                </ul>
                @if(Sentry::getUser()==null)
                <ul class="nav navbar-nav navbar-right">
                    <li ><a id="loginbtn"  href="/user/login">登录</a></li>
                    <li><a id="regbtn" href="/user/reg">注册</a></li>
                </ul>
                @else
                <ul class="nav navbar-nav navbar-right">
                    <!--                    <li ><a id="loginbtn"  href="/user/{{Sentry::getUser()->id}}">{{Sentry::getUser()->email}}</a></li>-->
                    <li id="loginbtn" class="dropdown">
                        <a  href="/user/{{Sentry::getUser()->id}}" class="dropdown-toggle"
                            data-toggle="dropdown">{{Sentry::getUser()->email}}<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/upload/all">我的</a></li>
                            <li class="divider"></li>
                            <li><a href="/user/logout">退出</a></li>
                            <!--                            <li><a href="/video/all">视频</a></li>-->
                        </ul>
                    </li>
                </ul>
                @endif
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</header>

<style>
    body {
        /*margin: 0;*/
        /*padding: 0;*/
        background-image: url( '{{ asset('images/background/jingxuan0606.jpg') }}');
        font-family: "Helvetica Neue", Helvetica, Arial, "Microsoft Yahei UI", "Microsoft YaHei", SimHei, "\5B8B\4F53", simsun, sans-serif;
    }

    .tester {
        height: 80%;
        width: 52%;
        margin-left: 22%;
        margin-top: 1%;
        font-size: 30px;
        /*background: #ffcc66;*/
    }

    .tester-head {
        margin-bottom: 15px;
        font-size: 0.7em;
        /*background: #0087e8;*/
        color: #667683;
    }

    .wheader{
        /*padding-left: 34%;*/
        text-align: center;
    }
    #mycontent{
        margin-top: 3%;
    }

</style>

<body>
<div id="mycontent">
    <div class="row">
<!--        <div class="col-md-12">-->
            <div class="wheader">
                <h1>随机生成pdf试卷</h1>
            </div>
<!--            <div class="data-article hidden-sm alert">-->
<!--                <span class="count">随机生成pdf试卷</span>-->
<!---->
<!--            </div>-->
            {{ Form::open(array('url'=>'/paper/subject','class'=>'form-horizontal form-pos' ,'role'=>'form','id'=>'paperform')) }}
                <div class="tester">
                    <div class="tester-head">
                        <p>请选择你要生成的试卷的题目类型和数目</p>
                    </div>

                    <div class="tester-content">
                        <ul class="list-group">
                       <li class="list-group-item active">
                           <input type="hidden" name="xz" value="xz"> 选择题
                        <select name="number[xz]">
                            <option value="0">0</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                            <option value="25">25</option>
                        </select></li>
                            <li class="list-group-item">
                        <input type="hidden" name="tk" value="tk"> 填空题
                        <select name="number[tk]">
                            <option value="0">0</option>
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                        </select></li>
                            <li class="list-group-item">
                        <input type="hidden" name="pd" value="pd"> 判断题
                        <select name="number[pd]">
                            <option value="0">0</option>
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="12">12</option>
                            <option value="15">15</option>
                        </select></li>
                            <li class="list-group-item">
                        <input type="hidden" name="jd" value="jd"> 简答题
                        <select name="number[jd]">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                            </li>
                          </ul>

                    <input id="submitit" value="提交" class="btn btn-success" onclick="beforesubmit()">
                    </div>
                    </div>

            {{Form::close()}}
        </div>
    </div>
</body>
<script>
    function beforesubmit(){

//        if($("input[type='checkbox']:checked").length == 0){
//            alert("抱歉，你未选择任何选项");
//            return false;
//        }
        $("form").submit();

    }

</script>
<footer>
    <script src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="{{asset('/js/bootstrap.min.js') }}"></script>
</footer>
</html>
