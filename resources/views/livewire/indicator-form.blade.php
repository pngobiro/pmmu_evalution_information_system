
    <div >
        <input  class="form-control input-sm" type="text" wire:model.lazy="indicator_achivement" value="{{ $indicator_achivement}}">
        
            <h6>Percentage Score:  <span class="label label-primary">{{  round($indicator_performance_score)}} </span></h6>

            <h6>Raw Score:  <span class="label label-secondary">{{  round($indicator_raw_score,3)}} </span></h6>

            <h6>Weighted Score:  <span class="label label-info">{{ round( $indicator_weighted_score,3) }} </span></h6>

            <h6>Grade:  <span class="label label-info">{{ $indicator_graded_score }} </span></h6>
        
    </div

   