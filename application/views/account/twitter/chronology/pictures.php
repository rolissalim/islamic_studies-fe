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
                            <div id="formScrollPictures">
                                <div class="form-group">
                                    <label class="control-label col-md-7">Keyword By</label>
                                    <div class="col-md-17">
                                        <select name="keyword-method-filter-pictures" class="form-control" id="keyword-method-filter-pictures">
                                            <option value="keyword-input-filter-pictures">Input</option>
                                            <option value="keyword-query-filter-pictures">Query</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group" id="keyword-input-filter-pictures">
                                    <label class="control-label col-md-7">Keyword</label>
                                    <div class="col-md-17">
                                        <div class="wrap-input-keyword-filter-pictures">
                                            <div class="form-group keyword-item" style="margin:0;">
                                                <div class="input-group" style="width:100%;">
                                                    <input type="hidden" name="keyword-input-pictures[0][suffix]" class="input-keyword-suffix" value="">
                                                    <input type="text" name="keyword-input-pictures[0][text]" class="form-control input-keyword">
                                                </div>
                                            </div>
                                            <div class="form-group hidden" id="template-filter-pictures" style="margin:0;">
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
                                                        <span class="btn btn-default remove-input-keyword-pictures">
                                                            <i class="fa fa-times"></i>
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn-group">
                                            <span class="btn btn-default" id="add-input-keyword-filter-pictures">ADD KEYWORD</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" id="keyword-query-filter-pictures" style="display: none;">
                                    <label class="control-label col-md-7">Keyword</label>
                                    <div class="col-md-17">
                                        <textarea name="keyword-query-filter-pictures" style="resize: none;" class="form-control" disabled="" rows="3" maxlength="3072"></textarea>
                                    </div>
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
                                </div>
                                <div class="form-group form-inline">
                                    <div class="radio" style="float: left">
                                        <label>
                                            <input type="radio" name="period" value="custom" class="period-adv-custom">
                                            &nbsp;
                                        </label>
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="form-control period-adv-input-filter start" name="period-date-start" placeholder="Start Date" disabled="" required="">
                                        <div class="input-group-addon" style="background-color: transparent; border: none">To</div>
                                        <input type="text" class="form-control period-adv-input-filter end" name="period-date-end" placeholder="End Date" disabled="" required="">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </fieldset>
                            <div class="pull-left">
                                <span class="btn btn-default btn-sm toogle-adv" id="toggle-adv-picture">Advanced</span>
                            </div>
                            <div class="pull-right">
                                <button class="btn btn-default btn-sm" type="submit">APPLY</button>
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