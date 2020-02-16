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
                <span class="btn btn-default cluster-item" id="tweet">Tweets</span>
                <span class="btn btn-default cluster-item" id="rt">Retweet</span>
                <span class="btn btn-default cluster-item" id="mentions">Mentions</span>
            </div>
            <div class="pull-left"><h4 id="info-issue">TOP ISSUES</h4></div>
        </div>
        <div id="cluster-tweets"></div>
    </div>
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title" style="line-height: 20px;">Keywords <span id="info-compare"></span></h4>
            </div>
            <div class="panel-body">
                <div class="wrap-keywords" data-scrollbar="true">
                    <form class="comparison-key hidden" id="form-keyword">
                        <div class="wrap-method-keyword"> 
                            <div class="form-group">  
                                <div class="input-group">
                                    <div class="input-group-btn">
                                        <span class="keyword-by">
                                            Keyword Method
                                        </span>
                                        <div class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <b>INPUT</b>&nbsp;&nbsp;<span class="caret"></span>
                                        </div>
                                        <ul class="dropdown-menu" id="keyword-by">
                                            <li class="selected"><a href="#" data-value="input">INPUT</a></li>
                                            <li><a href="#" data-value="query">QUERY</a></li>
                                        </ul>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                        <div class="wrap-query-keyword">                             
                            <div class="form-group keyword-item-query has-feedback">                                
                                <div class="input-group">
                                    <div class="input-group-btn">
                                        <textarea class="form-control" id="keyword-query" name="text[1]" data-fv-field="text[1]" rows="3" style="resize: none;"></textarea>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                        <div class="wrap-input-keyword">
                            <div class="form-group keyword-item">
                                <div class="input-group">
                                    <div class="input-group-btn">
                                        <div class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <b>OR</b>&nbsp;&nbsp;<span class="caret"></span>
                                        </div>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" data-value="">OR</a></li>
                                            <li><a href="#" data-value="&">AND</a></li>
                                            <li><a href="#" data-value="-">NOT</a></li>
                                        </ul>
                                    </div>
                                    <input type="hidden" name="suffix[0]" class="input-keyword-suffix" value=""/>
                                    <input type="text" name="text[0]" class="form-control input-keyword">
                                    <span class="input-group-btn">
                                        <span class="btn btn-default remove-input-keyword">
                                            <i class="fa fa-times"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group hidden" id="template">
                                <div class="input-group">
                                    <div class="input-group-btn">
                                        <div class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <b>OR</b>&nbsp;&nbsp;<span class="caret"></span>
                                        </div>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" data-value="">OR</a></li>
                                            <li><a href="#" data-value="&">AND</a></li>
                                            <li><a href="#" data-value="-">NOT</a></li>
                                        </ul>
                                    </div>
                                    <input type="hidden" name="suffix" class="input-keyword-suffix" value="" disabled=""/>
                                    <input type="text" name="text"  class="form-control input-keyword" disabled="">
                                    <span class="input-group-btn">
                                        <span class="btn btn-default remove-input-keyword">
                                            <i class="fa fa-times"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="btn-group btn-group-sm m-b-5">
                                <span class="btn btn-default" id="add-input-keyword">ADD KEYWORD</span>
                                <button class="btn btn-default" type="submit" id="add-keyword">APPLY</button>
                            </div>
                        </div>
                    </form>
                    <input type="hidden" name="compare_id">
                    <div class="list-group" id="keyword-compare"></div>
                </div>
                <div class=" pull-left m-t-10">
                    <span class="btn btn-sm btn-default disabled" id="btn-compare">Compare</span>
                    <span class="btn btn-sm btn-default hidden" id="btn-back">Back</span>
                    <span class="btn btn-sm btn-default" id="btn-load">Load</span>
                    <span class="btn btn-sm btn-default hidden" id="btn-save">Save</span>
                    <span class="btn btn-sm btn-default hidden" id="btn-clear">Clear</span>
                </div>
                <div class="pull-right m-t-10">
                    <span class="btn btn-sm btn-default hidden" id="btn-excel"><i class="fa fa-file-excel-o"></i> Export XLS</span>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<form class="hidden" method="post" action="<?php echo site_url("ajax/downloadExcel") ?>" id="form-excel">
    <input type="hidden" name="account_id">
    <input type="hidden" name="media">
    <input type="hidden" name="type_data">
    <input type="hidden" name="year">
    <input type="hidden" name="month">
    <input type="hidden" name="keywords">
    <input type="hidden" name="period">
</form>
