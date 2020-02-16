<?php flash_msg(); ?>
<div class="row">
    <div class="col-md-17">
        <div class="btn-toolbar">
            <?php if ($this->_user['u_type'] == '1' || $this->_user['u_type'] == '2') { ?>
                <div class="btn-group">
                    <span class="btn btn-default disabled add-account dropdown-toggle" data-toggle="dropdown" title="Advanced" id="adv">
                        Add <span class="visible-lg-inline-block">Channel</span>
                    </span>
                    <form class="dropdown-menu pull-left form-search-account">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="account_name" placeholder="Search Youtube Channel..." required="">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">Search</button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
                <button type="button" class="btn btn-default" id="btn-remove-subscribe">Delete <span class="visible-lg-inline-block">Channel</span></button>
            <?php } ?>
            <form class="input-inline search">
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search for..." required="">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">Find</button>
                        </span>
                    </div>
                </div>
            </form>
            <button type="button" id="clear" class="btn btn-default hide">Clear</button>
            <div class="btn-group pull-right">
                <label class="btn disabled"><b>SORT</b></label>
                <div class="btn-group sort-data">
                    <label class="btn btn-default active" data-value="screen_name">
                        <i class="fa fa-sort-alpha-asc"></i>
                    </label>
                    <label class="btn btn-default" data-value="subscriber">
                        Subscribers
                    </label>
                </div>
            </div>
        </div>
        <div id="account-paging"></div>
    </div>
    <div class="col-md-7">
        <div id="account-detail"></div>
        <div id="latest-tweets"></div>
        <div class="btn-toolbar m-t-10">
            <span class="btn disabled pull-right" id="info-list-videos"></span>
        </div>
    </div>
</div>