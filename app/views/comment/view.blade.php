<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>首页</title>
    <!-- 让IE浏览器运行最新的渲染模式 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 最新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flat-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nprogress.css') }}">
    <!--[if lt IE 9]><script src="http://cdn.staticfile.org/jquery/1.11.0/jquery.min.js"></script><![endif]-->
    <!--[if gte IE 9]><!--><script src="http://cdn.staticfile.org/jquery/2.1.0/jquery.min.js"></script><!--<![endif]-->
    <script>window.jQuery || document.write('<script src="{{asset('js/jquery-1.10.2.min.js')}}"><\/script>')</script>

    <!--    <script src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>-->
    <script src="{{ asset('js/nprogress.js') }}"></script>
    <!--[if lt IE 7]><div id="browsehappy">你正在使用的浏览器版本过低，请<a href="http://c7sky.com/go/browsehappy" target="_blank" ><strong>升级你的浏览器</strong></a>，获得最佳的浏览体验！</div><![endif]-->

    <!--[if lte IE 8]><script src="{{ asset('js/html5shiv.js') }}"></script><![endif]-->
    <!--[if lt IE 9]><script src="{{ asset('js/html5shiv.js') }}"></script><![endif]-->
<style type="text/css">
	.com-body{
		/*background-color:  #E1C3AE;*/
    /*margin-top: 60px;*/
  }
  .comment-list{
    background-color: white;
    border-radius: 1em;
    min-height: 200px;
    max-width: 900px;
    margin-bottom: 10px;
    margin-left: 6%;
  }

  .comment-info{
    width: 100px;
    margin-left: 13px;
    margin-top: 13px;
  }
  .comment{
    max-width: 740px;
    margin:15px 11px 18px 30px;
  }
  .comment-title{
    font-size: 24px;
    color: #A84C4A;
    border-bottom: 1px solid #ddd;
    background: #f5f5f5;
  }
  .comment-content{

  }
  .comment-avatar{

  }
  .comment-img{
    display: block;
  }
  .comment-user{
    text-align: center;
    font-size: 10px;
    color: green;
  }
  .com-submit{
    max-width: 900px;
    margin-top: 20px;
    margin-left: 6%;
    background-color: white;
    padding-left: 70px;
  }
  .clearfix{
    clear:right;
  }
</style>
</head>
<body>
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
<body class="com-body ">
  <div class="comment-list clearfix">
    <div class="comment-info pull-left">  
      <div class="comment-avatar">
        <img class="img-thumbnail" src="http://placekitten.com.s3.amazonaws.com/homepage-samples/96/139.jpg">
      </div>
      <div class="comment-user">
        {{ User::find($comment->user_id)->username }} 
      </div>
    </div>
    <div class="comment pull-left">
      <div class="comment-title">
        <p>{{ $comment->title }}</p>
      </div>
      <div class="comment-content">
        {{ $comment->content }}
      </div>
    </div>
  </div>
  @foreach( $replys as $reply)
  <div class="comment-list clearfix">
    <div class="comment-info pull-left">  
      <div class="comment-avatar">
        <img class="img-thumbnail" src="http://placekitten.com.s3.amazonaws.com/homepage-samples/96/139.jpg">
      </div>
      <div class="comment-user">
        {{ User::find($reply->user_id)->email }}
      </div>
    </div>
    <div class="comment pull-left">
      <div class="comment-title">
        <p>{{CommonController::timeago(date('Y-m-d', strtotime($reply->created_at )))}}</p>
      </div>
      <div class="comment-content">
        {{ $reply->content }}
      </div>
    </div>
  </div>
  @endforeach
   <div class="com-submit">
    {{ Form::open(array('url'=>'comment/store','class'=>'form-horizontal form-pos' )) }}
    <form class="form-horizontal">
      <fieldset>
        <input type="hidden" name="user_id" value="3"/>
        <input type="hidden" name="title" value=" "/>
        <input type="hidden" name="replyid" value="{{ $comment->id}}"/>
        <div class="control-group">
          <label class="control-label">回复内容</label>
          <div class="controls">
            <div class="textarea">
              <textarea type="" name="content" class="" style="margin: 0px; width:90%; height:10em;"> </textarea>
            </div>
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <label class="control-label" for="input01">请输入验证码:</label>

              <img src="/comment/authcode" onclick="this.src='/comment/authcode?'+Math.random();"/>
              <input type="text" placeholder="验证码" class="input-xlarge" name="authcode">
          </div>
        </div><div class="control-group">
        <div class="controls">
          <button class="btn btn-success">提交回复</button>
        </div>
      </div>
    </fieldset>
      {{ Form::close() }}
  </body>
<script src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="{{asset('/js/bootstrap.min.js') }}"></script>
</body>
<footer>
    <script>
<!---->
//        $('body').show();
//        $('.version').text(NProgress.version);
//        NProgress.start();
//        NProgress.set(0.2);
//        setTimeout(function() { NProgress.done(); $('.fade').removeClass('out'); }, 1000);
    </script>
</footer>
</html>