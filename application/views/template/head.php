<?php
/* ----- TITLE HANDLE ----- */
$__title = array();
if (isset($_title) && $_title) {
    if (!is_array($_title)) {
        $_title = array((string) $_title);
    }
    $__title = $_title;
}
if (config_item("app_name")) {
    $__title[] = config_item("app_name");
}
if (config_item("app_description")) {
    $__title[] = config_item("app_description");
}
$__title = join(" " . (isset($_title_sparator) ? $_title_sparator : config_item("app_title_sparator")) . " ", $__title);
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="description" content="<?php echo htmlentities(config_item("app_description")) ?>" />
<meta name="author" content="<?php echo htmlentities(config_item("app_author")) ?>" />
<link href="<?php echo base_url("assets/img/logo.png"); ?>" rel="shortcut icon"/>
<title><?php echo htmlentities($__title); ?></title>
<link href="<?php echo base_url("assets/include/font-awesome/css/font-awesome.min.css?_ver=" . md5_file("assets/include/font-awesome/css/font-awesome.min.css")); ?>" type="text/css" rel="stylesheet"/>
<link href="<?php echo base_url("assets/include/bootstrap/css/bootstrap.css?_ver=" . md5_file("assets/include/bootstrap/css/bootstrap.css")); ?>" type="text/css" rel="stylesheet"/>
<link href="<?php echo base_url("assets/include/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css?_ver=" . md5_file("assets/include/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css")); ?>" type="text/css" rel="stylesheet"/>
<link href="<?php echo base_url("assets/include/formvalidation/css/formValidation.min.css") . "?_ver=" . md5_file("assets/include/formvalidation/css/formValidation.min.css"); ?>" type="text/css" rel="stylesheet"/>
<?php
/* ----- CSS HANDLE ----- */
if (isset($_css) && $_css) {
    if (!is_array($_css)) {
        $_css = array((string) $_css);
    }
    foreach ($_css as $value) {
        $_url = $value;
        if (!preg_match("/^http/", $_url)) {
            $_url = base_url($_url . "?_ver=" . md5_file($_url));
        }
        ?>
        <link href="<?php echo $_url ?>" type="text/css" rel="stylesheet"/>
        <?php
    }
}
?>
<link href="<?php echo base_url("assets/css/style.css?_ver=" . md5_file("assets/css/style.css")); ?>" type="text/css" rel="stylesheet"/>