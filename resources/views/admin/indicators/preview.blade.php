@extends('layouts.frontend')

@section('content')


<!-- show session message div -->
@if (session()->has('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif

<!-- show message when  internet offline  using livewire-->
<livewire:offline/>



<div class="card bg-light" >
    <div class="card-body fs-4" >
            <div class="row">
                <div class="col-sm-3 font-weight-bold">Unit Type</div>
                <div class="col-sm-3 font-weight-bold">Implementating Unit</div>
                <div class="col-sm-3 font-weight-bold">Financial Year</div>
                <div class="col-sm-3 font-weight-bold"></div>
            </div>
            <div class="row">
                <div class="col-sm-3 m-0 font-weight-bold text-primary"><span class="badge badge-pill badge-primary">{{ $unit_rank->name }}</span> </div>
                <div class="col-sm-3 m-0 font-weight-bold text-primary"><span class="badge badge-pill badge-success">

                    <!-- if $unit hasPmmuDivision show selected division name  otherwise show unit name-->

                    @if ($unit->has_pmmu_division )

                        {{ $division->name }}

                    @else

                        {{ $unit->name }}
                    

                    @endif

                   

                </span> </div>
        
                <div class="col-sm-3 m-0 font-weight-bold text-primary"><span class="badge badge-pill badge-warning">{{ $fy->name  }}</span>  </div>
                <div class="col-sm-3 m-0 font-weight-bold text-primary"><span class="badge badge-pill badge-white"><i class="fas fa-eye"></i>  <a href="{{ route('update_targets', [$unit_rank->id,$unit->id,$division->id,$fy->id]) }}">Update Weights and Targets</a></span>  </div>
            </div>
    </div>

    <!-- show a div with array of indicators with null achivement-->



<div class="card">
    <div  class="card-body ">
        @forelse($indicatorgroups as $group)

        <div class="alert alert-info" role="alert">
            
         {{ $group->order }} - {{ $group->name }}
        </div>
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
                
                    </tr>
                </thead>     
                <tbody>
                    <!-- calculate each  group indicators weigted_score-->
                    

                    <!-- sort by indicator_order -->
                    @forelse ($group->indicators->sortBy('order') as $indicator)
                    
                    <tr>
                        <th scope="row">{{ $indicator->order }}</th>
                        <td style="word-wrap: break-word;min-width: 400px;max-width: 400px;">{{ $indicator->name }} 
                            <!-- link to remarks modal -->
                            <a href="#" data-toggle="modal" data-target="#remarksModal{{ $indicator->id }}">
                            <i class="fas fa-sticky-note"></i>
                        </td>
                        <td>{{ $indicator->type->name }}</td>
                        <td>{{ $indicator->measure->name }}</td>
                        <td><span class="badge badge-pill badge-info">{{ $indicator->indicator_weight }}</span> </td>
                        <td>{{ $indicator->indicator_target  }}</td>
                        <td> <livewire:indicator-form :indicator_id="$indicator->id" >  </td>
                    </tr>
                </tbody>
                @empty
                <tr>
                    <td colspan="7">No Indicators</td>
                </tr>
                @endforelse 
                
                <tfoot>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" colspan="1">
                       Group Sub Totals:
                    </th>
                    <th scope="col" colspan="6">
                    
                        Weights  <span class="badge badge-primary"> {{ $group->total_indicators }}</span> 
                        Composite Score: <span class="badge badge-danger">
                            <?php 
                                $weighted_score = 0;
                                foreach ($group->indicators as $indicator) {
                                    $weighted_score += $indicator->indicator_weighted_score;
                                }
                                echo round($weighted_score,3);
                            ?>
                        
                        </span> 


                    </th>


                </tr>
               

                </tfoot>
            </table>
        @empty
            <div class="alert alert-danger">
         
            <!-- show large sad emoji-->
            <span class="emoji-icon" > No Indicators 😢</span>
            <!-- show a form with submit  -->
            <form action="{{ route('download_template', [$unit_rank->id,$unit->id,$division->id,$fy->id]) }}" method="GET">
                @csrf
                <!-- show a select field with all units -->
                <div class="form-group">
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">Select Category</option>
                        @foreach ($rank_categories as  $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                           
                            @endforeach
                    </select>
                   

                </div>
               
                <div class="form-group">
                    <button class="btn btn-primary">Download Template</button>
                </div>
            </form>

            </div>
        
        @endforelse
    </div>
</div>


<div class="alert alert-success" role="alert">


<div class="row">

    <div class="col-sm-3">
        Total Weights: <span class="badge badge-primary">{{ $total_indicator_weights }}</span> 
    </div>


    <div class="col-sm-3">
        Composite Score: <span class="badge badge-success">{{ round($overall_composite_score,3) }}</span> 
    </div>

    <div class="col-sm-3">
        Performance Score: <span class="badge badge-danger">{{ $overallScoreGrade['score'] }}</span> 
    </div>

    <div class="col-sm-3">

        Performance Grade: <span class="badge badge-info">{{ $overallScoreGrade['grade'] }}</span> 

    </div>


</div>

</div>

@if ( $total_indicator_weights == 100 ) 

<div class="alert alert-info" role="alert">

    <div class="row">
    
        <div class="col-sm-3">
            <!-- show tool tip -->
            <span data-toggle="tooltip" data-placement="top" title=" Download Simple Excel">
                <i class="fas fa-info-circle"></i>
            <a href="{{ route('simple_pmmu', [$unit_rank->id,$unit->id,$division->id,$fy->id]) }}" class="btn btn-primary btn-sm"> <i class="fa fa-file-pdf-o"></i>Simple PDF</a>
        </div> 
    
        <div class="col-sm-3">
            <a href="{{ route('complex_pmmu', [$unit_rank->id,$unit->id,$division->id,$fy->id]) }}" class="btn btn-success btn-sm "><i class="fas fa-pdf"></i>  Complex PDF</a>
        </div>
    
        <div class="col-sm-3">
            <a href="{{ route('simple_pmmu', [$unit_rank->id,$unit->id,$division->id,$fy->id]) }}" class="btn btn-primary btn-sm"><i class="fas fa-excel"></i> Simple Excel</a>
        </div>
    
        <div class="col-sm-3">
            <a href="{{ route('complex_pmmu', [$unit_rank->id,$unit->id,$division->id,$fy->id]) }}" class="btn btn-success btn-sm "><i class="fas fa-excel"></i> Complex Excel</a>
        </div>
    
    
    </div>
    
</div>

        @else 

        <!-- show error message -->
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Weights Error!</h4>

            <p>
                <strong>
                   <!-- show error message -->
                     Total Weights: <span class="badge badge-primary">{{  $total_indicator_weights }}</span>
                </strong>
         
        </div>


  
        @endif




</div>


@endsection

<!-- indicator remarks modal . save remarks-->

<!-- remarks modal to create and update -->
@foreach ($indicatorgroups as $group)
@foreach ($group->indicators as $indicator)
<div class="modal fade" id="remarksModal{{ $indicator->id }}" tabindex="-1" role="dialog" aria-labelledby="remarksModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="remarksModalLabel">{{ $unit->name  }} - {{ $indicator->name }} Notes and Remarks</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('update-indicator-remarks', [$indicator->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="indicator_id" value="{{ $indicator->id }}">
                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <textarea class="form-control" name="remarks" id="remarks" rows="10" placeholder="Enter indicator notes and remarks here..." required>{{ $indicator->remarks }}</textarea>
                    </div>
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endforeach

<!--pass selected category_id as a hidden field javascript -->
<script>
    function selectCategory(category_id) {
        document.getElementById("category_id").value = category_id;
    }
</script>

















