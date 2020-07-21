@extends('layouts.app')

@section('content')
	<div class="col-md-12 x-text text-center">
		<h1>404</h1>
		<p>We are sorry, the page you've requested is not available. </p>
		<form role="form" class="outer-top-vs outer-bottom-xs">
            <input placeholder="Search" autocomplete="off">
            <button class="  btn-default le-button">Go</button>
        </form>
		<a href="home.html"><i class="fa fa-home"></i> Go To Homepage</a>
	</div>
@stop