<?php $__env->startSection('content'); ?>


<!-- show session message div -->
<?php if(session()->has('message')): ?>
<div class="alert alert-success">
    <?php echo e(session('message')); ?>

</div>
<?php endif; ?>

<!-- show message when  internet offline  using livewire-->
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('offline', [])->html();
} elseif ($_instance->childHasBeenRendered('wcsLQ5O')) {
    $componentId = $_instance->getRenderedChildComponentId('wcsLQ5O');
    $componentTag = $_instance->getRenderedChildComponentTagName('wcsLQ5O');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('wcsLQ5O');
} else {
    $response = \Livewire\Livewire::mount('offline', []);
    $html = $response->html();
    $_instance->logRenderedChild('wcsLQ5O', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>



<div class="card bg-light" >
    <div class="card-body fs-4" >
            <div class="row">
                <div class="col-sm-3 font-weight-bold">Unit Type</div>
                <div class="col-sm-3 font-weight-bold">Implementating Unit</div>
                <div class="col-sm-3 font-weight-bold">Financial Year</div>
                <div class="col-sm-3 font-weight-bold"></div>
            </div>
            <div class="row">
                <div class="col-sm-3 m-0 font-weight-bold text-primary"><span class="badge badge-pill badge-primary"><?php echo e($unit_rank->name); ?></span> </div>
                <div class="col-sm-3 m-0 font-weight-bold text-primary"><span class="badge badge-pill badge-success">

                    <!-- if $unit hasPmmuDivision show selected division name  otherwise show unit name-->

                    <?php if($unit->has_pmmu_division ): ?>

                        <?php echo e($division->name); ?>


                        <?php else: ?>

                        <?php echo e($unit->name); ?>

                    

                    <?php endif; ?>

                   

                </span> </div>
        
                <div class="col-sm-3 m-0 font-weight-bold text-primary"><span class="badge badge-pill badge-warning"><?php echo e($fy->name); ?></span>  </div>
                <div class="col-sm-3 m-0 font-weight-bold text-primary"><span class="badge badge-pill badge-white"><i class="fas fa-eye"></i>  <a href="<?php echo e(route('update_targets', [$unit_rank->id,$unit->id,$division->id,$fy->id])); ?>">Update Weights and Targets</a></span>  </div>
            </div>
    </div>

    <!-- show a div with array of indicators with null achivement-->



<div class="card">
    <div  class="card-body ">
        <?php $__empty_1 = true; $__currentLoopData = $indicatorgroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

        <div class="alert alert-info" role="alert">
            
         <?php echo e($group->order); ?> - <?php echo e($group->name); ?>

        </div>
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
                        <th scope="col">Achivement (%)</th>
                
                    </tr>
                </thead>     
                <tbody>
                    <!-- calculate each  group indicators weigted_score-->
                    

                    <!-- sort by indicator_order -->
                    <?php $__empty_2 = true; $__currentLoopData = $group->indicators->sortBy('order'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indicator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                    
                    <tr>
                        <th scope="row"><?php echo e($indicator->order); ?></th>
                        <td style="word-wrap: break-word;min-width: 400px;max-width: 400px;"><?php echo e($indicator->name); ?> 
                            <!-- link to remarks modal -->
                            <a href="#" data-toggle="modal" data-target="#remarksModal<?php echo e($indicator->id); ?>">
                            <i class="fas fa-sticky-note"></i>
                        </td>
                        <td><?php echo e($indicator->type->name); ?></td>
                        <td><?php echo e($indicator->measure->name); ?></td>
                        <td><span class="badge badge-pill badge-info"><?php echo e($indicator->indicator_weight); ?></span> </td>
                        <td><?php echo e($indicator->indicator_target); ?></td>
                        <td> <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('indicator-form', ['indicatorId' => $indicator->id,'indicator_id' => $indicator->id])->html();
} elseif ($_instance->childHasBeenRendered('gLhqSjG')) {
    $componentId = $_instance->getRenderedChildComponentId('gLhqSjG');
    $componentTag = $_instance->getRenderedChildComponentTagName('gLhqSjG');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('gLhqSjG');
} else {
    $response = \Livewire\Livewire::mount('indicator-form', ['indicatorId' => $indicator->id,'indicator_id' => $indicator->id]);
    $html = $response->html();
    $_instance->logRenderedChild('gLhqSjG', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>  </td>
                    </tr>
                </tbody>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                <tr>
                    <td colspan="7">No Indicators</td>
                </tr>
                <?php endif; ?> 
                
                <tfoot>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" colspan="1">
                       Group Sub Totals:
                    </th>
                    <th scope="col" colspan="6">
                    
                        Weights  <span class="badge badge-primary"> <?php echo e($group->total_indicators); ?></span> 
                        Composite Score: <span class="badge badge-danger">
                            <?php 
                                $weighted_score = 0;
                                foreach ($group->indicators as $indicator) {
                                    $weighted_score += $indicator->indicator_weighted_score;
                                }
                                echo round($weighted_score,3);
                            ?>
                        
                        </span> 


                    </th>


                </tr>
               

                </tfoot>
            </table>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="alert alert-warning">
                No Indicators 
                <a href="<?php echo e(route('download_template', [$unit_rank->id,$unit->id,$division->id,$fy->id])); ?>" class="btn btn-info btn-block">Create Indicators</a>
        </div>
        <?php endif; ?>
    </div>
</div>


<div class="alert alert-success" role="alert">


<div class="row">

    <div class="col-sm-3">
        Total Weights: <span class="badge badge-primary"><?php echo e($total_indicator_weights); ?></span> 
    </div>


    <div class="col-sm-3">
        Composite Score: <span class="badge badge-success"><?php echo e(round($overall_composite_score,3)); ?></span> 
    </div>

    <div class="col-sm-3">
        Performance Score: <span class="badge badge-danger"><?php echo e($overallScoreGrade['score']); ?></span> 
    </div>

    <div class="col-sm-3">

        Performance Grade: <span class="badge badge-info"><?php echo e($overallScoreGrade['grade']); ?></span> 

    </div>


</div>

</div>

<?php if( $total_indicator_weights == 100 ): ?> 

<div class="alert alert-info" role="alert">

    <div class="row">
    
        <div class="col-sm-3">
            <a href="<?php echo e(route('simple_pmmu', [$unit_rank->id,$unit->id,$division->id,$fy->id])); ?>" class="btn btn-primary btn-sm"> <i class="fa fa-file-pdf-o"></i>Simple PDF</a>
        </div>
    
        <div class="col-sm-3">
            <a href="<?php echo e(route('complex_pmmu', [$unit_rank->id,$unit->id,$division->id,$fy->id])); ?>" class="btn btn-success btn-sm "><i class="fas fa-pdf"></i>  Complex PDF</a>
        </div>
    
        <div class="col-sm-3">
            <a href="<?php echo e(route('simple_pmmu', [$unit_rank->id,$unit->id,$division->id,$fy->id])); ?>" class="btn btn-primary btn-sm"><i class="fas fa-excel"></i> Simple Excel</a>
        </div>
    
        <div class="col-sm-3">
            <a href="<?php echo e(route('complex_pmmu', [$unit_rank->id,$unit->id,$division->id,$fy->id])); ?>" class="btn btn-success btn-sm "><i class="fas fa-excel"></i> Complex Excel</a>
        </div>
    
    
    </div>
    
</div>

        <?php else: ?> 

        <!-- show error message -->
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Weights Error!</h4>

            <p>
                <strong>
                   <!-- show error message -->
                     Total Weights: <span class="badge badge-primary"><?php echo e($total_indicator_weights); ?></span>
                </strong>
         
        </div>


  
        <?php endif; ?>




</div>


<?php $__env->stopSection(); ?>













<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ngobiro/lampstack-8.1.2-0/frameworks/laravel/resources/views/admin/indicators/preview.blade.php ENDPATH**/ ?>