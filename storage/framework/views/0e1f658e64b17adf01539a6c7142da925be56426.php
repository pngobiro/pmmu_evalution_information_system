<?php $__env->startSection('content'); ?>

    <!-- Page Heading -->

    
    <div class="d-flex justify-content-between">
        <div class="row ">
            <h1 class="h3 mb-0 text-gray-800"><?php echo e($rank_name); ?> <?php echo e($fy_name); ?> Template</h1>
        </div>
        <div class="row">
            <a href="<?php echo e(route('unit-ranks.fy.show', [$rank_id,$fy_id])); ?>" class="btn btn-success">Preview PMMU Template </a>
        </div>
    </div>
        
  

    <div class="row">
        <div class="card  mx-auto">
            <div>
                <?php if(session()->has('message')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('message')); ?>

                    </div>
                <?php endif; ?>
            </div>
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <form method="GET" action="<?php echo e(route('unit-ranks.fy.show',[$rank_id,$fy_id ])); ?>">
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="search" name="search" class="form-control mb-2" id="inlineFormInput"
                                        placeholder="Serach Indicator Group">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <a href="<?php echo e(route('unit-ranks.fy.template-groups.create',[$rank_id,$fy_id ])); ?>" class="btn btn-primary mb-2">Create New Group </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" >
                    <thead>
                        <tr>
                            <th scope="col">Id </th>
                            <th scope="col"> Indicator Group Name</th>
                            <th scope="col"> Description</th>
                            <th scope="col"> Edit</th>
                            <th scope="col"> Indicators</th>
                
                
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $indicatorgroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <th> <b><?php echo e($group->id); ?> </b></th>
                                <th> <b><?php echo e($group->name); ?> </b></th> 
                                <th> <b><?php echo e(substr($group->description,0,30)); ?> </b></th> 
                                <th> <a href="<?php echo e(route('unit-ranks.fy.template-groups.edit', [$rank_id,$fy_id , $group->id])); ?>", class="btn btn-success">Edit</a>  </th>
                                <th> <a href="<?php echo e(route('unit-ranks.fy.template-groups.template-indicators.index', [$rank_id,$fy_id,$group->id])); ?>", class="btn btn-success">Template Indicators</a>  </th>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>    
                    
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ngobiro/lampstack-8.1.1-0/frameworks/laravel/resources/views/admin/template/show.blade.php ENDPATH**/ ?>