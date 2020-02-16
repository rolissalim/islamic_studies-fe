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
<div class="row">
    <div class="col-md-15">
        <div class="btn-toolbar">
            <div class="btn-group btn-group-sm pull-right" id="cluster-type">
                <span class="btn btn-default cluster-item active" id="all">All</span>
                <span class="btn btn-default cluster-item" id="post">Posts</span>
                <span class="btn btn-default cluster-item" id="comment">Comments</span>
            </div>
            <div class="pull-left"><h4 id="info-issue">TOP ISSUES</h4></div>
        </div>
        <div id="cluster-posts"></div>
    </div>
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">Found <span id="info-data">0</span> related posts</h4>
            </div>
            <div class="panel-body" id="list-data"></div>
        </div>
    </div>
</div>
