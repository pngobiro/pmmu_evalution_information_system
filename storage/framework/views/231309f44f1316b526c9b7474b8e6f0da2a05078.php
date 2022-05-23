<?php $__env->startSection('content'); ?>


    <div class="jumbotron">
        <h1 class="display-6"><?php echo e($unit_rank->name); ?> - FY <?php echo e($fy->name); ?></h1>
        <p class="lead"> <span class="badge badge-primary">Group</span>  <b> <?php echo e($template_group->name); ?></p>
        <hr class="my-8">
        <p><span class="badge badge-warning">Group Description:</span>   <?php echo e($template_group->description); ?></p>
      </div>

    

    <div class="card">
        <div class="card-body">
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
                        <form method="GET" action="<?php echo e(route('unit-ranks.fy.template-groups.template-indicators.index',[$unit_rank->id,$fy->id,$template_group->id])); ?>">
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="search" name="search" class="form-control mb-2" id="inlineFormInput"
                                        placeholder="Search Indicator">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary mb-2"><i class="fa fa-search" aria-hidden="true"></i>
                                        Search Indicator</button>
                                </div>
                                <div class="col ">
                                    <a href="<?php echo e(route('unit-ranks.fy.rank_category.template-groups.index', [$unit_rank->id,$fy->id,$template_group->rank_category])); ?>" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i>
                                        View All Groups</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <!--  a link to open modal -->

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">

                            <i class="fa fa-plus" aria-hidden="true"></i> Add Indicator</button>

                     
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                           
                            <th scope="col">Order</th>
                            <th scope="col">Indicator</th>
                            <th scope="col">Indicator Type</th>
                            <th scope="col">Indicator Unit of Measure</th>
                            <th scope="col">Indicator Weight</th>
                            <th scope="col">Is Backlog</th>
                            <th scope="col">Edit</th>
                            <th scope="col"> Delete </th>
                         
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $template_indicators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indicator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                
                                <td><?php echo e($indicator->order); ?></td>
                                <td><?php echo e($indicator->name); ?></td>
                                <td><?php echo e($indicator->type->name); ?></td>
                                <td><?php echo e($indicator->measure->name); ?></td>
                                <td><span class="badge badge-pill badge-info"><?php echo e($indicator->indicator_weight); ?></span></td>
                                <td>
                                    <?php if($indicator->is_backlog_indicator==1): ?>
                                        <span class="badge badge-success">Yes</span>
                                    <?php elseif($indicator->is_backlog_indicator==0): ?>
                                        <span class="badge badge-danger">No</span>
                                    <?php endif; ?>

                                </td>
                                <td>
                                    <!-- edit modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal<?php echo e($indicator->id); ?>">
                                        <i class="fa fa-edit" aria-hidden="true"></i> Edit</button>


                            
                                </td>
                            
                                <td>
                                    <!-- delete indicator  button -->
                                    <!-- show delete prompt to confirm delete -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo e($indicator->id); ?>">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Delete</button>

                                </td>
                             

            



                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <td class="right font-weight-bold" colspan="4"><span class="badge badge-success">Group Total Weights</span> </td>
                            <td class="right font-weight-bold"><span class="badge badge-pill badge-danger"><?php echo e($template_group->template_indicators->sum('indicator_weight')); ?></span> </td>
                            
                        </tr>
                    </tfoot>

                </table>
            </div>
     

        </div>
    </div>

       

</div>
</div>

<?php $__env->stopSection(); ?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Template Indicator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('unit-ranks.fy.template-groups.template-indicators.store',[$unit_rank->id,$fy->id,$template_group->id])); ?>">
                    <?php echo csrf_field(); ?>

                 <div class="form-group">
                    <label for="exampleInputEmail1">Master Indicator Type</label>
                    <select class="form-control" name="master_indicator_id" id="master_indicator_id" aria-describedby="emailHelp"
                        placeholder="Select Master Indicator" required>
                        <option value="">Select Master Indicator</option>
                        <?php $__currentLoopData = $master_indicators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $master_indicator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($master_indicator->id); ?>"><?php echo e(substr($master_indicator->name, 0, 50)); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Indicator Name</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp"
                            placeholder="Enter Indicator Name" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Indicator Type</label>
                        <select class="form-control" name="indicator_type_id" id="indicator_type_id" aria-describedby="emailHelp"
                            placeholder="Enter Indicator Type" required>
                            <?php $__currentLoopData = $indicator_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($type->id); ?>"><?php echo e($type->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Indicator Unit of Measure</label>
                        <select class="form-control" name="indicator_unit_of_measure_id" id="indicator_unit_of_measure_id" aria-describedby="emailHelp"
                            placeholder="Enter Indicator Unit of Measure" required>
                            <?php $__currentLoopData = $measures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $measure): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($measure->id); ?>"><?php echo e($measure->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Indicator Weight</label>
                        <input type="number" class="form-control" name="indicator_weight" id="indicator_weight" aria-describedby="emailHelp"
                            placeholder="Enter Indicator Weight" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Indicator Order</label>
                        <input type="number" class="form-control" name="order" id="order" aria-describedby="emailHelp"
                            placeholder="Enter Indicator Order" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Is Backlog Indicator</label>
                        <select class="form-control" name="is_backlog_indicator" id="is_backlog_indicator" aria-describedby="emailHelp"
                            placeholder="Enter Indicator Order" required>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<?php $__currentLoopData = $template_indicators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indicator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


<div class="modal fade" id="editModal<?php echo e($indicator->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Template Indicator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('unit-ranks.fy.template-groups.template-indicators.update',[$unit_rank->id,$fy->id,$template_group->id,$indicator->id])); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                 <div class="form-group">
                    <label for="exampleInputEmail1">Master Indicator Type</label>
                    <select class="form-control" name="master_indicator_id" id="master_indicator_id" aria-describedby="emailHelp"
                        placeholder="Select Master Indicator" required>
                        <option value="">Select Master Indicator</option>
                        <?php $__currentLoopData = $master_indicators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $master_indicator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($master_indicator->id); ?>" <?php if($indicator->master_indicator_id == $master_indicator->id): ?> selected <?php endif; ?>><?php echo e(substr($master_indicator->name, 0, 50)); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Indicator Name</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp"
                            placeholder="Enter Indicator Name" required value="<?php echo e($indicator->name); ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Indicator Type</label>
                        <select class="form-control" name="indicator_type_id" id="indicator_type_id" aria-describedby="emailHelp"
                            placeholder="Enter Indicator Type" required>
                            <?php $__currentLoopData = $indicator_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($type->id); ?>" <?php if($indicator->indicator_type_id == $type->id): ?> selected <?php endif; ?>><?php echo e($type->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Indicator Unit of Measure</label>
                        <select class="form-control" name="indicator_unit_of_measure_id" id="indicator_unit_of_measure_id" aria-describedby="emailHelp"
                            placeholder="Enter Indicator Unit of Measure" required>
                            <?php $__currentLoopData = $measures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $measure): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($measure->id); ?>" <?php if($indicator->indicator_unit_of_measure_id == $measure->id): ?> selected <?php endif; ?>><?php echo e($measure->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Indicator Weight</label>
                        <input type="number" class="form-control" name="indicator_weight" id="indicator_weight" aria-describedby="emailHelp"
                            placeholder="Enter Indicator Weight" required value="<?php echo e($indicator->indicator_weight); ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Indicator Order</label>
                        <input type="number" class="form-control" name="order" id="order" aria-describedby="emailHelp"
                            placeholder="Enter Indicator Order" required value="<?php echo e($indicator->order); ?>">
                    </div>

                    <!-- IS BACKLOG INDICATOR-->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Is Backlog Indicator</label>
                        <select class="form-control" name="is_backlog_indicator" id="is_backlog_indicator" aria-describedby="emailHelp"
                            placeholder="Is Backlog" required>
                            <option value="0" <?php if($indicator->is_backlog_indicator == 0): ?> selected <?php endif; ?>>No</option>
                            <option value="1" <?php if($indicator->is_backlog_indicator == 1): ?> selected <?php endif; ?>>Yes</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<!-- Delete Modal -->
<?php $__currentLoopData = $template_indicators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indicator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="deleteModal<?php echo e($indicator->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Template Indicator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('unit-ranks.fy.template-groups.template-indicators.destroy',[$unit_rank->id,$fy->id,$template_group->id,$indicator->id])); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <p>Are you sure you want to delete this template indicator?</p>
                    <button type="submit" class="btn btn-primary">Yes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>











<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ngobiro/lampstack-8.1.2-0/frameworks/laravel/resources/views/admin/template-indicators/index.blade.php ENDPATH**/ ?>