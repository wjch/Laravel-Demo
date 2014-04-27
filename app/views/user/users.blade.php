<?php
    if (Session::get('user')->admin !='admin'){
      return Redirect::to('/user/login');
    }

?>
@extends('user.layout')
	<div class="alert">
	  <strong>{{ isset($message)?$message:'' }}</strong> 
	</div>

	
@section('content')
		{{ Form::open(array('url'=>'login')) }}
		用户名: {{ Form::text('username') }}<br/>
		密_码: {{ Form::password('password') }}<br/>
		{{ Form::submit('点击我提交') }}
		{{ Form::close() }}
@stop