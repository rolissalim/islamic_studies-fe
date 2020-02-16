<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">Resume</h4>
            </div>
            <div class="panel-body" id="perception-radar">
                <table id="resume">
                    <tr>
                        <td>Duration</td><td> : </td><td class="rvalue">
                            <div class="btn-group date-period">
                                <!-- <span class="btn btn-default period-item" title="Day" id="day">D</span> -->
                                <span class="btn btn-default period-item" title="Week" id="week">W</span>
                                <span class="btn btn-default period-item active" title="Month" id="month">M</span>
                                <span class="btn btn-default period-item" title="Year" id="year">Y</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">Periode</td><td valign="top"> : </td><td class="rvalue">
                            <input type="text" name="sdate" value="" id="sdate" placeholder="Start Date" class="date form-control sdate" size="10" autocomplete="off" disabled required>
                            <input type="text" name="edate" value="" id="edate" placeholder="End Date" class="date form-control edate" size="10" autocomplete="off" required>
                        </td>
                    </tr>
                    <tr> 
                        <td></td><td></td><td class="rvalue text-right">
                            <button id="export-xls" data-loading-text="<i class='fa fa-circle-o-notch fa-spin fa-fw'></i> Loading..." class="btn btn-default btn-sm" title="Export XLS">Export XLS</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>