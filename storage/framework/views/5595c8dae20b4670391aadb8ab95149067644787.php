<?php $__env->startSection('content'); ?>
        
<div class="card bg-light">
    <div class="card-body fs-4" >
            <div class="row">
                <div class="col-sm-3 font-weight-bold">Unit Type</div>
                <div class="col-sm-3 font-weight-bold">Implementating Unit</div>
                <div class="col-sm-3 font-weight-bold">Financial Year</div>
                <div class="col-sm-2 font-weight-bold"></div>
                <div class="col-sm-1 font-weight-bold"></div>
            </div>
            <div class="row">
                <div class="col-sm-3 m-0 font-weight-bold text-primary"><span class="badge badge-pill badge-primary"><?php echo e($unit_rank->name); ?></span> </div>
                <div class="col-sm-3 m-0 font-weight-bold text-primary"><span class="badge badge-pill badge-success">
                    
        
                    <?php if($unit->has_pmmu_division ): ?> 

                    <?php echo e($division->name); ?>  

                    <?php else: ?> 
                    
                    
                    <?php echo e($unit->name); ?>  
                    
                    
                    <?php endif; ?>
                
                
                </span> </div>
                <div class="col-sm-3 m-0 font-weight-bold text-primary"><span class="badge badge-pill badge-warning"><?php echo e($fy->name); ?></span>  </div>
                <div class="col-sm-2 m-0 font-weight-bold text-primary"><span class="badge badge-pill badge-white"><i class="fas fa-eye"></i>  <a href="<?php echo e(route('pmmu', [$unit_rank->id,$unit->id,$division->id,$fy->id])); ?>">Go to PMMU</a></span>  </div>     
                <div class="col-sm-1 m-0 font-weight-bold text-primary"><span class="badge badge-pill badge-white"><i class="fas fa-eye"></i>  <a href="<?php echo e(route('unit-ranks.units.divisions.fy.indicator-groups.index', [$unit_rank->id,$unit->id,$division->id,$fy->id])); ?>">Edit Indicators </a></span>  </div>           
            </div>
    </div>
</div>

<div>
    <?php if(session()->has('message')): ?>
        <div class="alert alert-success">
            <?php echo e(session('message')); ?>

        </div>
    <?php endif; ?>
</div> 



     
<div class="card ">
    <div  class="card-body ">
        <?php $__empty_1 = true; $__currentLoopData = $indicatorgroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <p class="fs-4 text-uppercase font-weight-bold font-monospace"> <?php echo e($group->order); ?>- <?php echo e($group->name); ?> </p>
        <div>
            <table class="table table-bordered table table-sm text-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Indicator </th>
                        <th scope="col">Indicator Type</th>
                        <th scope="col">Unit of Meaure</th>
                        <th scope="col">Weight</th>
                        <th scope="col">Target </th>
                       
                
                    </tr>
                </thead>     
                <tbody>
                    <?php $__empty_2 = true; $__currentLoopData = $group->indicators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indicator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                    <tr>
                        <th scope="row"><?php echo e($indicator->order); ?></th>
                        <td style="word-wrap: break-word;min-width: 400px;max-width: 400px;"><?php echo e($indicator->name); ?></td>
                        <td><?php echo e($indicator->type->name); ?></td>
                        <td><?php echo e($indicator->measure->name); ?></td>
                        <td> <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('indicator-weight-form', ['indicatorId' => $indicator->id,'indicator_id' => $indicator->id])->html();
} elseif ($_instance->childHasBeenRendered('Bs4uwuI')) {
    $componentId = $_instance->getRenderedChildComponentId('Bs4uwuI');
    $componentTag = $_instance->getRenderedChildComponentTagName('Bs4uwuI');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Bs4uwuI');
} else {
    $response = \Livewire\Livewire::mount('indicator-weight-form', ['indicatorId' => $indicator->id,'indicator_id' => $indicator->id]);
    $html = $response->html();
    $_instance->logRenderedChild('Bs4uwuI', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>  </td>
                        
                        <td> <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('indicator-target-form', ['indicatorId' => $indicator->id,'indicator_id' => $indicator->id])->html();
} elseif ($_instance->childHasBeenRendered('08CayrP')) {
    $componentId = $_instance->getRenderedChildComponentId('08CayrP');
    $componentTag = $_instance->getRenderedChildComponentTagName('08CayrP');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('08CayrP');
} else {
    $response = \Livewire\Livewire::mount('indicator-target-form', ['indicatorId' => $indicator->id,'indicator_id' => $indicator->id]);
    $html = $response->html();
    $_instance->logRenderedChild('08CayrP', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>  </td>
                     
                     

                    </tr>
                </tbody>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                <?php endif; ?> 
                <tfoot>
                    <tr>
                        <td class="right font-weight-bold" colspan="4">Group Total Weights:</td>
                        <td class="right font-weight-bold"><?php echo e($group->total_indicators); ?></span></td>
                    </tr>
                </tfoot>
            </table>


        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <?php endif; ?>  

<button type="button" class="btn btn-info">
    Grand Weights Total: <span class="badge badge-light"><?php echo e($indicatorgroups->sum('total_indicators')); ?></span>
  </button>
 

 


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ngobiro/lampstack-8.1.2-0/frameworks/laravel/resources/views/admin/indicators/update_targets.blade.php ENDPATH**/ ?>