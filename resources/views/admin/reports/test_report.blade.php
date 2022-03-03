@extends('layouts.main')

@section('content')
<style> 
th.rotated-text {
    height: 140px;
    white-space: nowrap;
    padding: 0 !important;
}

th.rotated-text > div {
    transform:
        translate(5px, 0px)
        rotate(90deg);
    width: 30px;
}

th.rotated-text > div > span {
    padding: 5px 10px;
}


</style>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                 

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                       
                                        
                                         <th> Court Name</th>
                                         <th> Certified Urgent Applications - % of certified urgent applications concluded within 30 days from the date of certification</th>
                                         <th> Injunction applications -% of injunction applications heard and determined within 90 days of filing</th>
                                         <th> All Other Applications -% of other applications heard and determined within 180 days of filing</th>
                                         <th>Hearing and determination of Criminal cases -% of cases concluded within 360 days of filing </th>
                                         <th> Hearing and determination of Civil cases -% of cases concluded within 360 days of filing</th>
                                         <th> Percentage of judgments/rulings delivered on the date first scheduled for delivery</th>
                                         <th> Delivery of Judgments & Rulings -% of judgments & rulings delivered within 60 days of conclusion of the hearing</th>
                                         <th> Applications in criminal matters -% of applications concluded within 90 days of filing</th>
                                         <th> Reduced no. of days spent in remand custody from the “Date of plea” to the “Date of first hearing” (where bail has been denied or where the remandees are unable to meet the bail terms)</th>
                                         <th> Case clearance rate for Criminal Cases</th>
                                         <th> Case clearance rate for Civil Cases</th>
                                         <th> Case Clearance Rate for Traffic Cases</th>
                                         <th>Percentage reduction of backlog </th>
                                         <th>Merit Productivity </th>
                                         <th> Other productivity</th>
                                         <th>Advance communication of adjournments of trials & hearings and date of judgment of delivery of judgments/rulings </th>
                                         <th> Percentage of trial/hearings held when first cause listed</th>
                                         <th> Percentage of pre-trial events held when first listed – mentions and supervision for compliance by parties in filing pleadings/exhibits</th>
                                         <th>  	Submission of Court proceedings for appealed Matters within 60 days from date of receipt of no</th>
                                         <th> Adoption of Alternative Dispute Resolutions - % of Filed Cases referred for Alternative Dispute Resolution (ADR/CAM/AJS)</th>
                                         <th> Publish daily cause lists and posting on the notice board/online - seven days in advance</th>
                                         <th>Stakeholder Engagement </th>
                                         <th>  	Timely Submission of accurate monthly court returns</th>
                                         <th> Implement the Registry Manual procedures</th>
                                         <th>Maintain and update all registers </th>
                                         <th>Maintenance of asset and equipment register </th>
                                         <th>Disposal of idle assets (Where applicable) </th>
                                         <th> Compliance with the budget</th>
                                         <th> Revenue Management</th>
                                         
                                   
                                    </thead>
                    
                                    <tbody>
                                        @foreach ($grouped as $item=> $collection)
                                        <tr>
                                            <td>{{$item}} </td>

                                            <td>{{ $collection[0]['score']}} </td>
                                            <td>{{ $collection[1]['score']}} </td>
                                            <td>{{ $collection[3]['score']}} </td>
                                            <td>{{ $collection[4]['score']}} </td>
                                            <td>{{ $collection[5]['score']}} </td>
                                            <td>{{ $collection[6]['score']}} </td>
                                            <td>{{ $collection[7]['score']}} </td>
                                            <td>{{ $collection[8]['score']}} </td>
                                            <td>{{ $collection[9]['score']}} </td>
                                            <td>{{ $collection[10]['score']}} </td>
                                            <td>{{ $collection[11]['score']}} </td>
                                            <td>{{ $collection[12]['score']}} </td>      
                                            <td>{{ $collection[13]['score']}} </td>
                                            <td>{{ $collection[14]['score']}} </td>
                                            <td>{{ $collection[15]['score']}} </td>
                                            <td>{{ $collection[16]['score']}} </td>
                                            <td>{{ $collection[17]['score']}} </td>
                                            <td>{{ $collection[18]['score']}} </td>
                                            <td>{{ $collection[19]['score']}} </td>      
                                            <td>{{ $collection[20]['score']}} </td>
                                            <td>{{ $collection[21]['score']}} </td>
                                            <td>{{ $collection[22]['score']}} </td>
                                            <td>{{ $collection[23]['score']}} </td>
                                            <td>{{ $collection[24]['score']}} </td>      
                                            <td>{{ $collection[25]['score']}} </td>
                                            <td>{{ $collection[26]['score']}} </td>
                                            <td>{{ $collection[27]['score']}} </td>
                                            <td>{{ $collection[28]['score']}} </td>
                                            <td>{{ $collection[29]['score']}} </td>

                                         
                                       
                                    
                                        </tr>
                                      
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->



@endsection