@extends('layout.main')
@section('title')<title>留言列表</title>@stop

<style type="text/css">
  body{
    color: black;
  }

  .combody{
    /*background-color: #E1C3AE;*/
    margin-top: 66px;
  }
  .list-group-item-heading{
    min-height: 29px;
    margin-left: 2px;
    font-size: 20px;
    max-width: 31em;
    display: inline-block;
    color: black;
    font-weight: bolder;
    margin-bottom: 0px;
    white-space:normal;  /*溢出的时候文字换行，并配合上面的固定高度，对文字进行裁切*/
    /*overflow:overlay;*/
    text-overflow:ellipsis;  /*截断文字，显示省略号(...)*/
    -o-text-overflow:ellipsis;  /*Opera的专用截断文字的属性*/
    word-wrap: break-word; 
    word-break: normal; 
  }
  .text-muted{
    color: #999999;
  }
  .list-group-item-avatar{
    float: left;
  }

  .list-group-campo .list-group-item {
    padding: 15px 16px;
    border: none;
    border-bottom: 1px solid #eee;
    margin-bottom: 0;
  }

  .list-group-campo {
    margin: -15px -16px;
    padding: 0;
  }
  .list-group {
    margin-bottom: 20px;
    padding-left: 0;
  }
  .list-group-item{
    padding: 15px;
  }
  .list-group-item:first-child {
    border-top-right-radius: 4px;
    border-top-left-radius: 4px;
  }
  .list-group-item-content{
    margin-left: 60px;
  }
  a.list-group-item {
    color: #555555;
  }
  .panel .panel-heading {
    margin: 0 -1px;
    padding: 10px 16px;
    border-bottom: 1px solid #eee;
  }
  .panel-heading {
    padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-right-radius: 3px;
    border-top-left-radius: 3px;
    border-bottom: 1px solid #ddd;
    background: #f5f5f5;
  }
  .panel .panel-title {
    line-height: 35px;
    font-size: 1.2em;

  }
  .panel-title {
    margin-top: 0;
    margin-bottom: 0;
    font-size: 17px;
    color: inherit;
  }
  h3, .h3 {
    font-size: 26px;
  }
  .panel-body{
    padding: 15px;
  }
  .input-group-btn:last-child>.btn, .input-group-btn:last-child>.btn-group {
    margin-left: -1px;
  }
  .fa-search:before {
    content: "\f";
  }

  @media only screen and (max-width : 320px) {
    .list-group-item-heading{
      height: 29px;
      margin-left: 2px;
      font-size: 20px;
      max-width: 31em;
      display: inline-block;
      color: black;
      font-weight: bolder;
      margin-bottom: 0px;
      white-space:normal;  /*溢出的时候文字换行，并配合上面的固定高度，对文字进行裁切*/
      overflow:hidden;
      text-overflow:ellipsis;  /*截断文字，显示省略号(...)*/
      -o-text-overflow:ellipsis;  /*Opera的专用截断文字的属性*/
    }
  }
</style>

@section('content')
<body class="combody" style="display: none">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="panel">
          <div class="panel-heading clearfix">
<!-- <div class="pull-right">
  <ul class="nav nav-pills">
    <li class="active"><a href="/topics?tab=hot">Hot</a></li>
    <li><a href="/topics?tab=newest">最新</a></li>
  </ul>
</div> -->
<h3 class="panel-title">所有留言</h3>
</div>
<div class="panel-body">
  <div class="list-group list-group-campo recordable">
    @foreach( $all_comment as $comment)
    <div class="list-group-item topic">
     <!--    此处与Commentcontroller存在耦合     -->
     <img class="img img-rounded list-group-item-avatar" src="{{ asset('images/test.png') }}">
     <div class="list-group-item-content">
      {{link_to_action('CommentController@getShow', $comment->title,
      $parameters = array('id'=>$comment->id),$attributes = array('class'=>'list-group-item-heading'))}}
      <div class="text-muted">
        <a herf="user/{{$comment->user_id}}" >{{ User::find($comment->user_id)->username }}</a>
        发表于:{{ CommonController::timeago(date('Y-m-d', strtotime($comment->updated_at)))}} 
      </div>
    </div>
  </div>

  @endforeach

      {{ $all_comment->links() }}
</div>
</div>
</div>
</div>

<div class="col-md-3">
  <div class="panel">
    <div class="panel-body">
      <!--       <form accept-charset="UTF-8" action="#" class="search-form" data-behaviors="turboform" method="get"> -->
      <SCRIPT language=javascript>
        function g(formname)    {
          var url = "http://www.baidu.com/baidu";
          if (formname.s[1].checked) {
            formname.ct.value = "2097152";
          }
          else {
            formname.ct.value = "0";
          }
          formname.action = url;
          return true;
        }
      </SCRIPT>
      <form name="f1"  class="search-form" method="get" action="http://www.baidu.com/baidu">
        <div style="display:none">
          <input name="utf8" type="hidden" value="true">
        </div>
        <div class="input-group">
          <!--           <input autocomplete="off" class="form-control" id="q" name="q" placeholder="搜索" tabindex="1" type="text"> -->
          <input  class="form-control" name="word" size="30" maxlength="100" >
          <input name="tn" type="hidden" value="bds" />
          <input name="cl" type="hidden" value="3" />
          <input name="si" type="hidden" value="localhost" />
          <input name="ct" type="hidden" value="2097152" />

          <div class="input-group-btn">
          <button class="btn btn-default" tabindex="2" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </form>
    </div>
  </form>
</div>
</div>
<div class="panel"><div class="panel-body"><a class="btn btn-success btn-block" href="/comment/new">新建留言</a></div></div></div>
</div>
</div>

  <script>
      $('body').show();
      NProgress.start();
      NProgress.set(0.2);
      setTimeout(function() { NProgress.done(); $('.fade').removeClass('out'); }, 1000);

  </script>
</body>
@stop
