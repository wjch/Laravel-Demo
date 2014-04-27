@extends('layout.main')
@section('title')<title>{{$article->title}}</title>@stop

@section('content')
<body class="combody">
<link href="//fonts.googleapis.com/css?family=PT+Sans:400italic,400,700italic,700" rel="stylesheet" type="text/css">

<style type="text/css">
    .combody {
        /*background-color: #E1C3AE;*/
        margin-top: 66px;
    }

    .article {
        background-color: white;
    }

    .atricle-head {

        padding-top: 5px;
        border-bottom: 1px solid #ddd;
        /*background: #f5f5f5;*/
        background: #2D3E50;
        height: 90px;
        text-align: center;
        font-size: 21px;
    }

    .article-title {
        color: #EA6D6C;
        font-size: 28px;
    }

    .atrilce-info {
        font-size: 11px;

    }

    .article-content {
        margin-left: 20px;
    }

    .text-muted {
        color: #999999;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="article">
                <div class="atricle-head">
                    <p><strong class="article-title"> {{$article->title}}</strong></p>

                    <p class="atrilce-info text-muted ">{{$article->author}} • 于{{$article->created_at}}发布</p>
                </div>
                <div class="article-content">
                    {{$article->content}}
                </div>
            </div>
<!--        </div>-->
<!--        <div class="col-md-3">-->
<!--            <div class="panel">-->
<!--                <div class="panel-body"><a class="btn btn-success btn-block" href="/topics/new">-->
<!--                        最近的文章-->
<!--                    </a></div>-->
<!--            </div>-->
<!--        </div>-->
    </div>
</div>
</body>
@stop
