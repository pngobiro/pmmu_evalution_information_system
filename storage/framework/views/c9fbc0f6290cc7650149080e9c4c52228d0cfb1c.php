<?php $__env->startSection('content'); ?>
<!-- show session message -->
<?php if(Session::has('message')): ?>
<div class="alert alert-info">
    <?php echo e(Session::get('message')); ?>

</div>
<?php endif; ?>

<!-- show validation errors -->
<?php if($errors->any()): ?>
<div class="alert alert-danger">
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php endif; ?>


<section class="content-header">
  <h1>
    Users
    <small>Control Panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Users</li>
  </ol>
</section>

<!-- Main content with search and add new user-->

<section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Users</h3>
            <div class="box-tools">
              <div class="input-group input-group-sm" style="width: 600px;">
                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>

                <!--- Add new user button  align div to right--->

                <div class="pull-right">
                  <!-- add new user button , open modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">
                        <i class="fa fa-plus"></i> Add New User
                    </button>
                </div>
        

            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr>
                <th>ID</th>
                <th>PJ</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Designation </th>
                <th>Is Active</th>
                <th>Edit</th>
                <th>Delete</th>
       
              </tr>
              <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($user->id); ?></td>
                <td><?php echo e($user->pj_number); ?></td>
                <td><?php echo e($user->first_name); ?></td>
                <td><?php echo e($user->last_name); ?></td>
                <td><?php echo e($user->email); ?></td>
                <td><?php echo e($user->designation); ?></td>
                <td>
                    <?php echo e($user->is_active == 1 ? 'Active' : 'Not Active'); ?>

                <td>
                  <!-- edit user button , open modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editUserModal<?php echo e($user->id); ?>">
                        <i class="fa fa-edit"></i>
                    </button>
                </td>   
                <td>
                   
                    <?php if($user->is_active == 1): ?>
                    
                        <button onclick="deactivate_user(<?php echo $user->id ?>);" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Deactivate">
                            <i class="fa fa-user-times"></i>
                        </button>
                        
                    <?php else: ?>
                        <button onclick="activate_user(<?php echo $user->id ?>);" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Activate">
                            <i class="fa fa-user-times"></i>
                        </button>
                    <?php endif; ?>
                  


                </td>
        
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
          </div>
          <!-- /.box-body -->
          </div>
          <!-- /.box -->
          </div>
          <!-- /.col -->
          </div>
          <!-- /.row -->
          </section>
          <!-- /.content -->
  




<?php $__env->stopSection(); ?>
<!-- New User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('users.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Jane" required>
                        <!--- Validation -->
                        <?php if($errors->has('first_name')): ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('first_name')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Doe" required>
                        <!--- Validation -->
                        <?php if($errors->has('last_name')): ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('last_name')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="email" required>
                        <!--- Validation -->
                        <?php if($errors->has('email')): ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('email')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="designation">Designation </label>
                        <input type="text" class="form-control" id="designation" name="designation" placeholder="designation" required>
                        <!--- Validation -->
                        <?php if($errors->has('designation')): ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('designation')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number" required>
                        <!--- Validation -->
                        <?php if($errors->has('phone_number')): ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('phone_number')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
          
                    <div class="form-group">
                        <label for="pj_number">PJ Number</label>
                        <input type="text" class="form-control" id="pj_number" name="pj_number" placeholder="pj number" required>
                        <!--- Validation -->
                        <?php if($errors->has('pj_number')): ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('pj_number')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
        
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
<div class="modal fade" id="editUserModal<?php echo e($user->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('users.update', $user->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo e($user->first_name); ?>">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo e($user->last_name); ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo e($user->email); ?>">
                    </div>
                    <div class="form-group">
                        <label for="designation">Designation </label>
                        <input type="text" class="form-control" id="designation" name="designation" value="<?php echo e($user->designation); ?>">
                    </div>
                    <div class="form-group">
                        <label for="pj_number">PJ Number</label>
                        <input type="text" class="form-control" id="pj_number" name="pj_number" value="<?php echo e($user->pj_number); ?>">
                    </div>
           
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




<!--userPermissions modal-->
<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
    
<div class="modal fade" id="userPermissionsModal<?php echo e($user->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">User Permissions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('users.update', $user->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-group">
                        <label for="permissions">Permissions</label>
                        <select class="form-control" id="permissions" name="permissions">
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>








<script>


function deactivate_user(id) {
    var url = "<?php echo e(route('users.deactivate', ':id')); ?>";
        if (window.confirm('Are you sure you want to deactivate this User?')) {
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    id: id,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                success: function(data) {
                    console.log(data);
                    location.reload();
                }
            });
        }
    }
    function activate_user(id) {
    var url = "<?php echo e(route('users.activate', ':id')); ?>";

        if (window.confirm('Are you sure you want to activate this User?')) {
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    id: id,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                success: function(data) {
                    console.log(data);
                    location.reload();
                }
            });
        }
    }
</script>






<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ngobiro/lampstack-8.1.1-0/frameworks/laravel/resources/views/admin/users/index.blade.php ENDPATH**/ ?>