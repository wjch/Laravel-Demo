@extends('layout.main')
@section('title')<title>发表留言</title>@stop
@section('content')
<div class="com-submit">
    {{ Form::open(array('url'=>'paper/store','class'=>'form-horizontal form-pos' )) }}
    <form class="form-horizontal">
        <fieldset>
            <div id="legend" class="">
                <legend class="">添加试题</legend>
            </div>
            <div class="control-group">
                <label class="control-label">选择类型</label>
                <div class="controls">
                    <select name="type">
                        <option value="xz">选择</option>
                        <option value="pd">判断</option>
                        <option value="tk">填空</option>
                        <option value="jd">简答</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <label class="control-label" for="input01">标题</label>
                    <input type="text" name="title" placeholder="请输入你的标题" class="input-xlarge" style="width:45%;">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">内容</label>
                <div class="controls">
                    <div class="textarea">
                        <textarea type="" name="content" class="" style="margin: 0px; width:90%; height:10em;"> </textarea>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <label class="control-label" for="answer">答案</label>
                    <input type="text" name="answer" placeholder="请输入你的答案" class="input-xlarge" style="width:45%;">
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