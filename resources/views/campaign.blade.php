@extends('layouts.main')
@section('extracss')
 <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.1.0/css/flag-icon.min.css" rel="stylesheet">
@endsection
@section('title', 'CustomerHappy Landing page')

@section('content')

<div class="float-right">
	<a href="{{ asset('/login') }}"><i class="fas fa-sign-in-alt"></i></a> &nbsp;
</div>
<div class="container text-center">
	<div id="language">
		 <a class="btn btn-secondary btn-v-lg dropdown-toggle" href="http://example.com" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flag-icon flag-icon-{{ $selectedLanguage->flag }}"> </span> {{ $selectedLanguage->name }}</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown09">
                            	@foreach($lang as $langue)
								<a class="dropdown-item dropdown-item-lg" href="{{ asset('/campaign') }}/{{ $id }}/{{ $langue->code }}">
                                	<span class="flag-icon flag-icon-{{ $langue->flag }}"> </span>  {{ $langue->name }}</a>
                            	@endforeach
                     
                            </div>
</div>
<div class="mt-5">
	<div class="jumbotron lightblue">
		<h2 class="text-center">{{ $campaign->question }}</h2></div>
	</div>
	<div class="mt-10"></div>

	<div class="row">
		
		@foreach($ratings as $rating)
		<div class="col-md-3 align-self-center">
			<h3>{{ $rating->value }}</h3>
			<a href="{{ asset('/vote/') }}/{{ $campaign->id }}/{{ $rating->id }}">{!! $rating->content !!}</a>
		</div>
		@endforeach
	</div>
	
</div>
@endsection
@section('extrajs')

@endsection