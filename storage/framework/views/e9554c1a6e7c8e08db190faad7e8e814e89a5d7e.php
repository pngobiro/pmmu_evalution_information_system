<div>
    <div class="form-group row">
        <label for="rank" class="col-md-4 col-form-label text-md-right">Unit Rank</label>
        <div class="col-md-4">
            <select wire:model="selectedRank" class="form-control"  name="rank_id">
                <option value="" selected>Choose Unit Rank</option>
                <option value="" selected>All Ranks</option>
                <?php $__currentLoopData = $ranks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($rank->id); ?>"><?php echo e($rank->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>


    <?php if(!is_null($selectedRank)): ?>
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




</div>

<?php /**PATH /home/ngobiro/lampstack-8.1.2-0/frameworks/laravel/resources/views/livewire/excel-reports-dropdown.blade.php ENDPATH**/ ?>