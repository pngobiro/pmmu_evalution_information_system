<?php $__env->startSection('content'); ?>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> <?php echo e($unit_rank->name); ?> Implementing Units</h1>
    </div>
    <div class="row">
        <div class="card ">
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
                        <form method="GET" action="<?php echo e(route('unit-ranks.units.index',$unit_rank->id)); ?>">
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="search" name="search" class="form-control mb-2" id="inlineFormInput"
                                        placeholder="e.g Kakamega">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <a href="<?php echo e(route('unit-ranks.units.create',[$unit_rank->id])); ?>" class="btn btn-primary mb-2">Create</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#Id</th>
                            <th scope="col">Unit Rank</th>
                            <th scope="col">Has PMMU Division</th>
                            <th scope="col">Edit</th>
                            <th scope="col">View</th>
              
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($unit->id); ?></th>

                                <td><?php echo e($unit->name); ?></td>
                            
                                <!-- update unit->has_pmmu_division  with a check box-->
                                <td>
                                    <form method="POST" action="<?php echo e(route('update-has-pmmu-division',[$unit->id])); ?>">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('POST'); ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="has_pmmu_division"
                                                id="has_pmmu_division" value="1" <?php echo e($unit->has_pmmu_division ? 'checked' : ''); ?>>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                    
                                 
                                 <td><a href="<?php echo e(route('unit.edit', $unit->id)); ?>" class="btn btn-success">Edit</a></td>

                             

                           
                        
                                <td><a href="<?php echo e(route('unit-ranks.units.fy.index', [$unit_rank->id ,$unit->id])); ?>" class="btn btn-success">FY</a></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function () {
            $('#has_pmmu_division').change(function () {
                var has_pmmu_division = $(this).is(':checked');
                var unit_id = $(this).data('unit-id');

                $.ajax({
                    url: "<?php echo e(route('update-has-pmmu-division', [$unit_rank->id, 'unit_id'])); ?>".replace('unit_id', unit_id),
                    method: 'POST',
                    data: {
                        has_pmmu_division: has_pmmu_division
                    },
                    success: function (data) {
                        console.log(data);
                    }
                });
            });
        });
    </script>
 
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ngobiro/lampstack-8.1.2-0/frameworks/laravel/resources/views/admin/units/index.blade.php ENDPATH**/ ?>