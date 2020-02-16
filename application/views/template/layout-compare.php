<?php echo doctype("html5"); ?>
<html>
    <head>
        <?php $this->load->view("template/head"); ?>
    </head>
    <body>
        <div class="container">
            <div class="navbar navbar-default navbar-static-top compare-nav">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?php echo site_url("main"); ?>" class="back">
                            <span class="fa fa-chevron-left fa-2x text-primary"></span>
                        </a>
                    </li>
                    <li>
                        <button type="button" class="btn btn-primary-ebdesk navbar-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 4px 13px;">
                            I
                        </button>
                        <div class="dropdown-menu all-menu">
                            <?php $this->load->view("template/menu"); ?>
                        </div>  
                    </li>
                    <li><span class="header-name"><?php echo $this->_header_name; ?></span></li>
                    <li><span class="page-name"><?php echo ($this->_current_menu) ? strtoupper($this->_current_menu) : ""; ?></span></li>
                    <li>
                        <?php
                        $index = ucfirst($this->uri->segment(1));
                        $index_compare = ucfirst($this->uri->segment(2));
                        $index_media = ($this->uri->segment(3) == "main") ? config_item("app_default_media") : $this->uri->segment(3);
                        $user = $this->session->userdata('LoginPublicPerception');
                        $config = array();
                        if (isset($user['appmenu'])) {
                            $config = array(
                                "appmenu" => $user['appmenu'],
                                "w_id" => $user['w_id']
                            );
                        }
                        $drop_menus = get_menu($config, $index);
//                        $drop_menus = get_menu($index);
                        if ($drop_menus) {
                            ?>
                            <button type="button" class="btn btn-primary-ebdesk navbar-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 4px 7px;">
                                <i class="fa fa-chevron-down"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right dropdown-ebdesk">
                                <?php
                                $segment_array = array_slice($this->uri->segment_array(), 0, 2);
                                $segment_array[] = "main";
                                $current_compare = implode("/", $segment_array);
                                foreach ($drop_menus as $key => $value) {
                                    $key_menus = array_keys($value);
                                    $value = isset($value[$index_media]) ? $value[$index_media] : $value[$key_menus[0]];
                                    if (is_array($value)) {
                                        reset($value);
                                        $url = current($value);
                                    } else {
                                        $url = $value;
                                    }
                                    if ($current_compare != $url) {
                                        ?>
                                        <li><a href="<?php echo site_url($url) ?>"><?php echo strtoupper(str_replace("_", " ", $key)); ?></a></li>
                                        <?php
                                    }
                                }
                                ?> 
                            </ul>
                        <?php } ?>
                    </li>
                </ul>
                <?php
                $user = $this->session->userdata('LoginPublicPerception');
                $config = array();
                if (isset($user['appmenu'])) {
                    $config = array(
                        "appmenu" => $user['appmenu'],
                        "w_id" => $user['w_id']
                    );
                }
                $index_menus = get_menu($config, $index, $index_compare);
                $key_menus = array_keys($index_menus);
                $toolbar_menus = get_menu($config, $index, $index_compare, $key_menus[0]);
//                $toolbar_menus = get_menu($index, $index_compare, $index_media);
                if ($toolbar_menus) {
                    $string_url = $this->uri->uri_string;
                    if ($this->uri->segment(5)) {
                        $curent_toolbar_menu = substr($string_url, 0, strrpos($string_url, "/"));
                    } else {
                        $curent_toolbar_menu = $string_url;
                    }
                    ?>
                    <div class="nav navbar-nav navbar-right" style="margin-right: 0px;">
                        <div class="btn-toolbar m-t-10" role="toolbar" aria-label="...">
                            <?php
                            foreach ($toolbar_menus as $key => $value) {
                                if (is_array($value)) {
                                    reset($value);
                                    $url = current($value);
                                    $curent_menu = substr($url, 0, strrpos($url, "/"));
                                } else {
                                    $url = $value;
                                    $curent_menu = $value;
                                }
                                ?>
                                <a href="<?php echo site_url($url); ?>" class="btn btn-sm btn-default <?php echo ($curent_menu == $curent_toolbar_menu) ? "active" : "" ?>"><?php echo $key; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <div class="btn-toolbar compare">
                <?php if (isset($compare_topic['compare_name']) || isset($compare_account['compare_name'])) { ?>
                    <div class="btn-group">
                        <label class="btn disabled text-primary title-compare">
                            <?php
                            echo isset($compare_topic['compare_name']) ? $compare_topic['compare_name'] : "";
                            echo isset($compare_account['compare_name']) ? $compare_account['compare_name'] : "";
                            ?>
                        </label>
                    </div>
                <?php } ?>
                <?php
                $segs = $this->uri->segment_array();
                if ($segs[1] !== "home" && (isset($segs[3]) && $segs[3] !== "main")) {
                    ?>
                    <div class="btn-group btn-group-sm">
                        <span class="btn btn-default" data-type="radar"><?php echo strtoupper(str_replace("_", " ", $this->uri->segment(3))); ?></span>
                        <?php
                        $user = $this->session->userdata('LoginPublicPerception');
                        $config = array();
                        if (isset($user['appmenu'])) {
                            $config = array(
                                "appmenu" => $user['appmenu'],
                                "w_id" => $user['w_id']
                            );
                        }
                        $drop_medias = get_menu($config, $index, $index_compare);
//                        $drop_medias = get_menu($index, $index_compare);
                        if ($drop_medias) {
                            $config_app_media = config_item("app_media");
                            $find_key = ($segs[4] == "main") ? "index" : $segs[4];
                            ?>
                            <button type="button" class="btn btn-primary-ebdesk dropdown-toggle <?php echo (in_array_count($find_key, $drop_medias) == 1) ? "disabled" : ""; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-width: 1px;">
                                <span class="fa fa-caret-down"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu dropdown-ebdesk-small">
                                <?php
                                $curren_segment = $segs[3];
                                foreach ($drop_medias as $key => $value) {
                                    if (in_array($key, $config_app_media) && $curren_segment != $key) {
                                        $segs[3] = $key;
                                        $url = implode("/", $segs);
                                        if (in_array_r($url, $drop_medias)) {
                                            ?>
                                            <li><a href="<?php echo site_url($url) ?>"><?php echo strtoupper(str_replace("_", " ", $key)); ?></a></li>
                                            <?php
                                        }
                                    }
                                }
                                ?> 
                            </ul>
                            <?php if ($segs[4] == "emotion") { ?>
                                <div class="btn-group btn-group-sm dropdown-chart">
                                    <span class="btn btn-default" id='text-chart' data-type="radar">RADAR CHART</span>
                                    <button type="button" class="btn btn-primary-ebdesk dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-width: 1px;">
                                        <span class="fa fa-caret-down"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" id='type-chart'>
                                        <li data-type='radar'><a href="#">RADAR CHART</a></li>
                                        <li data-type='area'><a href="#">STACKED AREA</a></li>
                                        <li data-type='bar'><a href="#">STACKED BAR</a></li>
                                        <!--<li data-type='sunburst'><a href="#">SUNBURST</a></li>-->
                                        <li data-type='treemaps'><a href="#">TREE MAPS</a></li>
                                    </ul>
                                </div>
                            <?php } ?>
                            <?php if ($segs[4] == "streaming") { ?>
                                <div class="btn-group btn-group-sm dropdown-chart">
                                    <span class="btn btn-default" id='text-chart' data-type="exposure">EXPOSURE</span>
                                    <button type="button" class="btn btn-primary-ebdesk dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-width: 1px;">
                                        <span class="fa fa-caret-down"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" id='type-chart'>
                                        <li data-type='exposure'><a href="#">EXPOSURE</a></li>
                                        <li data-type='emotion'><a href="#">EMOTION</a></li>
                                    </ul>
                                </div>
                            <?php } ?>
                            <?php if (isset($presentation) && ($user['w_id'] == 6 || $user['w_id'] == 0 )) { ?>
                                <div class="btn-group btn-group-sm dropdown-chart" id="presentation_mode">
                                    <a href="<?php echo site_url($presentation) ?>" class="btn btn-sm btn-default ">Presentation Mode </a>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
                <?php
            }
            $index_child = ucfirst($this->uri->segment(4));
            $user = $this->session->userdata('LoginPublicPerception');
            $config = array();
            if (isset($user['appmenu'])) {
                $config = array(
                    "appmenu" => $user['appmenu'],
                    "w_id" => $user['w_id']
                );
            }
            $toolbar_child_menus = get_menu($config, $index, $index_compare, $index_media, $index_child);
//            $toolbar_child_menus = get_menu($index, $index_compare, $index_media, $index_child);
            if ($toolbar_child_menus && $this->uri->segment(3) != "main") {
                $curent_toolbar_menu = $this->uri->uri_string;
                ?>
                <div class="btn-toolbar" role="toolbar" aria-label="...">
                    <?php foreach ($toolbar_child_menus as $key => $value) { ?>
                        <a href="<?php echo site_url($value); ?>" class="btn btn-sm btn-default <?php echo ($value == $curent_toolbar_menu) ? "active" : "" ?>"><?php echo $key; ?></a>
                    <?php } ?>
                </div>
            <?php } ?>
            <div id="content" class="content">
                <?php $this->load->view($_content); ?>
            </div>            
        </div>
        <?php $this->load->view("template/foot"); ?>
    </body>
</html>