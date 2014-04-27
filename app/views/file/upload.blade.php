<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<title></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-responsive.min.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}" />
	<script type="text/javascript" src="{{ asset('js/jquery-1.10.2.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap.js')}}"></script>
	<style type="text/css">
		body {
			padding-bottom: 40px;
		}
		.upload{
			margin-top: 100px;
			margin-left: 300px;
			width: 600px;
			height: 300px
		}
		.add{
			margin-bottom: 7px;
		}
		#addfile{
			margin-top: 20px;
		}
		.uploadbtn{
			float: right;
		}
		.clearfix{
			clear: right;
		}
	</style>
</head>	
<body>
   	
<?php
if (Session::get('info') !=''){
	echo  Session::get('info');
}
?>
	<div class="upload">
		<form method="POST" action="/upload/upload" accept-charset="UTF-8" enctype="multipart/form-data" id="upload-form">
			
			<input name="filen[]" type="file" class="add btn btn-success btn-large clearfix"/>
			<input type="submit" value="上传"class="uploadbtn btn btn-danger btn-large" />
		</form>
		
		<button type="" id="addfile" class="btn btn-info btn-xlarge">继续添加上传文件</button>
	</div>

	<script type="text/javascript">
	// function insertRow(){
	// 	var obj= document.getElementByName("insertrow")[0].cloneNode(true);
	// 	document.all("change").appendChild(obj);
	// }

	$(document).ready(function(){
		$('#addfile').click(function(){
			event.preventDefault(); 
			// var text = '<input name="filen[]" type="file" class="add">';
			var a=$('#upload-form').children('.add').length;
			// alert($('.add').clone());
			// alert($('.add').last());
			// $('.add').last().appendTo($('.add').last().clone());
			if(a<5){
				$('.add').last().clone().insertAfter($('.add').last());
			// alert($('.add').last());
		}else{
			alert("一次最多只能添加5个文件哦");
		}
	});
	});

</script>
</body>
</html>