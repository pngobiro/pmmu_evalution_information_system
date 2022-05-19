<?php $__env->startSection('content'); ?>


<div class="jumbotron">
    <h1 class="display-8"><?php echo e($unit->name); ?>  <?php if($unit->has_pmmu_division ): ?> <h2 class="display-8"><?php echo e($division->name); ?></h2> <?php endif; ?> - FY <?php echo e($fy->name); ?></h1>
    <p class="lead"><span class="badge badge-pill badge-primary">Group :</span>  <?php echo e($indicator_group->name); ?></p>
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
                    <form method="GET" action="<?php echo e(route('unit-ranks.units.divisions.fy.indicator-groups.indicators.index',[$unit_rank->id,$unit->id,$division->id,$fy->id,$indicator_group->id])); ?>">
                        <div class="form-row align-items-center">
                            <div class="col">
                                <input type="search" name="search" class="form-control mb-2" id="inlineFormInput"
                                    placeholder="Search by indicator name ...">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary mb-2"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                            </div>
                            <div>
                                <a href="<?php echo e(route('unit-ranks.units.divisions.fy.indicator-groups.index',[$unit_rank->id,$unit->id,$division->id,$fy->id,$indicator_group->id])); ?>" class="btn btn-secondary mb-2"><i class="fa fa-eye" aria-hidden="true"></i>View All Groups</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div>
                   
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-plus" aria-hidden="true"></i> Create New Indicator
                    </button>

                </div>
            </div>
        </div>
        <div class="card-body">

                <table   class="table table-striped">
                    <thead>
                        <tr>
                           
                            <th scope="col">Order</th>
                            <th scope="col">Indicator</th>
                            <th scope="col">Indicator Type</th>
                            <th scope="col">Indicator Unit of Measure</th>
                            <th scope="col">Indicator Weight</th>
                            <th scope="col">Indicator Target</th>
                            <th scope="col">Edit</th>
                         
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $indicators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indicator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($indicator->order); ?></td>
                                <td style="word-wrap: break-word;min-width:350px;max-width: 350px;"><?php echo e($indicator->name); ?></td>
                                <td ><?php echo e($indicator->type->name); ?></td>
                                <td><?php echo e($indicator->measure->name); ?></td>
                                <td><span class="badge badge-primary"><?php echo e($indicator->indicator_weight); ?></span> </td>
                                <td><span class="badge badge-danger"><?php echo e($indicator->indicator_target); ?></span></td>

                                <!-- edit indicator pop modal -->
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo e($indicator->id); ?>">
                                        <i class="fa fa-edit" aria-hidden="true"></i>  Edit
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <td class="right" colspan="4"><span class="badge badge-primary">Total Weights:</span> </td>
                            <td class="right"><span class="badge badge-pill badge-primary"><?php echo e($indicator_group->indicators->sum('indicator_weight')); ?></span> </span></td>
                        </tr>
                    </tfoot>
                </table>

          
            </div>
        
    </div>
</div>





<?php $__env->stopSection(); ?>

<!-- create new indicator pop modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Indicator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('unit-ranks.units.divisions.fy.indicator-groups.indicators.store',[$unit_rank->id,$unit->id,$division->id,$fy->id,$indicator_group->id])); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="name">Indicator Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Indicator Name">
                    </div>
                    <div class="form-group">
                        <label for="type">Indicator Type</label>
                        <select class="form-control" name="type_id" id="type">
                            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indicator_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($indicator_type->id); ?>"><?php echo e($indicator_type->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="measure">Indicator Unit of Measure</label>
                        <select class="form-control" name="measure_id" id="measure">
                            <?php $__currentLoopData = $measures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $measure): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($measure->id); ?>"><?php echo e($measure->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="indicator_weight">Indicator Weight</label>
                        <input type="number" class="form-control" name="indicator_weight" id="indicator_weight" placeholder="Indicator Weight">
                    </div>
                    <div class="form-group">
                        <label for="indicator_target">Indicator Target</label>
                        <input type="number" class="form-control" name="indicator_target" id="indicator_target" placeholder="Indicator Target">
                    </div>
                    <div class="form-group">
                        <label for="order">Indicator Order</label>
                        <input type="number" class="form-control" name="order" id="order" placeholder="Indicator Order">
                    </div>
              
                    <div class="form-group">
                        <label for="remarks">Indicator Remarks</label>
                        <textarea class="form-control" name="remarks" id="remarks" placeholder="Indicator Remarks"></textarea>
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

<!-- edit indicator pop modal -->
<?php $__currentLoopData = $indicators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indicator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="exampleModal<?php echo e($indicator->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Indicator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('unit-ranks.units.divisions.fy.indicator-groups.indicators.update',[$unit_rank->id,$unit->id,$division->id,$fy->id,$indicator_group->id,$indicator->id])); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-group">
                        <label for="name">Indicator Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Indicator Name" value="<?php echo e($indicator->name); ?>">
                    </div>
                    <div class="form-group">
                        <label for="type">Indicator Type</label>
                        <select class="form-control" name="type_id" id="type">
                            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indicator_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($indicator_type->id); ?>" <?php echo e($indicator->type_id == $indicator_type->id ? 'selected' : ''); ?>><?php echo e($indicator_type->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="measure">Indicator Unit of Measure</label>
                        <select class="form-control" name="measure" id="measure">
                            <?php $__currentLoopData = $measures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $measure): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($measure->id); ?>" <?php echo e($indicator->measure_id == $measure->id ? 'selected' : ''); ?>><?php echo e($measure->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="indicator_weight">Indicator Weight</label>
                        <input type="number" class="form-control" name="indicator_weight" id="indicator_weight" placeholder="Indicator Weight" value="<?php echo e($indicator->indicator_weight); ?>">
                    </div>
                    <div class="form-group">
                        <label for="indicator_target">Indicator Target</label>
                        <input type="number" class="form-control" name="indicator_target" id="indicator_target" placeholder="Indicator Target" value="<?php echo e($indicator->indicator_target); ?>">
                    </div>
                    <div class="form-group">
                        <label for="order">Indicator Order</label>
                        <input type="number" class="form-control" name="order" id="order" placeholder="Indicator Order" value="<?php echo e($indicator->order); ?>">
                    </div>

                    <div class="form-group">
                        <label for="remarks">Indicator Remarks</label>
                        <textarea class="form-control" name="remarks" id="remarks" placeholder="Indicator Remarks"><?php echo e($indicator->remarks); ?></textarea>
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

          
<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ngobiro/lampstack-8.1.2-0/frameworks/laravel/resources/views/admin/pmmu/index.blade.php ENDPATH**/ ?>