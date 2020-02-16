<?php flash_msg(); ?>
<div class="row">
    <div class="col-md-17">
        <div class="btn-toolbar">
            <?php if ($this->_user['u_type'] == '1' || $this->_user['u_type'] == '2') { ?>
                <div class="btn-group">
                    <span class="btn btn-default add-account dropdown-toggle" data-toggle="dropdown" title="Advanced" id="adv">
                        Add <span class="visible-lg-inline-block">Account</span>
                    </span>
                    <form class="dropdown-menu pull-left form-search-account">
                        <div class="form-group">
                            <div class="input-group search-group">
                                <select class="form-control" name="account_type">
                                    <option value="page">Page</option>
                                    <option value="personal">Personal</option>
                                </select>
                                <input type="text" class="form-control" name="account_name" placeholder="Search Facebook Account..." required="" >
                                <button class="btn btn-default" type="submit">Search</button>
                            </div>                           
                        </div>
                    </form>
                </div>
                <button type="button" class="btn btn-default" id="btn-remove-subscribe">Delete <span class="visible-lg-inline-block">Account</span></button>
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
                    <label class="btn btn-default active" data-value="name">
                        <i class="fa fa-sort-alpha-asc"></i>
                    </label>
                    <label class="btn btn-default" data-value="likes">
                        Likes
                    </label>
                </div>
            </div>
        </div>
        <div id="account-fb-paging"></div>
    </div>
    <div class="col-md-7">
        <div id="account-fb-detail"></div>
        <div id="latest-posts"></div>
        <div class="btn-toolbar m-t-10">
            <span class="btn disabled pull-right" id="info-list-posts"></span>
        </div>
    </div>
</div>