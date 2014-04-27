<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<title></title>
	<meta charset="UTF-8">
	<script src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("button").click(function(){
				$.get("/user/test",function(data,status){
					alert("Data: " + data + "\nStatus: " + status);
				});
			});
		});


	</script>
</head>
<body>
<button>向页面发送 HTTP GET 请求，并获得返回的结果</button>
</body>
<html>


