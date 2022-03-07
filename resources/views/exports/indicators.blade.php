<table >



    <tr>
     <td></td>
       

     @foreach ($grouped as $item => $collection )

     @foreach ($collection  as $c )

             <td colspan="3">{{ $c['indicator_name'] }} </td>
      

        
           
    @endforeach
    @endforeach
    </tr>




     <tr>
         <td></td>
    @foreach ($grouped as $item => $collection )
    
    @foreach ($collection  as $c )

          
         <td> Indicator Target</td>
         <td> Indicator Achievement</td>
          <td> Performance  Score</td>
     
         @endforeach
         
         @endforeach
     </tr>



     @foreach ($grouped as $item => $collection )
     <tr>
    

    
         <td>{{ $item }}</td>
       
 
             @foreach ($collection  as $c )
 
             <td>{{ $c['indicator_target'] }} </td>
             <td>{{ $c['indicator_achievement'] }} </td>
             <td>{{ $c['performance_score'] }} </td>
           
             @endforeach
           
    
       </tr>

       @endforeach
 
 </table>