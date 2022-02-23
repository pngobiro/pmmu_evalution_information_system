<div wire:poll.10s="update">
    <div class="card ">
        <div  class="card-body ">
                @forelse($indicatorgroups as $group)
    
                 
                            <p class="fs-2 text-uppercase fw-bold font-monospace"> {{ $group->id }}- {{ $group->name }} </p>
                            <div>
                                        <table class="table table-bordered table table-sm text-dark">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Indicator </th>
                                                        <th scope="col">Indicator Type</th>
                                                        <th scope="col">Unit of Meaure</th>
                                                        <th scope="col">Weight</th>
                                                        <th scope="col">Target </th>
                                                        <th scope="col">Achivement (%)</th>
                                                        <th scope="col">Score</th>
                                                    </tr>
                                                </thead>     
                                            <tbody>
                                            @forelse ($group->indicators as $indicator)
                                                <tr>
                                                    <th scope="row">{{ $indicator->order }}</th>
                                                        <td style="word-wrap: break-word;min-width: 400px;max-width: 400px;">{{ $indicator->name }}</td>
                                                        <td>{{ $indicator->type->name }}</td>
                                                        <td>{{ $indicator->measure->name }}</td>
                                                        <td>{{ $indicator->indicator_weight }}</td>
                                                        <td>{{ $indicator->indicator_target  }}</td>
                                                        <td> <input type="text"  class="form-control" wire:model.lazy="message" value="{{ $indicator->indicator_achivement }}"></td>
                                                        <td> {{ $result}}</td>
                                                </tr>
                                              
                                              
                                            </tbody>
                                            @empty
    
                                            @endforelse 
    
    
                                            <tfoot>
                                                <tr>
                                                    <td class="right" colspan="4">Group Total Weights:</td>
                                                    <td class="right">{{$group->indicators->sum('indicator_weight')}}</span></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                               
                            </div>
    
                                            
            @endforeach    
        </div>
    </div>



<button wire:click="doSomething">Do Something</button>


</div>
