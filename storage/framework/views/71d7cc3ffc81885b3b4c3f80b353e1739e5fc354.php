<div>
            <div class="form-group row">
                <label for="rank" class="col-md-4 col-form-label text-md-right">Unit Rank</label>
                <div class="col-md-4">
                    <select wire:model="selectedRank" class="form-control"  name="rank_id">
                        <option value="" selected>Choose Unit Rank</option>
                        <?php $__currentLoopData = $ranks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($rank->id); ?>"><?php echo e($rank->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>

            <!-- search dropdown -->
           

            <?php if(!is_null($selectedRank)): ?>
                <div class="form-group row">
                    <label for="unit" class="col-md-4 col-form-label text-md-right">Unit</label>
                    <div class="col-md-4">
                        <select wire:model="selectedUnit" class="form-control" name="unit_id">
                            <option value="" selected>Choose Implementing Unit</option>
                            
                            <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($unit->id); ?>"><?php echo e($unit->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           
                        </select>
                    </div>
                </div>
            <?php endif; ?>


    <?php if($hasPMMUDivision==true): ?>     


            <?php if(!is_null($selectedUnit)): ?>
            <div class="form-group row">
                <label for="division" class="col-md-4 col-form-label text-md-right">Unit Division</label>
                <div class="col-md-4">
                    <select  wire:model="selectedDivision" class="form-control" name="division_id">
                        <option value="" selected>Choose a Division</option>
                       
                        <?php $__currentLoopData = $divisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $division): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($division->id); ?>"><?php echo e($division->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        <?php endif; ?>


            <?php if(!is_null($selectedDivision)): ?>
                <div class="form-group row">
                    <label for="fy" class="col-md-4 col-form-label text-md-right">Financial Year</label>
                    <div class="col-md-4">
                        <select  wire:model="selectedFY" class="form-control" name="fy_id">
                            <option value="" selected>Choose Financial Year</option>
                            <?php $__currentLoopData = $fys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($fy->id); ?>"><?php echo e($fy->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            <?php endif; ?>



            <?php if(!is_null($selectedFY)): ?>
            <div class="form-group row">
                <label for="activity" class="col-md-4 col-form-label text-md-right">Choose Activity</label>
                <div class="col-md-4">
                    <select  wire:model="selectedActivity" class="form-control" name="activity">
                        <option value="" selected>Choose Activity</option>
                            <option value="view-pmmu">View PMMU</option>
                            <option value="update-targets">Update Targets</option>
                            <option value="download-scoresheet">Download Scoresheet</option>
                            
                        
                    </select>
                </div>
            </div>
        <?php endif; ?>

     <?php elseif($hasPMMUDivision == false): ?>

                    <?php if(!is_null($selectedUnit)): ?>
                    <div class="form-group row">
                        <label for="fy" class="col-md-4 col-form-label text-md-right">Financial Year</label>
                        <div class="col-md-4">
                            <select  wire:model="selectedFY" class="form-control" name="fy_id">
                                <option value="" selected>Choose Financial Year</option>
                                <?php $__currentLoopData = $fys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($fy->id); ?>"><?php echo e($fy->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                <?php endif; ?>



                <?php if(!is_null($selectedFY)): ?>
                <div class="form-group row">
                    <label for="fy" class="col-md-4 col-form-label text-md-right">Choose Activity</label>
                    <div class="col-md-4">
                        <select  wire:model="selectedActivity" class="form-control" name="activity">
                            <option value="" selected>Choose Activity</option>
                                <option value="view-pmmu">View PMMU</option>
                                <option value="update-targets">Update Targets</option>
                                <option value="download-scoresheet">Download Scoresheet</option>
                                
                            
                        </select>
                    </div>
                </div>
                <?php endif; ?>






     
     


    <?php endif; ?>
    
    
</div>


<!-- script  -->
<script>
  

</script>

    

<?php /**PATH /home/ngobiro/lampstack-8.1.1-0/frameworks/laravel/resources/views/livewire/unitrankdropdown.blade.php ENDPATH**/ ?>