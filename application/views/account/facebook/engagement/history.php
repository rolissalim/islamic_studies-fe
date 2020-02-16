<?php
$current_year = date('Y');
$current_month = date('m');
$curent_date = date('Y-m-d');
?>
<div class="btn-toolbar m-t-min-42">
    <div class="drop-calendar btn-group btn-group-sm pull-right">
        <button class="current-year btn btn-default disable" id="info-year" data-year="<?php echo $current_year; ?>"><?php echo $current_year; ?></button>
        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-caret-down"></span>
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu pull-right" id="chart-dropdown-year">
            <?php for ($i = $current_year; $i >= ($current_year - 2); $i--) { ?>
                <li><a href="#" data-year="<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php } ?>
        </ul>
    </div>
    <div class="drop-calendar btn-group btn-group-sm pull-right">
        <button class="btn btn-default disable" id="info-month"><?php echo date('M', mktime(0, 0, 0, $current_month + 1, 0, $current_year)); ?></button>
        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu pull-right" id="chart-dropdown-month">
            <?php for ($bln = 1; $bln <= 12; $bln++) { ?>
                <li><a href="#" data-month="<?php echo date('m', mktime(0, 0, 0, $bln + 1, 0, $current_year)); ?>"><?php echo date('F', mktime(0, 0, 0, $bln + 1, 0, $current_year)); ?></a></li>
            <?php } ?>
        </ul>
    </div>
</div>
<span></span>
<div id="chart-engagement"></div>

<div class="container-info-engagement">
    <div id="engagement-detail"></div>
</div>
<div class="pull-left"><span class="btn btn-sm btn-default btn-timeday" id="btn-prev"><i class="fa fa-chevron-left"></i></span></div>
<div class="pull-right"><span class="btn btn-sm btn-default btn-timeday" id="btn-next"><i class="fa fa-chevron-right"></i></span></div>
<div class="container-timeline-page">
    <div class="row-timeline-page"></div>
</div>

<script>
    var current_month = <?php echo json_encode($current_month); ?>;
    var current_date = <?php echo json_encode($curent_date); ?>;
</script>

