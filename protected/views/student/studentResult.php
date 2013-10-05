
    <?php
    if (count($results) > 0) {
       ?>
<table class="items table table-striped table-bordered">
    <tr>
        <th>Unit</th>
        <th>Internal Marks</th>
        <th>External Marks</th>
        <th>Total Marks</th>
    </tr>
<?php
        foreach ($results as $result) {
            ?>

            <tr>
                <td>
                    <?php echo $result->unit->name; ?>
                    
                    <?php 
                            $currentStudentInternalMarks=$result->internal_marks;
                            $currentStudentExternalMarks=$result->external_marks;
                        
                    ?>
                </td>
                <td>
                    <?php echo $currentStudentInternalMarks; ?>
                </td>

                <td>
                    <?php echo $currentStudentExternalMarks; ?>
                </td>
                <td>
                    <?php echo $currentStudentInternalMarks + $currentStudentExternalMarks; ?>
                </td>
            </tr>

            <?php
            
        }
   
    ?>
          
</table>
<?php  }else{
    ?>
        <div class="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            No Record Found.
        </div>
<?php } ?>

