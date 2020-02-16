<div class="btn-toolbar m-t-min-42">
    <div class="btn-group btn-group-sm filter-period pull-right">
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
</div>
<div class="row">
    <div class="col-md-17">
        <div class="row">
            <div class="col-md-24">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading text-primary">
                                <h4 class="panel-title">Posts & Comments</h4>
                            </div>
                            <div class="panel-body" id="post-comment"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading text-primary">
                                <h4 class="panel-title">Followers Growth</h4>
                            </div>
                            <div class="panel-body" id="follower-growth"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-24">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading text-primary">
                                <h4 class="panel-title">Most Active Accounts</h4>
                            </div>
                            <div class="panel-body" id="active-accounts"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading text-primary">
                                <h4 class="panel-title">Top Accounts Commented</h4>
                            </div>
                            <div class="panel-body" id="most-comment-chart"></div>
                        </div>
                        <!--                        <div class="panel panel-default">
                                                    <div class="panel-heading text-primary">
                                                        <h4 class="panel-title">Posting Composition</h4>
                                                    </div>
                                                    <div class="panel-body" id="posting-composition-piebar"></div>
                                                </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="panel panel-default">
            <div class="panel-heading text-primary">
                <h4 class="panel-title">Top Issues</h4>
            </div>
            <div class="panel-body" id="hashtags-cloud">
            </div>
        </div>
    </div>
</div>