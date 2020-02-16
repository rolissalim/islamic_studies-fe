<?php
$current_year = date('Y');
$current_month = date('m');
?>
<div class="row">
    <div class="col-md-4 data-timeline-option">       
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="list-group" id="list-type-data">
                    <a href="#" class="list-group-item" data-type="emotion">
                        EMOTION
                        <input type="hidden" name="selected-type-data[]" value="emotion">
                    </a>
                    <a href="#" class="list-group-item" data-type="sentiment">
                        SENTIMENT
                        <input type="hidden" name="selected-type-data[]" value="sentiment">
                    </a>
                    <a href="#" class="list-group-item" data-type="gender">
                        GENDER
                        <input type="hidden" name="selected-type-data[]" value="gender">
                    </a>
                    <a href="#" class="list-group-item" data-type="age">
                        AGE
                        <input type="hidden" name="selected-type-data[]" value="age">
                    </a>
                    <a href="#" class="list-group-item" data-type="religion">
                        RELIGION
                        <input type="hidden" name="selected-type-data[]" value="religion">
                    </a>
                    <a href="#" class="list-group-item" data-type="account_status">
                        ACCOUNT
                        <input type="hidden" name="selected-type-data[]" value="account_status">
                    </a>
                </div>

            </div>
        </div>
        <hr>
        <div class="panel panel-default">
            <div class="panel-body">
                <form id="selected-type" method="post" action="">
                    <div class="selected selected-type-data-container"></div>
                    <div class="updown-arrow"><i class="fa fa-3x fa-exchange"></i></div>
                    <div class="selected selected-type-data-container"></div>
                    <button class="btn btn-default pull-left m-t-10">APPLY</button>
                    <span id="remove-selected-type-data" class="btn btn-default pull-right m-t-10">CLEAR</span>
                </form>                
            </div>                     
        </div>
    </div>
    <div id="data-timeline-chart" class="col-md-20 data-timeline-chart" data-scrollbar="true">

    </div>
</div>
<script>
    var current_year = <?php echo json_encode($current_year); ?>;
    var current_month = <?php echo json_encode($current_month); ?>;
</script>