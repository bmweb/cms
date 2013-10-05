<?php 
                    if (!empty($attendances)) {
                        $i=1; ?>
                        <table class="items table table-striped table-bordered">   
                        <?php foreach ($attendances as $attendance) {
                            ?>
                                <?php if($i==1){ ?>
                                <tr>
                                    <td colspan="5" style="background: white;"><span class="colorCyan"><?php echo $attendance->classTimeTable->unit->name; ?></span></td>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <th>Venue</th>
                                    <th>Attendance</th>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td><?php echo $attendance->date; ?></td>
                                    <td><?php echo $attendance->classTimeTable->venue->name; ?></td>
                                    <td><?php echo $attendance->attendance_detail; ?></td>
                                </tr> 
                                    
                            
                            <?php $i++;
                        } ?>
                                </table>
               <?php     }
                    else{
                    ?>
                    <div class="alert">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      No Record Found.
                    </div>  
                    <?php  }  ?>