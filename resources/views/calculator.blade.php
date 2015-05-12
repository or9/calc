@extends("master")

@section("calculator")

<link rel="import" href="/components/calculator/calculator-ui.html" />

<form id="calculator" action="/api" method="POST">
	{{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
--}}
	<input type="hidden" id="calculation" value="{{ $calculation }}" />
</form>

<calculator-ui></calculator-ui>

@stop
