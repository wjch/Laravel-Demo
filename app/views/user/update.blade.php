@extends('user.layout')

@section('content')
	{{ Form::open(array('url'=>'user/create'))}}
	用户：{{ Form::text('username') }}<br/>
	密码：{{ Form::text('password') }}<br/>
	邮箱：{{ Form::text('email') }}<br/>
	{{ Form::submit('提交添加用户')}}
	{{ Form::close() }}
@stop