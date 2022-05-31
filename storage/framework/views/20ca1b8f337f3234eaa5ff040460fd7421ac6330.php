<?php $__env->startSection('content'); ?>

<!-- show status message -->
<?php if(Session::has('status')): ?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <?php echo e(Session::get('status')); ?>

</div>
<?php endif; ?>

<!-- password change form , with reveal password -->
<form method="POST" action="<?php echo e(route('users.change.password', $user->id)); ?>">
  <?php echo e(csrf_field()); ?>

 
  <div class="form-group">
    <label for="password">New Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="New Password">
    <!--- password error message --->
    <?php if($errors->has('password')): ?>
    <span class="help-block">
      <strong><?php echo e($errors->first('password')); ?></strong>
    </span>
    <?php endif; ?>

  </div>
  <div class="form-group">
    <label for="password_confirmation">Confirm Password</label>
    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
    <!--- password_confirmation error message --->
    <?php if($errors->has('password_confirmation')): ?>
    <span class="help-block">
      <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
    </span>
    <?php endif; ?>
    
  </div>
  <button type="submit" class="btn btn-primary">Change Password</button>
</form>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ngobiro/lampstack-8.1.1-0/frameworks/laravel/resources/views/admin/users/change_password_form.blade.php ENDPATH**/ ?>