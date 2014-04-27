<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-responsive.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}"/>
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
<body>
<form class="form-inline definewidth m20" action="index.html" method="get">
    <span class="label label-info">文章管理：</span>
    <input type="text" name="rolename" id="rolename" class="abc input-default" placeholder="" value="">&nbsp;&nbsp;
    <button type="submit" class="btn btn-primary">查询</button>
    &nbsp;&nbsp;
    <button type="button" class="btn btn-success" id="addnew">新增文章</button>
</form>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>选择</th>
        <th>文章编号</th>
        <th>文章标题</th>
        <th>文章类型</th>
        <th>管理操作</th>
    </tr>
    </thead>
    @foreach( $aa as $a)
    <tr>
        <td><input type="checkbox" name="{{ $a->id  }}" value="{{ $a->id  }}"></td>
        <td>{{ $a->id }}</td>
        <td>{{ $a->title }}</td>
        <td>{{ $a->type }}</td>
        <td>
            <a href="article/{{ $a->id  }}/edit">编辑</a>
            <a onClick="del({{ $a->id  }})">删除</a>
        </td>
    </tr>
    @endforeach
</table>
<div class="page">
    共 {{ count($aa) }} 条记录 {{ $aa->links() }}
</div>
<script>
    $(function () {

        $('#addnew').click(function () {
            window.location.href = "article/create";
        });
    });

    function del(id) {
        if (confirm("确定要删除吗？")) {
            var url = "common/del-article/" + id;
            alert(url);
            window.location.href = url;
        }
    }
</script>

</body>
</html>

