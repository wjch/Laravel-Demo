@extends('layout.main')
@section('title')<title>发表留言</title>@stop
@section('content')
<div class="com-submit">
		{{ Form::open(array('url'=>'comment/store','class'=>'form-horizontal form-pos' )) }}
 <form class="form-horizontal">
    <fieldset>
    <input type="hidden" name="replyid" value="0"/>
      <div id="legend" class="">
        <legend class="">发表留言</legend>
      </div>
       <div class="control-group">
          <div class="controls">
          	<label class="control-label" for="input01">标题</label>
            <input type="text" name="title" placeholder="请输入你的标题" class="input-xlarge" style="width:45%;">
          </div>
        </div>
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
            <input type="text" placeholder="placeholder" class="input-xlarge">
          </div>
        </div>
          <div class="control-group">
          <div class="controls">
            <button class="btn btn-success">提交回复</button>
          </div>
        </div>
    </fieldset>
		{{ Form::close() }}
    </div>

@stop