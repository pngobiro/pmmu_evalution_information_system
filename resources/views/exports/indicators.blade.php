<table >



    <tr>
     <td></td>
       

     @foreach ($grouped as $item => $collection )

     @foreach ($collection  as $c )

             <td colspan="3">{{ $c['indicator_name'] }} </td>
      

        
           
    @endforeach

    @break
    @endforeach
    </tr>




     <tr>
         <td>Court Name</td>
    @foreach ($grouped as $item => $collection )
    
    @foreach ($collection  as $c )

          
         <td> Indicator Target</td>
         <td> Indicator Achievement</td>
          <td> Performance  Score</td>

     
         @endforeach
         @break
         @endforeach

      <td>Composite Score</td>
      <td> Overall Performance Score</td>
      <td> Overall Performance Grade</td>
 
     </tr>



     @foreach ($grouped as $item => $collection )
     <tr>
    

    
         <td>{{ $item }}</td>
       
 
             @foreach ($collection  as $c )
 
             <td>{{ $c['indicator_target'] }} </td>
             <td>{{ $c['indicator_achievement'] }} </td>
             <td>{{ round($c['performance_score']) }} </td>
         

           
             @endforeach
           
             <td>{{ $c['composite_score'] }} </td>
             <td>{{ $c['overall_performance_score'] }} </td>
             <td>{{ $c['overall_performance_grade'] }} </td>>
       </tr>
       
       @endforeach
      
 
 </table>