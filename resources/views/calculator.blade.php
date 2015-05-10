@extends("master")

@section("calculator")

<form id="calculator" action="/api" method="POST">
	{{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
--}}
	<input id="calculation" value="{{ $calculation }}" />
</form>

@stop
