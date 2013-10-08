<div class="span4">
<div class="widget widget-nopad stacked">
    <div class="widget-header">
        <i class="icon-list-alt"></i>
        <h3><?php echo ucwords($data->unit->name); ?></h3>
    </div>
    <div class="widget-content">
        <ul class="news-items">
            <li>
                <!--break date-->
                <?php 
                    $date = explode('-', $data->date);
                    $day = $date[0];
                    $month = $date[1];
                ?>
                <div class="news-item-date">
                    <span class="news-item-day"><?php echo $day; ?></span>
                    <span class="news-item-month"><?php echo $month; ?></span>
                </div>
                <div class="news-item-detail">
                    <span class="news-item-title">Venue : <?php echo ucwords($data->venue->name); ?></span>
                    <p class="news-item-preview"><strong>Time : </strong>  <?php echo $data->from_time; ?> to <?php echo $data->to_time; ?></p>
                    <p class="news-item-preview">Trainer : <?php echo ucwords($data->trainer->fullname); ?></p>
                </div>
                
            </li>
        </ul>
    </div>
</div>
</div>