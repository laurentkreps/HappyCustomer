@extends('layouts.main')
@section('title', 'CustomerHappy Landing page')

@section('content')
<div class="container text-center">
	<div class="mt-5">
<div class="jumbotron lightblue">
		<h2 class="text-center">Merci !</h2></div>
		</div>
	<div class="mt-10"></div>

	<div class="row">
	<div class="col-md-12 align-self-center">
		<img src="{{ asset('images/check.gif') }}">
	</div>
	</div>
	<div class="row">
	<div class="col-md-12 align-self-center">
		<h3>Nouveau vote dans <span id="time">00:30</span> seconde(s)</h3>
	</div>
	</div>
</div>
@endsection
@section('extrajs')
<script>

	function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            location.replace('http://192.168.64.2/HappyCustomer/public/campaign');
        } 
        	
    }, 1000);
}
window.onload = function () {
    var display = document.querySelector('#time');
    startTimer(30, display);
};
</script>
@endsection