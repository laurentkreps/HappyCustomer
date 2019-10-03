<?php $__env->startSection('title', 'CustomerHappy Landing page'); ?>

<?php $__env->startSection('content'); ?>
<div class="container text-center">
	<div class="mt-5">
<div class="jumbotron lightblue">
		<h2 class="text-center">Merci !</h2></div>
		</div>
	<div class="mt-10"></div>

	<div class="row">
	<div class="col-md-12 align-self-center">
		<img src="<?php echo e(asset('images/check.gif')); ?>">
	</div>
	</div>
	<div class="row">
	<div class="col-md-12 align-self-center">
		<h3>Nouveau vote dans <span id="time">00:30</span> seconde(s)</h3>
	</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('extrajs'); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/HappyCustomer/resources/views/thankyou.blade.php ENDPATH**/ ?>