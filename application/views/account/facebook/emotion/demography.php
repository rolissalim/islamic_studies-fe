<div class="btn-toolbar m-t-min-42">
    <div class="btn-group btn-group-sm pull-right filter-period">
        <span class="btn btn-default period-item" title="Today" id="t">T</span>
        <span class="btn btn-default period-item" title="Week" id="w">W</span>
        <span class="btn btn-default period-item active" title="Month" id="m">M</span>
        <span class="btn btn-default period-item" title="Quarter" id="q">Q</span>
        <span class="btn btn-default period-item" title="Year" id="y">Y</span>
        <div class="btn-group btn-group-sm">
            <span class="btn btn-default period-item dropdown-toggle" data-toggle="dropdown" title="Advanced" id="adv" aria-expanded="true">
                ADV
            </span>
            <form class="dropdown-menu pull-right form-period-advanced">
                <div class="form-group text-center">
                    <label class="radio-inline">
                        <input type="radio" name="period-adv" value="all" class="period-adv-all" checked=""> All
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="period-adv" value="custom" class="period-adv-custom"> Custom
                    </label>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control period-adv-input start" name="period-date-start" placeholder="Start Date" required=""  disabled="" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control period-adv-input end" name="period-date-end" placeholder="End Date" required=""  disabled="" autocomplete="off">
                </div>
                <div class="form-group">
                    <button class="btn btn-default btn-block" type="submit">Apply</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">Gender</h4>
    </div>
    <div class="panel-body row">
        <div class="col-md-5">
            <img src="<?php echo base_url('assets/img/man.png'); ?>" class="img-responsive gender-info">
        </div>
        <div class="col-md-7 bar-chart" id="male-emotion-bar"></div>
        <div class="col-md-5">
            <img src="<?php echo base_url('assets/img/woman.png'); ?>" class="img-responsive gender-info">
        </div>
        <div class="col-md-7 bar-chart" id="female-emotion-bar"></div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">Age</h4>
    </div>
    <div class="panel-body row">
        <div class="col-md-6">
            <span class="label label-age label-18">Below 18</span>
            <div class='radar-chart' id="radar-18"></div>
        </div>
        <div class="col-md-6">
            <span class="label label-age label-18-25">18 - 25</span>
            <div class='radar-chart' id="radar-18-25"></div>
        </div>
        <div class="col-md-6">
            <span class="label label-age label-25-35">25 - 35</span>
            <div class='radar-chart' id="radar-25-35"></div>
        </div>
        <div class="col-md-6">
            <span class="label label-age label-35">Above 35</span>
            <div class='radar-chart' id="radar-35"></div>
        </div>
    </div>
</div>