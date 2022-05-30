<table >



    <tr>
     <td></td>
       

     <?php $__currentLoopData = $grouped; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

     

     <?php $__currentLoopData = $collection['indicators']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


             <td colspan="3"><?php echo e($c['indicator_name']); ?> </td>
      

        
           
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php break; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tr>




     <tr>
         <td>Court Name</td>
    <?php $__currentLoopData = $grouped; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
    <?php $__currentLoopData = $collection['indicators']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

          
         <td> Indicator Target</td>
         <td> Indicator Achievement</td>
          <td> Performance  Score</td>

     
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <?php break; ?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      <td>Composite Score</td>
      <td> Overall Performance Score</td>
      <td> Overall Performance Grade</td>
 
     </tr>



     <?php $__currentLoopData = $grouped; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <tr>
    

    
         <td><?php echo e($item); ?></td>
       
 
             <?php $__currentLoopData = $collection['indicators']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 
             <td><?php echo e($c['indicator_target']); ?> </td>
             <td><?php echo e($c['indicator_achievement']); ?> </td>
             <td><?php echo e(round($c['performance_score'])); ?> </td>
         

           
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           
             <td><?php echo e($collection['composite_score']); ?> </td>
             <td><?php echo e($collection['overall_performance_score']); ?> </td>
             <td><?php echo e($collection['overall_performance_grade']); ?> </td>
       </tr>
       
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      
 
 </table><?php /**PATH /home/ngobiro/lampstack-8.1.1-0/frameworks/laravel/resources/views/exports/indicators.blade.php ENDPATH**/ ?>