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
	
<div class="mt-5">
	

	<div class="row">
		
		<select name="chooseCampaign" id="chooseCampaign" class="form-control">
				<option>Please select a campaign</option>
			@foreach($campaigns as $campaign)
				<option value="{{ $campaign->id }}">{{ $campaign->name }}</option>
			@endforeach
		</select>
		
	</div>
	
</div>
@endsection
@section('extrajs')
<script>
$('#chooseCampaign').change(function(){
	var value = $('#chooseCampaign').val();
	location.replace('{{ asset('/campaign/') }}/' + value);
})
</script>
@endsection