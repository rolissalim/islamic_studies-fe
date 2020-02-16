<?php echo doctype("html5"); ?>
<html>
    <head>
        <?php $this->load->view("template/head"); ?>
    </head>
    <body>
        <div class="container">
            <div class="header navbar navbar-default navbar-static-top">
                <div class="navbar-header">
                    <a href="" class="navbar-brand">
                        <span class="navbar-logo"></span>
                        <div class="navbar-title pull-left"><span class="title-inc">eBdesk</span></div>
                        <div class="navbar-title pull-left"><span class="app-name-left"><?php echo strtoupper(config_item("app_name")); ?></span></div>
                    </a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#" style="cursor: default">
                            <i class="fa fa-user"></i>
                            <?php echo $this->_user['u_name']; ?>
                        </a>
                    </li>
                    <li>
                        <button type="button" class="btn btn-primary-ebdesk navbar-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-home"></i> Home <span class="fa fa-caret-down"></span>
                        </button>
                        <div class="dropdown-menu all-menu">
                            <?php $this->load->view("template/menu"); ?>
                        </div>  
                    </li>
                </ul>
            </div>

            <div class="content">
                <?php $this->load->view($_content); ?>
            </div>
        </div>
        <?php $this->load->view("template/foot"); ?>
    </body>
</html>