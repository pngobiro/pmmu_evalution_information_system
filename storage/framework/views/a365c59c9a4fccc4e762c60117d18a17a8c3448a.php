<?php $__env->startSection('content'); ?>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <table class="table table-striped">
                    <thead >
                        <tr>
                            <th scope="col">Unit Type</th>
                            <th> Unit</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                    <th> <?php echo e($unit_rank->name); ?></th>
                    <th> <?php echo e($unit->name); ?> </th>
                   
                </tr>    
            </tbody>
            </table>
  

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
                        <form method="GET" action="<?php echo e(route('fy.index')); ?>">
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="search" name="search" class="form-control mb-2" id="inlineFormInput"
                                        placeholder="e.g 2018/2019">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <a href="<?php echo e(route('fy.create')); ?>" class="btn btn-primary mb-2">Create</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#Id</th>
                            <th scope="col">Period</th>
                            <th scope="col">View</th>
                            <th scope="col">View</th>
              
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $fys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($fy->id); ?></th>
                                <td><?php echo e($fy->name); ?></td>
                                <td><a href="<?php echo e(route('unit-ranks.units.fy.indicator-groups.index', [$unit_rank->id,$unit->id,$fy->id])); ?>" class="btn btn-success">Indicator Groups</a></td>
                                <td><a href="<?php echo e(route('pmmu', [$unit_rank->id,$unit->id,$fy->id])); ?>" class="btn btn-success">PMMU</a></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ngobiro/lampstack-8.1.2-0/frameworks/laravel/resources/views/admin/fy/index.blade.php ENDPATH**/ ?>