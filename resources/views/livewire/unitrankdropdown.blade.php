<div>
            <div class="form-group row">
                <label for="rank" class="col-md-4 col-form-label text-md-right">Unit Rank</label>
                <div class="col-md-4">
                    <select wire:model="selectedRank" class="form-control"  name="rank_id">
                        <option value="" selected>Choose Unit Rank</option>
                        @foreach($ranks as $rank)
                            <option value="{{ $rank->id }}">{{ $rank->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            @if (!is_null($selectedRank))
                <div class="form-group row">
                    <label for="unit" class="col-md-4 col-form-label text-md-right">Unit</label>
                    <div class="col-md-4">
                        <select wire:model="selectedUnit" class="form-control" name="unit_id">
                            <option value="" selected>Choose Implementing Unit</option>
                            @foreach($units as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endif

            @if (!is_null($selectedUnit))
                <div class="form-group row">
                    <label for="fy" class="col-md-4 col-form-label text-md-right">Financial Year</label>
                    <div class="col-md-4">
                        <select  wire:model="selectedFY" class="form-control" name="fy_id">
                            <option value="" selected>Choose Financial Year</option>
                            @foreach($fys as $fy)
                                <option value="{{ $fy->id }}">{{ $fy->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endif

        {{ $selectedRank }} 

        {{ $selectedUnit }} 

        {{ $selectedFY }} 
    
    
</div>

    

