@extends('layouts.main')
@section('title', 'CustomerHappy Landing page')

@section('content')
<div class="container text-center">
	<div class="mt-5">
<div class="jumbotron lightblue">
		<h2 class="text-center">{{ $campaign->comingback }}</h2></div>
		</div>
	<div class="mt-10"></div>

	<div class="row">

	<div class="col-md-6 align-self-center">
		<a href="{{ asset('/comingback/') }}/{{ $vote_id }}/1"><i class="fas fa-thumbs-up thumbsup glow"></i></a>
	</div>
	<div class="col-md-6 align-self-center">
		<a href="{{ asset('/comingback/') }}/{{ $vote_id }}/0"><i class="fas fa-thumbs-down thumbsdown glow"></i></a>
	</div>
	</div>
	
</div>
@endsection
@section('extrajs')

@endsection