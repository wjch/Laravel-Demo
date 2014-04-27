<!DOCTYPE HTML>
<html>
 <head>
  <title>后台管理系统</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link href="{{asset('assets/css/dpl-min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('assets/css/bui-min.css')}}" rel="stylesheet" type="text/css" />
   <link href="{{asset('assets/css/main-min.css')}}" rel="stylesheet" type="text/css" />
 </head>
 <body>
  <div class="header">
      <div class="dl-title">
       <!--<img src="/chinapost/Public/assets/img/top.png">-->
       我的管理
      </div>
    <div class="dl-log">欢迎您，<span class="dl-log-user">

      {{Session::get('user')->email}}</span><a href="/user/logout" title="退出系统" class="dl-log-quit">[退出]</a>
    </div>
  </div>
   <div class="content">
    <div class="dl-main-nav">
      <div class="dl-inform"><div class="dl-inform-title"><s class="dl-inform-icon dl-up"></s></div></div>
      <ul id="J_Nav"  class="nav-list ks-clear">
        		<li class="nav-item dl-selected"><div class="nav-item-inner nav-home">基本</div></li>	 <li class="nav-item dl-selected"><div class="nav-item-inner nav-order">系统管理</div></li>     
      </ul>
    </div>
    <ul id="J_NavContent" class="dl-tab-conten">
    </ul>
   </div>
  <script type="text/javascript" src="{{asset('assets/js/jquery-1.8.1.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/bui-min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/common/main-min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/config-min.js')}}"></script>
  <script>
    BUI.use('common/main',function(Menu){
      var config = [{id:'1',menu:[{text:'基本',items:[{id:'2',text:'文章管理',href:'article'},{id:'3',text:'管理',href:'user/all-user'},{id:'4',text:'视频管理',href:'video/manage'}]},{text:'下载资源',items:[{id:'9',text:'课件管理',href:'user/all-user'},{id:'10',text:'习题管理',href:'paper/all'}]}]},{id:'7',homePage:'10',menu:[{text:'系统设置',items:[{id:'9',text:'评论管理',href:'comment/manage'},{id:'10',text:'用户管理',href:'user/all-user'},{id:'11',text:'视频信息管理',href:'video/manage'}]}]}   ];
      new PageUtil.MainPage({
        modulesConfig : config
      });
    });
  </script>
 </body>
</html>