<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>播放:{{$video->vname}}</title>
    <!-- 让IE浏览器运行最新的渲染模式 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 最新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
     <link rel="stylesheet" href="{{ asset('css/flat-ui-video.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <!--[if lt IE 9]><script src="http://cdn.staticfile.org/jquery/1.11.0/jquery.min.js"></script><![endif]-->
    <!--[if gte IE 9]><!--><script src="http://cdn.staticfile.org/jquery/2.1.0/jquery.min.js"></script><!--<![endif]-->
    <script>window.jQuery || document.write('<script src="{{asset('js/jquery-1.10.2.min.js')}}"><\/script>')</script>

    <!--    <script src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>-->
    <!--[if lt IE 7]><div id="browsehappy">你正在使用的浏览器版本过低，请<a href="http://c7sky.com/go/browsehappy" target="_blank" ><strong>升级你的浏览器</strong></a>，获得最佳的浏览体验！</div><![endif]-->

    <!--[if lte IE 8]><script src="{{ asset('js/html5shiv.js') }}"></script><![endif]-->
    <!--[if lt IE 9]><script src="{{ asset('js/html5shiv.js') }}"></script><![endif]-->
    @yield('head')
    <style>

        .dropdown-menu>li>a:hover, .dropdown-menu>li>a:focus {
            background-color: #16a085;
        }
        #loginbtn{
            color: #EA6D6C;
            border: 1px solid #d3d3d3;
            /*background:#EA6D6C ;*/
        }
        #regbtn{
            color: #58CBAA;
            border: 1px solid #d3d3d3;
        }
        .combody{
            /*background-color: #E1C3AE;*/
            margin-top: 100px;
        }
        .video_panel{
            margin-left: 154px;
            margin-top: 30px;
            background-color: white;
            margin-right: 200px;
        }
        .video_body{
            margin-right: 2px;

        }
        .video_title{
            font-size: 30px;
        }
        .video_info{
            margin-right: 83px;
            float: right;
            margin-top: 68px;
            max-width: 220px;
        }
        .clearboth{
            clear: both;
        }
    </style>
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

  <!-- Chang URLs to wherever Video.js files will be hosted -->
  <link href="{{ asset('css/video-js.css') }}" rel="stylesheet" type="text/css">
  <!-- video.js must be in the <head> for older IEs to work. -->
  <script src="{{ asset('js/video.js') }}"></script>

  <!-- Unless using the CDN hosted version, update the URL to the Flash SWF -->
  <script>
    videojs.options.flash.swf = "{{ asset('js/video-js.swf') }}";
  </script>
<body class="combody">
<div class="video_panel">
  <div class="video_info ">
    <address>
      <p class="text-danger video_title"><strong>{{$video->vname}}</strong><p><br>
      {{$video->update_at}}<br>
      <blockquote>
          <p ><strong class="text-primary">视频信息</strong>
          </p>
           <p>{{$video->vname}}</p>
      </blockquote>
<!--      <span class="glyphicon glyphicon-thumbs-up "><small class="text-muted">播放次数<small><strong>12</strong></span>----------->
<!--      <span class="glyphicon glyphicon-star"><small class="text-muted">喜爱，收藏</small><strong>2</strong></span><br>-->
    </address>
  </div>
  <div class="video_body">
    <video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="640" height="480"
        poster="#"
        data-setup="{}">
      <source src="{{ asset($video->vpath) }}" type='video/mp4' />
            <!-- 如果浏览器不兼容HTML5则使用flash播放 -->
      <object id="flash_fallback_1" class="vjs-flash-fallback" width="640" height="264" type="application/x-shockwave-flash"
        data="{{asset('js/video-js.swf')}}">
        <param name="movie" value="{{asset('flowplayer-3.2.1.swf')}}" />
        <param name="allowfullscreen" value="true" />
<!--        <param name="flashvars" value='config={"playlist":["{{ asset('images/background/black_paper.png') }}", {"url": "http://video-js.zencoder.com/oceans-clip.mp4","autoPlay":false,"autoBuffering":true}]}' />-->
        <!-- 视频图片. -->
        <img src="{{ asset('images/background/black_paper.png') }}" width="640" height="264" alt="Poster Image"
          title="No video playback capabilities." />
      </object>
    </video>
  </div>
<div class="clearboth"></div>
</div>

</body>
<footer>
<!--    <script>-->
<!--        $('.version').text(NProgress.version);-->
<!--        NProgress.start();-->
<!--        NProgress.set(0.2);-->
<!--        setTimeout(function() { NProgress.done(); $('.fade').removeClass('out'); }, 1000);-->
<!--    </script>-->
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="{{asset('/js/bootstrap.min.js') }}"></script>
</footer>

</html>

