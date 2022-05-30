<?php $__env->startSection('content'); ?>

    <!-- Page Heading -->
    <!-- create a div to Dispaly Flash messages-->

    
    <div>
        <?php if(session()->has('message')): ?>
            <div class="alert alert-success">
                <?php echo e(session()->get('message')); ?>

            </div>
        <?php endif; ?>
    </div>
  
    <div class="d-flex justify-content-center .mb-15" >
        <div class="row ">
            <h1 class="h3 mb-0 text-gray-800"><?php echo e($unit_rank->name); ?> FY <?php echo e($fy->name); ?></h1>
        </div>
    </div>



    <div class="card-header">
        <div class="row">
            <div class="col">
                <form method="GET" action="<?php echo e(route('users.index')); ?>">
                    <div class="form-row align-items-center">
                        <div class="col">
                            <input type="search" name="search" class="form-control mb-2" id="inlineFormInput"
                                placeholder="Jane Doe">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary mb-2">Search</button>
                        </div>
                    </div>
                </form>
            </div>
          
            <div class="col">
                <a href="<?php echo e(route('unit-ranks.fy.rank_category.create',[$unit_rank->id,$fy->id ])); ?>" class="btn btn-primary mb-2">Create</a>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <!-- Page Heading -->
        
        <p class="mb-4"> </p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th scope="col">Category </th>
                            <th scope="col">Descripition </th>
                            <th scope="col">Indicators </th>
                            <th scope="col">Edit </th>
                            <th scope="col">Delete </th>
                        </tr>
                       
                        <?php $__currentLoopData = $rank_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rank_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      
                        <tr>
                            <td><?php echo e($rank_category->name); ?></td>
                            <td><?php echo e($rank_category->description); ?></td>
                            <td> <a href="<?php echo e(route('unit-ranks.fy.rank_category.template-groups.index',[$unit_rank->id,$fy->id,$rank_category->id])); ?>" class="btn btn-success">Indicators</a></td> 
                             

                            <td>
                                <!-- edit rank_category modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal<?php echo e($rank_category->id); ?>">
                                    Edit
                            </td>

                            <td>
                                <form action="<?php echo e(route('unit-ranks.fy.rank_category.destroy',[$unit_rank->id,$fy->id,$rank_category->id])); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

         

<?php $__env->stopSection(); ?>

<!-- edit rank_category modal -->
<?php $__currentLoopData = $rank_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rank_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <div class="modal fade" id="editModal<?php echo e($rank_category->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Rank Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('unit-ranks.fy.rank_category.update',[$unit_rank->id,$fy->id,$rank_category->id])); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="<?php echo e($rank_category->name); ?>">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" value="<?php echo e($rank_category->description); ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ngobiro/lampstack-8.1.1-0/frameworks/laravel/resources/views/admin/rank_categories/index.blade.php ENDPATH**/ ?>