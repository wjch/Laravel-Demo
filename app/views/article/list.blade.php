@extends('layout.main')

@section('content')
	<style type="text/css">
	*{
		-moz-box-sizing: border-box;
		-webkit-box-sizing: border-box;
		-o-box-sizing: border-box;
		-ms-box-sizing: border-box;
		box-sizing: border-box;
	}
	body{
		margin:0 auto;
		/*background:none repeat scroll 0 0 #67B784;*/
	}
	.ablock {
        width: 76%;
        margin: 0.5em auto 0em 8em;
        float: left;
        height: 10em;
        background: #fff;
        border-radius: 1em;
        border: 1px gray solid;

	}
	.ablock:hover {
		border-radius: 5px 5px 5px 5px;
    	box-shadow: -11px 20px 48px rgba(0, 0, 0, 0.5);
    }
    .paegr-pos{
    	margin-top: 47px;
		width: 100%;
		float: left;
    }
    .a-title{
    	text-align: center;

    }
    .list-right{
		top: 24%;
		float: right;
		font-size: 17px;
		position: fixed;
		background-color: aliceblue;
		right: 6%;
		padding: 0px;
		text-align: center;
		width: 150px;
    }
    .list-right li{
		list-style: none;
		padding-bottom: 39px;
		border: 1px solid cadetblue;
		height: 46px;

    }
    .all-block{
        margin-top: 2%;
    }
    .title-a{
        color: #D95A48;
    }
     .page{
         float: left;
         margin-top: 5%;
         margin-left: 40%;
     }
	</style>
<!--<div class="right-list">-->
<!--<ul class="list-right">-->
<!--<!--  <li>首页</li>-->-->
<!--<!--  <li>教学大纲</li>-->-->
<!--<!--  <li>授课计划</li>-->-->
<!--<!--  <li>Vestibulumw</li>-->-->
<!--    <li>-->
<!--    </li>-->
<!--</ul>-->
<!--</div>-->
<div class="all-block">
<article>

	@foreach( $aa as $a)
	<div class="ablock">
		<h4 class="a-title"><a class="title-a"href="/article/{{ $a->id}}">{{ $a->title  }}</a></h4>

        {{ $a->summary }}</div>
	@endforeach


</article>
</div>
<div class="page">

{{ $aa->links() }}
</div>

@stop

