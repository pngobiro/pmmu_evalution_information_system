<div>
    <div class="mb-8">
        <label class="inline-block w-32 font-bold">Country:</label>
        <select name="rank" wire:model="rank" class="border shadow p-2 bg-white">
            <option value=''>Choose a Rank</option>
            @foreach($rank as $r)
                <option value={{ $r->id }}>{{ $r->name }}</option>
            @endforeach
        </select>
    </div>
    @if(count($units) > 0)
        <div class="mb-8">
            <label class="inline-block w-32 font-bold">Unit:</label>
            <select name="unit" wire:model="unit" 
                class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                <option value=''>Choose a Unit</option>
                @foreach($units as $unit)
                    <option value={{ $unit->id }}>{{ $unit->name }}</option>
                @endforeach
            </select>
        </div>
    @endif
</div>