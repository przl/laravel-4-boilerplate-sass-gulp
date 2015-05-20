@extends('master')



@section('title') Title Goes Here @stop


@section('meta')

	<meta name="example-meta" content="meta-stuff-here">

@stop


@section('styles')
	{{ HTML::style('example.css') }}
@stop


@section('content')

	<h1>Success!</h1>

	<ul> @include('pages.example.partials.partial-sample') </ul>

@stop


@section('scripts')

	{{ HTML::script('example') }}

@stop