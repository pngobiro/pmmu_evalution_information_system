<?php $__env->startSection('content'); ?>

<!-- show  message -->
<?php if(Session::has('message')): ?>
<div class="alert alert-success">
    <?php echo e(Session::get('message')); ?>

</div>
<?php endif; ?>



<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DashBoard</h6>
    </div>
    <div class="card-body text-center">
       <p> Select Rank , Implementing Unit and Financial Year</p>

        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('rankunitdropdown', [])->html();
} elseif ($_instance->childHasBeenRendered('ytpKNPX')) {
    $componentId = $_instance->getRenderedChildComponentId('ytpKNPX');
    $componentTag = $_instance->getRenderedChildComponentTagName('ytpKNPX');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ytpKNPX');
} else {
    $response = \Livewire\Livewire::mount('rankunitdropdown', []);
    $html = $response->html();
    $_instance->logRenderedChild('ytpKNPX', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?> 
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ngobiro/lampstack-8.1.1-0/frameworks/laravel/resources/views/frontend/home.blade.php ENDPATH**/ ?>