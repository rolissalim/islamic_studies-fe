<?php echo doctype("html5"); ?>
<html>
    <head>
        <?php $this->load->view("template/head"); ?>
    </head>
    <body>
        <div class="container">
            <div class="navbar navbar-default navbar-static-top">
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
                    <li><span class="header-name <?php echo $this->uri->segment(1); ?>"><?php echo $this->_header_name; ?></span></li>
                    <li><span class="page-name"><?php echo ($this->_current_menu) ? strtoupper($this->_current_menu) : ""; ?></span></li>
                    <li>
                        <?php
                        $index = ucfirst($this->uri->segment(1));
                        $index_media = $this->uri->segment(2);
                        $media = $index_media == "main" ? config_item("app_default_media") : $index_media;
                        $user = $this->session->userdata('LoginPublicPerception');
                        $config = array();
                        if (isset($user['appmenu'])) {
                            $config = array(
                                "appmenu" => $user['appmenu'],
                                "w_id" => $user['w_id']
                            );
                        }
                        $drop_menus = get_menu($config, $index, $media);
//                        $drop_menus = get_menu($index, $media);
                        if ($drop_menus && $this->uri->segment(2) !== "overview") {
                            ?>
                            <button type="button" class="btn btn-primary-ebdesk navbar-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 4px 7px;">
                                <i class="fa fa-chevron-down"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right dropdown-ebdesk">
                                <?php
                                $segment_array = array_slice($this->uri->segment_array(), 0, 3);
                                $curent_url = implode("/", $segment_array);
                                foreach ($drop_menus as $key => $value) {
                                    if (is_array($value)) {
                                        reset($value);
                                        $url = current($value);
                                    } else {
                                        $url = $value;
                                    }
                                    $check_url = implode("/", array_slice(explode("/", $url), 0, 3));
                                    if ($curent_url != $check_url) {
                                        ?>
                                        <li><a href="<?php echo site_url($url) ?>"><?php echo strtoupper(str_replace("_", " ", $key)); ?></a></li>
                                        <?php
                                    }
                                }
                                ?> 
                            </ul>
                        <?php } ?>
                    </li>
                    <li id="selected-data">
                        <?php
                        if (isset($account)) {
                            if ($account) {
                                switch ($media) {
                                    case 'twitter':
                                        $account_select = 'account-select';
                                        $account_id = $account['id'];
                                        $account_name = $account['name'];
                                        break;
                                    case 'facebook':
                                        $account_select = 'account-fb-select';
                                        $account_id = $account['id'];
                                        $account_name = $account['name'];
                                        break;
                                    case 'youtube':
                                        $account_select = 'account-youtube-select';
                                        $account_id = $account[0]['user_id'];
                                        $account_name = $account[0]['screen_name'];
                                        break;
                                    case 'instagram':
                                        $account_select = 'account-ig-select';
                                        $account_id = $account['id'];
                                        $account_name = $account['name'];

                                        break;
                                }
                            }
                            ?>           
                            <span data-toggle='popover' data-content="<?php echo $account_name ?>" class="selected-data" id="<?php echo $account_select ?>" data-id="<?php echo $account_id; ?>"><?php echo $account_name ?></span>                           
                            <?php
                        }
                        if (isset($topic)) {
                            $topicName = $topic['t_status'] ? $topic['t_name'] : "<i>{$topic['t_name']}</i>";
                            echo "<span data-toggle='popover' data-content='" . $topicName . "' class='selected-data' id='topic-select' data-id='{$topic['t_id']}'>" . $topicName . "</span>";
                            echo $topic['t_status'] ? "" : "<i class='fa fa-exclamation text-primary inactive-sign' data-toggle='tooltip' data-placement='bottom'></i>";
                            echo $topic['w_id'] != $this->_user['w_id'] ? "<i class='fa fa-share-alt shared-sign' data-toggle='tooltip' data-placement='bottom' style='" . (($topic['t_status']) ? "" : "right:-25px;") . "'></i>" : "";
                        }
                        ?>
                    </li>
                </ul>
                <?php
                $segs = $this->uri->segment_array();
                if ($segs[1] !== "home" && isset($segs[3])) {
                    ?>
                    <ul class="nav navbar-nav navbar-right" style="margin-right: 0px;">
                        <?php if ($segs[1] == 'topic' && $segs[2] == 'twitter' && $segs[3] == 'dashboard') { ?>
                            <li style="margin-top: 9px; margin-right: 5px;">
                                <div class="btn-group btn-group-sm filter-account-type">
                                    <select class="account_type">
                                        <option></option>
                                        <option>ALL</option>
                                        <option>HUMAN</option>
                                        <option>ROBOT</option>
                                        <option>OTHER</option>
                                    </select>
                                </div>
                            </li>
                        <?php } ?>
                        <?php if ($segs[3] != 'main') { ?>
                            <li style="margin-right: 5px;"><span id="filter-data" data-media="<?php echo $segs[2]; ?>" data-account_id="<?php echo isset($account) ? $account_id : ""; ?>" data-topic_id="<?php echo isset($topic) ? $topic['t_id'] : ""; ?>" class="btn navbar-btn btn-default" style="line-height: 18px;">Streaming</span></li>
                        <?php } ?>
                        <li><span class="btn navbar-btn btn-default disabled" style="line-height: 18px;"><?php echo strtoupper(str_replace("_", " ", $this->uri->segment(2))); ?></span></li>
                        <li>
                            <?php
                            $user = $this->session->userdata('LoginPublicPerception');
                            $config = array();
                            if (isset($user['appmenu'])) {
                                $config = array(
                                    "appmenu" => $user['appmenu'],
                                    "w_id" => $user['w_id']
                                );
                            }
                            $drop_medias = get_menu($config, $index);
//                            $drop_medias = get_menu($index);
                            if ($drop_medias) {
                                $config_app_media = config_item("app_media");
                                ?> 
                                <button type="button" class="btn btn-primary-ebdesk navbar-btn dropdown-toggle <?php echo (count($drop_medias) == 1) ? "disabled" : ""; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 4px 7px;">
                                    <i class="fa fa-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right dropdown-ebdesk <?php echo $this->uri->segment(3); ?>" id="<?php echo $this->uri->segment(1); ?>-select-menu">
                                    <?php
                                    $curren_segment = $segs[2];
                                    foreach ($drop_medias as $key => $value) {
                                        if (in_array($key, $config_app_media) && $curren_segment != $key) {
                                            $segs[2] = $key;
                                            $url = implode("/", $segs);
                                            if (in_array_r($url, $drop_medias)) {
                                                ?>
                                                <li><a href="<?php echo site_url($url) ?>" data-media="<?php echo $key; ?>"><?php echo strtoupper(str_replace("_", " ", $key)); ?></a></li>
                                                <?php
                                            }
                                        }
                                    }
                                    ?> 
                                </ul>
                            <?php } ?>
                        </li>
                    </ul>
                    <?php
                } else if ($segs[2] === "overview") {
                    $user = $this->session->userdata('LoginPublicPerception');
                    $config = array();
                    if (isset($user['appmenu'])) {
                        $config = array(
                            "appmenu" => $user['appmenu'],
                            "w_id" => $user['w_id']
                        );
                    }
                    $drop_medias = get_menu($config, $index, $this->uri->segment(2));
//                    $drop_medias = get_menu($index, $this->uri->segment(2));
                    ?>
                    <ul class="nav navbar-nav navbar-right" style="margin-right: 0px; display: <?php echo (count($drop_medias) == 1) ? "none" : "block"; ?>">
                        <li><span class="btn navbar-btn btn-default disabled" style="line-height: 18px;"><?php echo strtoupper(str_replace("_", " ", $this->uri->segment(3))); ?></span></li>
                        <li>
                            <?php
                            if ($drop_medias) {
                                $config_app_media = config_item("app_media");
                                ?> 
                                <button type="button" class="btn btn-primary-ebdesk navbar-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 4px 7px;">
                                    <i class="fa fa-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right dropdown-ebdesk <?php echo $this->uri->segment(3); ?>" id="<?php echo $this->uri->segment(1); ?>-select-menu">
                                    <?php
                                    $curren_segment = $segs[3];
                                    foreach ($drop_medias as $key => $value) {
                                        if (in_array($key, $config_app_media) && $curren_segment != $key) {
                                            $segs[3] = $key;
                                            $url = implode("/", $segs);
                                            if (in_array_r($url, $drop_medias)) {
                                                ?>
                                                <li><a href="<?php echo site_url($url) ?>" data-media="<?php echo $key; ?>"><?php echo strtoupper(str_replace("_", " ", $key)); ?></a></li>
                                                <?php
                                            }
                                        }
                                    }
                                    ?> 
                                </ul>
                            <?php } ?>
                        </li>
                    </ul>
                <?php } ?>
            </div>
            <?php
            $index_child = ucfirst($this->uri->segment(3));
            $user = $this->session->userdata('LoginPublicPerception');
            $config = array();
            if (isset($user['appmenu'])) {
                $config = array(
                    "appmenu" => $user['appmenu'],
                    "w_id" => $user['w_id']
                );
            }
            $toolbar_menus = get_menu($config, $index, strtolower($index_media), $index_child);
//            $toolbar_menus = get_menu($index, strtolower($index_media), $index_child);
            if ($toolbar_menus && $this->uri->segment(2) !== "overview") {
                $curent_toolbar_menu = $this->uri->uri_string;
                ?>
                <div class="btn-toolbar" role="toolbar" style="margin: 10px 0 10px -5px;">
                    <?php foreach ($toolbar_menus as $key => $value) { ?>
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
