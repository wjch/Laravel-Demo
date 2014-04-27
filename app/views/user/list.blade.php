<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-responsive.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}" />
    <script type="text/javascript" src="{{ asset('js/jquery-1.10.2.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.sorted.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/ckform.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/common.js')}}"></script>
    <style type="text/css">
        body {
            padding-bottom: 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }


    </style>
</head>	
</head>
<body>
<form class="form-inline definewidth m20" action="index.html" method="get">  
    <span class="label label-info">用户管理：</span>
    <input type="text" name="rolename" id="rolename"class="abc input-default" placeholder="" value="">&nbsp;&nbsp;  
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; 
    <button type="button" class="btn btn-success" id="addnew">新增用户</button>
</form>
<table class="table table-bordered table-hover definewidth m10" >
    <thead>
    <tr>
        <th>选择</th>
        <th>用户编号</th>
        <th>邮箱</th>
        <th>用户类型</th>
        <th>管理操作</th>
    </tr>
    </thead>
	@foreach($users as $user)
	     <tr>
            <td><input type="checkbox"name="{{ $user->id  }}" value="{{ $user->id  }}"></td>
            <td>{{ $user->id  }}</td>
            <td>{{ $user->email  }}</td>
            <td>{{ $user->id }}</td>
            <td>
                  <a href="user/{{ $user->id }}/edit">编辑</a>
                  <a  onClick="unactive({{ $user->id }})">禁用</a>
                  <a  onClick="del({{ $user->id }})">删除</a>
            </td>
        </tr>
	@endforeach
 </table>
<div class="inline pull-right page">
         {{ count($users) }} 条记录 {{ $users->links() }}
    </div>
    <script>
    $(function () {
        
		$('#addnew').click(function(){
				window.location.href="user/add-user";
		 });
    });

	function del(id)
	{
		if(confirm("确定要删除吗？"))
		{
			var url = "common/del-user/"+id;
			alert(url); 
			window.location.href=url;		
		}
	}
</script>

</body>
</html>