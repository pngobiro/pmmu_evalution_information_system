<?php $__env->startSection('content'); ?>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Unit Ranks</h1>
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
                        <form method="GET" action="<?php echo e(route('unit-ranks.index')); ?>">
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="search" name="search" class="form-control mb-2" id="inlineFormInput"
                                        placeholder="e.g High Court">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <a href="<?php echo e(route('unit-ranks.create')); ?>" class="btn btn-primary mb-2">Create</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#Id</th>

                            <th scope="col">Unit Rank</th>

                            <th scope="col">Templates</th>

                            <th scope="col">View</th>

                            <th scope="col">Master</th>

                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $ranks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($rank->id); ?></th>

                                <td><?php echo e($rank->name); ?></td>

                                <td><a href="<?php echo e(route('unit-ranks.fy.index',$rank->id)); ?>" class="btn btn-info">Template</a></td>
                        
                                <td><a href="<?php echo e(route('unit-ranks.units.index', $rank->id)); ?>" class="btn btn-success">Units</a></td>

                                <td><a href="<?php echo e(route('unit-ranks.master-indicator.index', $rank->id)); ?>" class="btn btn-secondary">Indicators</a></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ngobiro/lampstack-8.1.2-0/frameworks/laravel/resources/views/admin/ranks/index.blade.php ENDPATH**/ ?>