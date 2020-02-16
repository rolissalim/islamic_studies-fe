<div class="row">
    <div class="col-md-18">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Sentiment Timeline</h3>
            </div>
            <div class="panel-body" id="sentiment-line"></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel">
            <div class="panel-body" id="sentiment-pie"></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12" >
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Gender</h3>
            </div>
            <div class="panel-body row" id="gender-sentiment">
                <div class="col-md-4 v-align">
                    <img src="<?php echo base_url('assets/img/man.png'); ?>" class="gender-info">
                </div><!--
                --><div class="col-md-8 v-align">
                    <div class="pie-chart" id="male-sentiment-pie"></div>
                </div><!--
                --><div class="col-md-4 v-align">
                    <img src="<?php echo base_url('assets/img/woman.png'); ?>" class="gender-info">
                </div><!--
                --><div class="col-md-8 v-align">
                    <div class="pie-chart" id="female-sentiment-pie"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12" >
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Age</h3>
            </div>
            <div class="panel-body row row-treemaps">
                <div class="col-md-6">
                    <span class="label label-age label-18">Below 18</span>
                    <div class='treemaps-chart' id="treemaps-18"></div>
                </div>
                <div class="col-md-6">
                    <span class="label label-age label-18-25">18 - 25</span>
                    <div class='treemaps-chart' id="treemaps-18-25"></div>
                </div>
                <div class="col-md-6">
                    <span class="label label-age label-25-35">26 - 35</span>
                    <div class='treemaps-chart' id="treemaps-25-35"></div>
                </div>
                <div class="col-md-6">
                    <span class="label label-age label-35">Above 35</span>
                    <div class='treemaps-chart' id="treemaps-35"></div>
                </div>
            </div>
        </div>
    </div>
</div>

