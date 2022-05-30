<?php $__env->startSection('content'); ?>

    <!-- create a jumbroton -->

    <div class="card">

        <div class="jumbotron">
            <h1 class="display-7"><?php echo e($unit_rank->name); ?> - FY <?php echo e($fy->name); ?> </h1>
            <p class="lead"><span class="badge badge-primary">Category</span><?php echo e($rank_category->name); ?> </p>
        </div>


   
  
                    <div class="card-header">
                        <?php echo e(__('Create New Group')); ?>

                        <a href="<?php echo e(route('unit-ranks.fy.rank_category.template-groups.index',[$unit_rank->id,$fy->id, $rank_category])); ?>" class="float-right">Back</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="<?php echo e(route('unit-ranks.fy.rank_category.template-groups.store',[$unit_rank->id,$fy->id,$rank_category])); ?>">
                            <?php echo csrf_field(); ?>

                        

                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right"><?php echo e(__('Group Name')); ?></label>

                                <div class="col-md-12">
                                    <input id="name" type="text"
                                        class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name"
                                        value="<?php echo e(old('name')); ?>" required autocomplete="username" autofocus>

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
                                    class="col-md-4 col-form-label text-md-right"><?php echo e(__('Group Description')); ?></label>

                                <div class="col-md-12">
                                    <input id="description" type="text" 
                                        class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="description" rows="3"
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


                            <div class="form-group row">
                                <label for="order"
                                    class="col-md-4 col-form-label text-md-right"><?php echo e(__('Order')); ?></label>

                                <div class="col-md-6">
                                    <input id="order" type="number" 
                                        class="form-control <?php $__errorArgs = ['order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="order"
                                        value="<?php echo e(old('order')); ?>" required autocomplete="order" autofocus>

                                    <?php $__errorArgs = ['order'];
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
                                        <?php echo e(__('Create New Group')); ?>

                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ngobiro/lampstack-8.1.1-0/frameworks/laravel/resources/views/admin/template_indicator_groups/create.blade.php ENDPATH**/ ?>