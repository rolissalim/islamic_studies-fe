<div class="row">
    <div class="col-md-12">
        <div class="btn-toolbar">
            <div class="btn-group btn-group-sm filter pull-right">
                <span class="btn btn-default period-item dropdown-toggle" data-toggle="dropdown" title="Advanced" id="adv">
                    Filter
                </span>
                <div class="dropdown-menu pull-right form-filter">
                    <form class="form-horizontal form-filter-tweets" id="form-filter-picture">
                        <fieldset>
                            <legend>Content Filtering</legend>
                            <div class="form-group">
                                <label for="keyword-filter" class="col-sm-6 control-label">Keyword</label>
                                <div class="col-sm-18">
                                    <input type="text" name="keyword" class="form-control" id="keyword-filter" placeholder="Search For....">
                                </div>
                            </div>
                            <fieldset class="well the-fieldset adv-form-filter" id="adv-form-picture">
                                <legend class="the-legend">Advanced</legend>
                                <div class="form-group">
                                    <label for="time-frame" class="control-label">Time Frame</label>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="period" value="all" checked>
                                                    All
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="period" value="week">
                                                    1 Week
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="period" value="quarter">
                                                    1 Quarter
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="period" value="today">
                                                    Today
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="period" value="month" >
                                                    1 Month
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="period" value="year">
                                                    1 Year
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-inline">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="period" value="custom" class="period-adv-custom">
                                            </label>
                                        </div>
                                        <div class="container-date">
                                            <input type="text" class="form-control period-adv-input-filter start" name="period-date-start" placeholder="Start Date" disabled="" style="width: 120px;">
                                        </div>
                                        <div class="radio">
                                            <label>
                                                To
                                            </label>
                                        </div>
                                        <div class="container-date">
                                            <input type="text" class="form-control period-adv-input-filter end" name="period-date-end" placeholder="End Date" disabled="" style="width: 120px;">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="pull-left">
                                <span class="btn btn-default btn-sm toogle-adv" id="toggle-adv-picture">Advanced</span>
                            </div>
                            <div class="pull-right">
                                <button class="btn btn-default btn-sm">APPLY</button>
                                <span class="btn btn-default btn-sm clear-filter-tweets" id="clear-filter-picture">CLEAR</span>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <div id="picture-paging"></div>
    </div>
    <div class="col-md-12">
        <div id="picture-display"></div>
    </div>
</div>