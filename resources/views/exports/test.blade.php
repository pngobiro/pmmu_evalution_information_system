<table >



    <tr>
     <td></td>
     <td></td>
     <td></td>
     <td></td>

     @foreach ($grouped as $item => $collection )

     

     @foreach ($collection['indicators']  as $c )


             <td colspan="3">{{ $c['indicator_name'] }} </td>
      

        
           
    @endforeach

    @break
    @endforeach
    
    </tr>




     <tr>
         <td>Court Name</td>
         <td>Overall Composite Score</td>
         <td> Overall Performance Score</td>
         <td> Overall Performance Grade</td>
    @foreach ($grouped as $item => $collection )
    
    @foreach ($collection['indicators']  as $c )

          
         <td> Indicator Target</td>
         <td> Indicator Achievement</td>
          <td> Performance  Score</td>

     
         @endforeach
         @break
         @endforeach


 
     </tr>



     @foreach ($grouped as $item => $collection )
     <tr>
    

    
         <td>{{ $item }}</td>
         <td>{{ round($collection['overall_composite_score'],2) }} </td>
         <td>{{ $collection['overall_performance_score'] }} </td>
         <td>{{ $collection['overall_performance_grade'] }} </td>
 
             @foreach ($collection['indicators'] as $c )
 
             <td>{{ $c['indicator_target'] }} </td>
             <td>{{ $c['indicator_achievement'] }} </td>
             <td>{{ round($c['performance_score']) }} </td>
         

           
             @endforeach
           
         
       </tr>
       
       @endforeach
      
 
 </table>