
    <div >
        <input   class="form-control input-sm" type="text" wire:model.lazy="indicator_achivement" value="<?php echo e($indicator_achivement); ?>" required wire:offline.attr="disabled">
        
            Percentage Score:  <span class="label label-primary"><?php echo e(round($indicator_performance_score,1)); ?> </span> <br>

            Raw Score:  <span class="label label-secondary"><?php echo e(round($indicator_raw_score,3)); ?> </span>  <br>

            Weighted Score:  <span class="label label-info"><?php echo e(round( $indicator_weighted_score,3)); ?> </span> <br>

            Grade:  <span class="label label-info"><?php echo e($indicator_graded_score); ?> </span> <br>
        
    </div


<?php /**PATH /home/ngobiro/lampstack-8.1.2-0/frameworks/laravel/resources/views/livewire/indicator-form.blade.php ENDPATH**/ ?>