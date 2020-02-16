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
    <div class="col-md-4 data-explore-option">       
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
    <div class="col-md-20 data-explore-chart" data-scrollbar="true">
        <div id="chart-type-data-0" class="col-md-8"></div>
        <div id="chart-type-data-1" class="col-md-8"></div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
<!--                    <div id="export-xls" class="btn btn-default">EXPORT XLS</div>-->
                </div>
            </div>
        </div>
        <hr>
        <div id="data-explore-detail" class="col-md-24 nopadding">

        </div>
    </div>
</div>