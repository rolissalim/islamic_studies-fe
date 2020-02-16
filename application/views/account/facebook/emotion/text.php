<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading text-primary">
                <div class="btn-group filter-period">
                    <span class="btn btn-default period-item" title="Today" id="t">T</span>
                    <span class="btn btn-default period-item" title="Week" id="w">W</span>
                    <span class="btn btn-default period-item active" title="Month" id="m">M</span>
                    <span class="btn btn-default period-item" title="Quarter" id="q">Q</span>
                    <span class="btn btn-default period-item" title="Year" id="y">Y</span>
                    <div class="btn-group btn-group-sm">
                        <span class="btn btn-default period-item dropdown-toggle" data-toggle="dropdown" title="Advanced" id="adv">
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
                <div class="clearfix"></div>
            </div>
            <div class="panel-body" id="perception-emotion"></div>
        </div>
    </div>
    <div class="col-md-18">
        <div class="panel panel-default">
            <div class="panel-body" id="emotion-posts"></div>
        </div>
    </div>
</div>