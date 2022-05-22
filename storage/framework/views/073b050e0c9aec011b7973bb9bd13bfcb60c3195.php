<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-center .mb-15" >
    <div class="row ">
        <h1 class="h3 mb-0 text-gray-800"><?php echo e($unit_rank->name); ?> - <?php echo e($fy->name); ?></h1>
    </div>
   
</div>


<div class="card-body">
    <form method="POST" action="<?php echo e(route('unit-ranks.fy.rank_category.store',[$unit_rank->id,$fy->id])); ?>">
        <?php echo csrf_field(); ?>

        <div class="form-group row">
            <label for="name"
                class="col-md-4 col-form-label text-md-right"><?php echo e(__('Rank Category Name')); ?></label>

            <div class="col-md-6">
                <input id="name" type="text"
                    class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name"
                    value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus>

                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="description"
                class="col-md-4 col-form-label text-md-right"><?php echo e(__('Description')); ?></label>

            <div class="col-md-6">
                <input id="description" type="text"
                    class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="description"
                    value="<?php echo e(old('description')); ?>" required autocomplete="description" autofocus>

                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    <?php echo e(__('Create New Category')); ?>

                </button>
            </div>
        </div>
    </form>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ngobiro/lampstack-8.1.2-0/frameworks/laravel/resources/views/admin/rank_categories/create.blade.php ENDPATH**/ ?>