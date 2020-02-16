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
<!--<li><span class="eader-name <?php // echo $this->uri->segment(1);                               ?>"><?php // echo $this->_header_name;                               ?></span></li>-->
                    <li><span class="page-name"><?php echo ($this->_current_menu) ? strtoupper($this->_current_menu) : ""; ?></span></li>
                    <li>
                        <?php
                        $index = ucfirst($this->uri->segment(1));
                        $index_child = ucfirst($this->uri->segment(3));
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
                        $drop_menus = get_menu($config, $index, strtolower($index_media), $index_child);
                        if ($drop_menus && $this->uri->segment(2) !== "overview") {
                            $curent_toolbar_menu = $this->uri->uri_string;
                            ?>
                            <button type="button" class="btn btn-primary-ebdesk navbar-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 4px 7px;">
                                <i class="fa fa-chevron-down"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right dropdown-ebdesk">                    
                                <?php
                                $segment_array = array_slice($this->uri->segment_array(), 0, 3);
                                $curent_url = implode("/", $segment_array);
                                foreach ($drop_menus as $key => $value) {
                                    if ($value != $curent_toolbar_menu) {
                                        ?>
                                        <li><a href="<?php echo site_url($value) ?>"><?php echo strtoupper(str_replace("_", " ", $key)); ?></a></li>
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
            </div>
            <div id = "content" class = "content">
                <?php $this->load->view($_content);
                ?>
            </div>            
        </div>
        <?php $this->load->view("template/foot"); ?>
    </body>
</html>
