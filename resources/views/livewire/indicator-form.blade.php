
    <div >
        <input   class="form-control input-sm" type="text" wire:model.lazy="indicator_achivement" value="{{ $indicator_achivement}}"  >
        
            Percentage Score:  <span class="label label-primary">{{  round($indicator_performance_score,1)}} </span> <br>

            Raw Score:  <span class="label label-secondary">{{  round($indicator_raw_score,3)}} </span>  <br>

            Weighted Score:  <span class="label label-info">{{ round( $indicator_weighted_score,3) }} </span> <br>

            Grade:  <span class="label label-info">{{ $indicator_graded_score }} </span> <br>
        
    </div


