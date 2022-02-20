<div>

    <h1>Laravel Livewire Dependant Dropdown - ItSolutionStuff.com</h1>

    <div class="form-group row">

        <label for="rank" class="col-md-4 col-form-label text-md-right">State</label>

        <div class="col-md-6">

            <select wire:model="selectedState" class="form-control">

                <option value="" selected>Choose state</option>

                @foreach($states as $state)

                    <option value="{{ $state->id }}">{{ $state->name }}</option>

                @endforeach

            </select>

        </div>

    </div>

  

    @if (!is_null($selectedRank))

        <div class="form-group row">

            <label for="unit" class="col-md-4 col-form-label text-md-right">City</label>

  

            <div class="col-md-6">

                <select class="form-control" name="unit_id">

                    <option value="" selected>Choose city</option>

                    @foreach($cities as $city)

                        <option value="{{ $city->id }}">{{ $city->name }}</option>

                    @endforeach

                </select>

            </div>

        </div>

    @endif

</div>