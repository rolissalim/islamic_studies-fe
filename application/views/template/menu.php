<div class="row">
    <?php
    $user = $this->session->userdata('LoginPublicPerception');
    $config = array();
    if (isset($user['appmenu'])) {
        $config = array(
            "appmenu" => $user['appmenu'],
            "w_id" => $user['w_id']
        );
    }
    $menus = get_menu($config);
    $i = 0;
    $color = array("black", "green", "blue", "red");
    $default_topic = config_item("app_default_media");
    foreach ($menus as $menu => $sub_menus) {
        if ($menu == "Account" || $menu == "Topic") {
            $key_menus = array_keys($sub_menus);
            $sub_menus = isset($sub_menus[$default_topic]) ? $sub_menus[$default_topic] : $sub_menus[$key_menus[0]];
        } else {
            $sub_menus = isset($sub_menus[$default_topic]) ? $sub_menus[$default_topic] : $sub_menus;
        }
        ?>
        <div class="col-md-6">
            <div class="menu-head <?php echo $color[$i]; ?>"><?php echo strtoupper($menu); ?></div>
            <?php if (is_array($sub_menus)) { ?>
                <ul class="list-unstyled list-menu">
                    <?php
                    foreach ($sub_menus as $sub_menu => $values) {
                        if ($sub_menu == 'Admin' || $sub_menu == 'Personalize') {
                            if (is_array($values)) {
                                if ($sub_menu == "Admin") {
                                    if ($this->_user['u_type'] != 1) {
                                        continue;
                                    }
                                }
                                ?>
                                <li class="caption"> <?php echo ucwords(str_replace("_", " ", $sub_menu)); ?></li>
                                <?php
                                foreach ($values as $key => $value) {
                                    if ($key == "Workspace") {
                                        if ($this->_user['w_id'] != 0) {
                                            continue;
                                        }
                                    }
                                    if ($key == "Share Topics") {
                                        if ($this->_user['u_type'] != 1) {
                                            continue;
                                        }
                                        if ($this->_user['w_id'] != 0) {
                                            continue;
                                        }
                                    }
                                    if (is_array($value)) {
                                        reset($value);
                                        $url = current($value);
                                    } else {
                                        $url = $value;
                                    }
                                    ?>
                                    <li class="sub-menu"><a href="<?php echo site_url($url); ?>"><i class="fa fa-stop"></i> <?php echo $key ?></a></li>
                                    <?php
                                }
                            } else {
                                ?>
                                <li class="menu"><a href="<?php echo site_url($values); ?>"> <?php echo $sub_menu ?></a></li>
                                <?php
                            }
                        } else {
                            if (is_array($values)) {

                                if (($sub_menu == "Compare_topic" || $sub_menu == "Compare_account")) {
                                    $key_menus = array_keys($values);
                                    $values = isset($values[$default_topic]) ? $values[$default_topic] : $values[$key_menus[0]];
                                }
                                reset($values);
                                $url = current($values);
                            } else {
                                $url = $values;
                            }
                            ?>
                            <li class="menu"><a href="<?php echo site_url($url); ?>"> <?php echo ucwords(str_replace("_", " ", $sub_menu)); ?></a></li>
                            <?php } ?>
                        <?php } ?>
                </ul>
            <?php } ?>
        </div>
        <?php
        $i++;
    }
    ?>
</div>