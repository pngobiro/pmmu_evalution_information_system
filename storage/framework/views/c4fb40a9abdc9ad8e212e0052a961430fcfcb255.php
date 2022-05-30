<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-body">



    <div class="jumbotron">
        <h1 class="display-15"><?php echo e($unit_rank->name); ?> - <?php echo e($rank_category->name); ?>   </h1>
        <p class="lead"> <span class="badge badge-primary">Financial Year</span> <?php echo e($fy->name); ?> </p>
  </div>



 
            <div>
                <?php if(session()->has('message')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('message')); ?>

                    </div>
                <?php endif; ?>
            </div>
            <div class="card-header">
                <div class="row">

                    <?php if(count($templateindicatorgroups) == 0): ?>
                    <div class="col">
                        <a href="<?php echo e(route('download_previous_fy_template', [$unit_rank->id,$fy->id,$rank_category->id])); ?>" class="btn btn-success"><i class="fa fa-clone" aria-hidden="true"></i>
                            Copy Template </a>
                            <!--- show infomation hover tip -->
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Copy Template from previuos financial year">
                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                            </a>
                    </div>
                    <?php endif; ?>

                    <div class="col" >
                        <!-- create modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                            <i class="fa fa-plus" aria-hidden="true"></i> Create Template Indicator Group
                       
                    </div>
                        
                   
       
                </div>
            </div>
                <table class="table table-bordered" >
                    <thead>
                        <tr>
                            <th scope="col"># </th>
                            <th scope="col"> Indicator Group Name</th>
                            <th scope="col"> Weight</th>
                            <th scope="col"> Edit</th>
                            <th scope="col"> Indicators</th>
                
                
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $templateindicatorgroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <th> <b><?php echo e($group->order); ?> </b></th>
                                <th> <?php echo e($group->name); ?> </th> 

                                          <th> <span class="badge badge-pill badge-info"><?php echo e($group->template_indicators->sum('indicator_weight')); ?></span> </th> 

                                <th> 

                                    <!-- edit group modal button -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal<?php echo e($group->id); ?>">
                                        <i class="fas fa-edit"></i> Edit Group
                                    </button>

 
                                
                                </th>



                                <th> <a href="<?php echo e(route('unit-ranks.fy.template-groups.template-indicators.index', [$unit_rank->id,$fy->id,$group->id])); ?>", class="btn btn-success" >Template Indicators <span class="badge bg-secondary"><?php echo e($group->template_indicators->count()); ?></span> </th>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>  
                    
                    <tfoot>
                        <tr>
                            <td class="right font-weight-bold" colspan="2"><span class="badge badge-pill badge-danger">Grand Total Weights:</span> </td>
                            <td class="right"><span class="badge badge-pill badge-danger"><?php echo e($templateindicatorgroups->sum('total_indicators')); ?></span></td>
                        </tr>
                    </tfoot>
                    
                </table>
            </div>
        


</div> 
  
<?php $__env->stopSection(); ?>

<!-- create a modal for creation , editing and deletion of the indicator groups -->
<?php $__env->startSection('modals'); ?>


<!-- create modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Template Indicator Group</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('unit-ranks.fy.rank_category.template-groups.store',[$unit_rank->id,$fy->id,$rank_category->id])); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="name">Group Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Group Name" required>
                    </div>
                    <div class="form-group">
                        <label for="order">Order</label>
                        <input type="number" class="form-control" id="order" name="order" placeholder="Order" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Description" required></textarea>
                    </div>
                
                  
                    <div class="form-group">

                        <button type="submit" class="btn btn-primary">Create</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Template Indicator Group - <?php echo e($unit_rank->name); ?> - <?php echo e($rank_category->name); ?>- <?php echo e($fy->name); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('unit-ranks.fy.rank_category.template-groups.store',[$unit_rank->id,$fy->id,$rank_category->id])); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="name">Group Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Group Name" required>
                    </div>
                    <div class="form-group">
                        <label for="order">Order</label>
                        <input type="number" class="form-control" id="order" name="order" placeholder="Order" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Description" required></textarea>
                    </div>
                
                  
                    <div class="form-group">

                        <button type="submit" class="btn btn-primary">Create</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- edit group modal -->
<?php $__currentLoopData = $templateindicatorgroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <div class="modal fade" id="editModal<?php echo e($group->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Template Indicator Group - <?php echo e($unit_rank->name); ?> - <?php echo e($rank_category->name); ?> - <?php echo e($fy->name); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?php echo e(route('unit-ranks.fy.rank_category.template-groups.update',[$unit_rank->id,$fy->id,$rank_category->id,$group->id])); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="form-group">
                            <label for="name">Group Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Group Name" value="<?php echo e($group->name); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="order">Order</label>
                            <input type="number" class="form-control" id="order" name="order" placeholder="Order" value="<?php echo e($group->order); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Description" required><?php echo e($group->description); ?></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ngobiro/lampstack-8.1.1-0/frameworks/laravel/resources/views/admin/template_indicator_groups/index.blade.php ENDPATH**/ ?>