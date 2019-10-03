<?php $__env->startSection('title', 'CustomerHappy Landing page'); ?>

<?php $__env->startSection('content'); ?>
<div class="container text-center">
	<div class="mt-5">
<div class="jumbotron lightblue">
		<h2 class="text-center"><?php echo e($campaign->comingback); ?></h2></div>
		</div>
	<div class="mt-10"></div>

	<div class="row">

	<div class="col-md-6 align-self-center">
		<a href="<?php echo e(asset('/comingback/')); ?>/<?php echo e($vote_id); ?>/1"><i class="fas fa-thumbs-up thumbsup glow"></i></a>
	</div>
	<div class="col-md-6 align-self-center">
		<a href="<?php echo e(asset('/comingback/')); ?>/<?php echo e($vote_id); ?>/0"><i class="fas fa-thumbs-down thumbsdown glow"></i></a>
	</div>
	</div>
	
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('extrajs'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/HappyCustomer/resources/views/comingback.blade.php ENDPATH**/ ?>