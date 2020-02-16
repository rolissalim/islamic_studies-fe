<div class="btn-toolbar m-t-min-42">
    <div class="btn-group btn-group-sm type-posts">
        <span class="btn btn-default active" data-type="all">ALL</span>
        <span class="btn btn-default" data-type="photo">PHOTOS</span>
        <span class="btn btn-default" data-type="video">VIDEOS</span>
        <span class="btn btn-default" data-type="status">STATUS</span>
        <span class="btn btn-default" data-type="link">LINKS</span>
        <span class="btn btn-default" data-type="comment">COMMENTS</span>
    </div>
    <div class="btn-group btn-group-sm pull-right">
        <span class="btn btn-default period-item dropdown-toggle" data-toggle="dropdown" title="Advanced" id="adv">
            Go To Date
        </span>
        <form class="dropdown-menu pull-right form-period-advanced">
            <div class="form-group">
                <input type="text" class="form-control datepick" name="goto-date" id="goto-date" placeholder="Go to Date" required=""  autocomplete="off" value="<?php echo date("Y-m-d");?>">
            </div>
            <div class="form-group">
                <button class="btn btn-default btn-block" type="submit">Apply</button>
            </div>
        </form>   
    </div>
</div>
<div class="row">
    <div class="col-md-24">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="clearfix"></div>
            </div>
            <div class="panel-body" id="timeline"></div>
        </div>
    </div>
</div>