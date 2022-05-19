<?php $__env->startSection('content'); ?>

    <!-- Page Heading -->
    
    <div class="card  ">
        <div class="jumbotron">
            <h1 class="display-8"><?php echo e($unit->name); ?></h1>
            
            
            <?php if($unit->has_pmmu_division ): ?>
                <h2 class="display-8"><?php echo e($division->name); ?></h2>
            <?php endif; ?>
                
            
            
            
            <p class="lead">FY <?php echo e($fy->name); ?></p>
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
                    <div class="col">
                            <div class="form-row align-items-center">

                                <div class="col">
                                    <a href="<?php echo e(route('pmmu', [$unit_rank->id,$unit->id , $division->id, $fy->id ])); ?>" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i> Preview PMMU </a>
                                </div>

                                <div class="col">
                                    <a href="<?php echo e(route('update_targets', [$unit_rank->id,$unit->id , $division->id, $fy->id])); ?>" class="btn btn-warning"> <i class="fa fa-refresh" aria-hidden="true"></i> Update Targets </a>
                                </div>

                                <div class="col">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        <i class="fa fa-plus" aria-hidden="true"> </i>  Create New Group
                                        </button>
                                </div>

                            </div>
                    </div>
                
                </div>
            </div>
            <div class="card-body">
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
                        <?php $__empty_1 = true; $__currentLoopData = $indicatorgroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <th> <b><?php echo e($group->order); ?> </b></th>
                                <th> <?php echo e($group->name); ?> </th> 
                                <th> <span class="badge badge-primary"><?php echo e($group->total_indicators); ?></span> </th> 

                                <!-- edit group pop modal -->
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo e($group->id); ?>">
                                        Edit
                                    </button>
                                </td>



                

                                <th> <a href="<?php echo e(route('unit-ranks.units.divisions.fy.indicator-groups.indicators.index', [$unit_rank->id ,$unit->id,$division->id,$fy->id,$group->id])); ?>", class="btn btn-success" >Indicators <span class="badge bg-secondary"><?php echo e($group->indicators->count()); ?></span> </th>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>    

                    <tfoot>
                        <tr>
                            <td class="right font-weight-bold" colspan="2"><span class="badge badge-primary">Total Indicator Weights:</span></td>
                            <td class="right font-weight-bold"><span class="badge badge-danger"><?php echo e($indicatorgroups->sum('total_indicators')); ?></span></td>
                        </tr>
                    </tfoot>
                    
                </table>

        </div>
    

  
<?php $__env->stopSection(); ?>


<!-- create New Group Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Indicator Group</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo e(route('unit-ranks.units.divisions.fy.indicator-groups.store',[$unit_rank->id,$unit->id,$division->id,$fy->id])); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="name">Indicator Group Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Indicator Group Name">
            </div>
            <div class="form-group">
                <label for="weight">Indicator Group Weight</label>
                <input type="number" class="form-control" name="weight" id="weight" placeholder="Enter Indicator Group Weight">
            </div>
            <div class="form-group">
                <label for="order">Indicator Group Order</label>
                <input type="number" class="form-control" name="order" id="order" placeholder="Enter Indicator Group Order">
            </div>
            <div class="form-group">
                <label for="description">Indicator Group Description</label>
                <textarea class="form-control" name="description" id="description" placeholder="Enter Indicator Group Description"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div>

<!-- edit  Group Modal -->
<?php $__currentLoopData = $indicatorgroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <div class="modal fade" id="exampleModal<?php echo e($group->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Indicator Group</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('unit-ranks.units.divisions.fy.indicator-groups.update',[$unit_rank->id,$unit->id,$division->id,$fy->id,$group->id])); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="form-group">
                            <label for="name">Indicator Group Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Indicator Group Name" value="<?php echo e($group->name); ?>">
                        </div>
               
                        <div class="form-group">
                            <label for="order">Indicator Group Order</label>
                            <input type="number" class="form-control" name="order" id="order" placeholder="Enter Indicator Group Order" value="<?php echo e($group->order); ?>">
                        </div>
                        <div class="form-group">
                            <label for="description">Indicator Group Description</label>
                            <textarea class="form-control" name="description" id="description" placeholder="Enter Indicator Group Description"><?php echo e($group->description); ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        





            





<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ngobiro/lampstack-8.1.2-0/frameworks/laravel/resources/views/admin/indicators/index.blade.php ENDPATH**/ ?>