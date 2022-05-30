<?php $__env->startSection('content'); ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-center">Download Master Excel</h6>


    </div>
    <div class="card-body text-center">
        <p>Select Rank and Financial Year</p>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('excel-reports-dropdown', [])->html();
} elseif ($_instance->childHasBeenRendered('Olm3nzR')) {
    $componentId = $_instance->getRenderedChildComponentId('Olm3nzR');
    $componentTag = $_instance->getRenderedChildComponentTagName('Olm3nzR');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Olm3nzR');
} else {
    $response = \Livewire\Livewire::mount('excel-reports-dropdown', []);
    $html = $response->html();
    $_instance->logRenderedChild('Olm3nzR', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?> 
    </div>
</div>









<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ngobiro/lampstack-8.1.1-0/frameworks/laravel/resources/views/admin/reports/excel_reports.blade.php ENDPATH**/ ?>