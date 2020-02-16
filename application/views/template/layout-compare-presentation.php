<?php echo doctype("html5"); ?>
<html>
    <head>
        <?php $this->load->view("template/head"); ?>
    </head>
    <body>
        <div class="container">
            <div class="navbar navbar-default navbar-static-top compare-nav" style="z-index: 1;">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?php echo site_url($back_compare); ?>" class="back">
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
                    <li><span class="page-name"><?php echo ($this->_current_menu) ? strtoupper($this->_current_menu) : ""; ?></span></li>
                    <li>
                        <?php
                        $segs = $this->uri->segment_array();
                        if ($menu) {
                            ?>
                            <button type="button" class="btn btn-primary-ebdesk navbar-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 4px 7px;">
                                <i class="fa fa-chevron-down"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right dropdown-ebdesk menu_persentation">
                                <?php
                                $segment_array = array_slice($this->uri->segment_array(), 0, 2);
                                foreach ($menu as $key => $value) {
                                    if ($key != $segs[5]) {
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
                        <span data-toggle="popover" data-content="<?php echo isset($compare_topic['compare_name']) ? $compare_topic['compare_name'] : ""; ?>" class="selected-data" data-original-title="" title=""><?php echo isset($compare_topic['compare_name']) ? $compare_topic['compare_name'] : ""; ?></span>                                             
                    </li>
                </ul>               
            </div>
            <div class="btn-toolbar compare">
                <div class="btn-toolbar" id="header-btn-toolbar" role="toolbar" aria-label="...">
                    <?php if (isset($label)) { ?>                    
                        <h5>
                            <?php foreach ($label as $key => $value) { ?>
                                <span class="badge <?php echo $key ?>" style="<?php echo isset($value[1]) ? $value[1] : "" ?>">&nbsp;</span>
                                <span data-toggle="popover" data-content="<?php echo $value[0] ?>" class="selected-data" data-original-title="" title=""><?php echo $value[0] ?></span>
                            <?php } ?>
                        </h5>
                    <?php } ?>
                    <div id="content" class="content">
                        <?php $this->load->view($_content); ?>
                    </div>            
                </div>
                <?php $this->load->view("template/foot"); ?>
                </body>
                </html>