<?php $__env->startSection('content'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Permission for <?php echo e($user->pj_number); ?> -<?php echo e($user->full_name); ?></h1>
</div>

<div class="card-body">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#Id</th>
           
                <th scope="col">Permission (Check Appropriate permission)</th>
   
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row"><?php echo e($role->id); ?></th>
                
                    <td>
                        <div class="form-check">
                            <form action="update-permissions" method="post">
                                <?php echo e(csrf_field()); ?>

                                <input class="form-check-input" type="checkbox" value="<?php echo e($role->id); ?>" name="roles[]" id="role_<?php echo e($role->id); ?>" <?php echo e($user->hasRole($role->name) ? 'checked' : ''); ?>>
                                <label class="form-check-label" for="role_<?php echo e($role->id); ?>">
                                    <?php echo e($role->name); ?>

                                </label>

                            
                                <input type="hidden" name="role_id" value="<?php echo e($role->id); ?>">
                                
                                

                            </form>
                         
                        </div>

        

                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ngobiro/lampstack-8.1.1-0/frameworks/laravel/resources/views/admin/users/permissions_form.blade.php ENDPATH**/ ?>