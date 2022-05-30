<?php $__env->startSection('content'); ?>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DashBoard</h6>
    </div>
    <div class="card-body text-center">
       <p> Select Rank , Implementing Unit and Financial Year</p>

        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('rankunitdropdown', [])->html();
} elseif ($_instance->childHasBeenRendered('zZ65KL1')) {
    $componentId = $_instance->getRenderedChildComponentId('zZ65KL1');
    $componentTag = $_instance->getRenderedChildComponentTagName('zZ65KL1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('zZ65KL1');
} else {
    $response = \Livewire\Livewire::mount('rankunitdropdown', []);
    $html = $response->html();
    $_instance->logRenderedChild('zZ65KL1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?> 
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ngobiro/lampstack-8.1.1-0/frameworks/laravel/resources/views/frontend/home.blade.php ENDPATH**/ ?>