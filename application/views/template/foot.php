<script>
    function base_url(path) {
        return <?php echo json_encode(base_url()); ?> + path.replace(/^\//g, '');
    }
    function site_url(path) {
        return <?php echo json_encode(site_url()); ?> + path.replace(/^\//g, '');
    }
    var staging = <?php echo json_encode($this->config->item('app_is_staging')); ?>;
    var array_emotion = <?php echo json_encode(get_emotions()); ?>;
    var year = <?php echo json_encode(date("Y")); ?>;
    var month = <?php echo json_encode(date("m")); ?>;
    var day  = <?php echo json_encode(date("d")); ?>;
    var current_date = <?php echo json_encode(date("Y-m-d")); ?>;
    var intervalHandleChart, intervalHandleTweets = null;
</script>
<script type="text/javascript" src="<?php echo base_url("assets/include/jquery/jquery.min.js") . "?_ver=" . md5_file("assets/include/jquery/jquery.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/include/jquery-ui/jquery-ui.min.js") . "?_ver=" . md5_file("assets/include/jquery-ui/jquery-ui.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/include/bootstrap/js/bootstrap.min.js") . "?_ver=" . md5_file("assets/include/bootstrap/js/bootstrap.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/include/jquery.redirect.min.js?_ver=" . md5_file("assets/include/jquery.redirect.min.js")); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/include/jquery.slimscroll.min.js?_ver=" . md5_file("assets/include/jquery.slimscroll.min.js")); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/include/moment.min.js?_ver=" . md5_file("assets/include/moment.min.js")); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/include/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js?_ver=" . md5_file("assets/include/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js")); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/include/formvalidation/js/formValidation.min.js") . "?_ver=" . md5_file("assets/include/formvalidation/js/formValidation.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/include/formvalidation/js/framework/bootstrap.min.js") . "?_ver=" . md5_file("assets/include/formvalidation/js/framework/bootstrap.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/include/twemoji.min.js") . "?_ver=" . md5_file("assets/include/twemoji.min.js"); ?>"></script>
<!--<script type="text/javascript" src="//twemoji.maxcdn.com/twemoji.min.js"></script>-->
<?php
/* ----- JS HANDLE ----- */
if (isset($_js) && $_js) {
    if (!is_array($_js)) {
        $_js = array((string) $_js);
    }
    foreach ($_js as $value) {
        $_url = $value;
        if (!preg_match("/^http/", $_url)) {
            $_url = base_url($_url . "?_ver=" . md5_file($_url));
        }
        ?>
        <script type="text/javascript" src="<?php echo $_url ?>"></script>
        <?php
    }
}
?>
<script type="text/javascript" src="<?php echo base_url("assets/js/application.js?_ver=" . md5_file("assets/js/application.js")); ?>"></script>
<script>
    $(document).ready(function () {
        App.init();
    });
</script>