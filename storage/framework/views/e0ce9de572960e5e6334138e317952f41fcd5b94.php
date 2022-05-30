<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3> PERFORMANCE MANAGEMENT & MEASUREMENT UNDERSTANDING ANALYSIS </h3>
                <h3><?php echo e($unit->name); ?></h3>
                <h4> PERFORMANCE FOR THE YEAR <?php echo e($fy->name); ?></h4>
                <h6> Generated on : <?php echo e(date("d-m-Y H:i:s")); ?> PM </h6>
            </div>

            <div class="card-body">

                <?php $__currentLoopData = $indicatorgroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <h3 class="m-0 font-weight-bold text-primary"> <?php echo e($group->order); ?> - <?php echo e($group->name); ?></h3>
                      
                <div>
                    <table class="table table-bordered table table-sm text-dark" >
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Indicator </th>
                                <th scope="col">Indicator Type</th>
                                <th scope="col">Unit of Meaure</th>
                                <th scope="col">Weight</th>
                                <th scope="col">Target </th>
                                <th scope="col">Achivement (%)</th>
                                <th scope="col">Percentage Score(%)</th>
                       
                                
                        
                            </tr>
                        </thead>     
                        <tbody>
                
                            <?php $__currentLoopData = $group->indicators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indicator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($indicator->order); ?> .</th>
                                <td style="word-wrap: break-word;min-width: 450px;max-width: 450px;"><?php echo e($indicator->name); ?></td>
                                <td><?php echo e($indicator->type->name); ?></td>
                                <td><?php echo e($indicator->measure->name); ?></td>
                                <td><?php echo e($indicator->indicator_weight); ?></td>
                                <td><?php echo e($indicator->indicator_target); ?></td>
                                <td><?php echo e($indicator->indicator_achivement); ?></td> 
                                <td><b><?php echo e(round($indicator->indicator_performance_score,2)); ?></b> </td>

                                
                            </tr>
                        </tbody>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tfoot>
                            <tr>
                                <td class="right font-weight-bold" colspan="5"><b>Group Total Weights:</b></td>
                                <td class="right font-weight-bold"><b><?php echo e($group->total_indicators); ?></b></span></td>
                            </tr>
                        </tfoot>
                    </table>
                
                
                </div>
                
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                </div>
                
                <button type="button" class="btn btn-info">
                Grand Weights Total: <span class="badge badge-light"><?php echo e($indicatorgroups->sum('total_indicators')); ?></span>
                </button>
              
            </div>
        </div>
    </div>
</div><?php /**PATH /home/ngobiro/lampstack-8.1.1-0/frameworks/laravel/resources/views/admin/pmmu/simple_pmmu.blade.php ENDPATH**/ ?>