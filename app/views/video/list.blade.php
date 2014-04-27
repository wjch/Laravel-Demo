
{{UserController::intoCheck();}}

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
     <span class="label label-info"> 视频管理：</span>
<!--         <input type="text" name="rolename" id="rolename"class="abc input-default" placeholder="" value="">&nbsp;&nbsp;  
        <button type="submit" class="btn btn-success">查询</button>&nbsp;&nbsp;  -->
        <button type="button" class="btn btn-danger" id="addnew">新增视频</button>
    </form>
    <table class="table table-bordered table-hover definewidth m10" >
        <thead>
            <tr>
                <th>选择</th>
                <th>视频编号</th>
                <th>视频名称</th>
                <th>视频大小</th>
                <th>管理操作</th>
            </tr>
        </thead>
        @foreach($videos as $video)
        <tr>
            <td><input type="checkbox"name="{{ $video->id  }}" value="{{ $video->id  }}"></td>
            <td>{{ $video->id  }}</td>
            <td>{{ $video->vname  }}</td>
            <td>{{ $video->filesize }}</td>
            <td>
              <a href="video/{{ $video->id }}/edit">编辑</a>
              <a  onClick="unactive({{ $video->id }})">禁用</a>
              <a  onClick="del({{ $video->id }})">删除</a>
              <a onClick="play({{ $video->id }})" >播放</a>
          </td>
      </tr>
      @endforeach
  </table>
  <div class="inline pull-right page">
     {{ count($videos) }} 条记录
      {{ $videos->links() }}
<!--      1/{{ count($videos)/10 }} 页  <a href='#'>下一页</a>   -->
<!--      <span class='current'>1</span><a href='#'>2</a>-->
<!--      <a href='/chinapost/index.php?m=Label&a=index&p=3'>3</a><a href='#'>4</a><a href='#'>5</a> -->
<!--      <a href='#' >下5页</a> <a href='#' >最后一页</a>    </div>-->
     <script>
        $(function () {

          $('#addnew').click(function(){
            window.location.href="/video/fi";
        });
          return false;
      });

        function del(id)
        {
          if(confirm("确定要删除吗？"))
          {
           var url = "/video/del/"+id;
         // alert(url); 
         window.location.href=url;		
     }
 }
 function play(id){
    var url="/video/play/"+id
        // alert(url); 
        window.open(url);  
    }
</script>

</body>
</html>