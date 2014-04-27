<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title></title>
    <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('umeditor/themes/default/css/umeditor.css') }}">
    <script src="{{ asset('umeditor/third-party/jquery.min.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('umeditor/umeditor.config.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('umeditor/umeditor.min.js') }}"> </script>
    <script type="text/javascript" charset="utf-8" src="{{ asset('umeditor/lang/zh-cn/zh-cn.js') }}"></script>

	
	<style type="text/css">
	body{
		margin:0 auto;
		background:none repeat scroll 0 0 #F2F0F0;
	}

.form-width{

	width:80%;
}
.alert-info{
	    margin: 0px auto 0px;
}
.alert-danger{
	text-align: center;
    font-size: 20px;
    margin: 40px auto 0px;
}
.btn-style{
	float: left;
	margin:3em 21em;
	
}
	</style>
</head>
<body>

	<div class="alert alert-danger">
     	<p id="p-center">可以点击编辑器右上角的显示器图标进行全屏，以方便操作</p>
	</div>
	    {{Form::open(array('url'=>'article'))}}
   <div class="alert alert-info ">
         <label for="inputtitle" class="label label-success">输入你的标题:</label>
         <input class="form-width"  type="text" placeholder="标题" name="title"/>
         <textarea class="form-width" placeholder="概要" name="summary"height="100px"></textarea>
   </div>
<!--style给定宽度可以影响编辑器的最终宽度-->
<script type="text/plain" id="myEditor" name="content"style="width:1000px;height:240px;">
</script>

        <button type="submit" class="btn btn-success btn-style">保存</button>
    {{ Form::close() }}

<script type="text/javascript">
    var um = UM.getEditor('myEditor');
</script>
  <footer>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="{{asset('/js/bootstrap.min.js') }}"></script>
  </footer>
</body>
</html>
