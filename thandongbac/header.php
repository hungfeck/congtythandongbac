<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
   <head id="Head1">
    <title><?php wp_title( '|', true, 'right' );  bloginfo( 'name' ); ?></title>
    <!-- <title>CÔNG TY CỔ PHẦN 379 - TỔNG CÔNG TY THAN ĐÔNG BẮC</title> -->
    <link rel="shortcut icon" href="<?php bloginfo('template_directory') ?>/Images/logo.jpg" type="image/x-icon"/>
    <meta id="description" name="description" content=""/>
    <meta id="keywords" name="keywords" content=""/>
    <meta http-equiv="refresh" content="10800"/>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <meta http-equiv="Content-Script-Type" content="text/javascript"/>
    <meta http-equiv="content-language" content="vi"/>
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" type="text/css" href='<?php bloginfo('template_directory')?>/bootstrap/css/bootstrap.min.css' />
    <link rel="stylesheet" type="text/css" href='<?php bloginfo('template_directory')?>/Styles/styles.css' />
    <link rel="stylesheet" type="text/css" href='<?php bloginfo('template_directory')?>/Styles/responsive.css' />
    <script type="text/javascript" src="<?php bloginfo('template_directory')?>/Scripts/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory')?>/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory')?>/Scripts/main.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory')?>/Scripts/function.js"></script>
    <style>@media screen and (min-width: 1170px){.category{height: 440px;overflow: hidden;}}</style>
    <?php wp_head(); ?>
   </head>
   <body>
        <div class="wrap">
        <div id="header">
            <div class="header-world">
                <div class="container">
                    <a href="<?php bloginfo('home') ?>" class="logo1">
                        <img class="logo" width="83" height = "83" src="<?php bloginfo('template_directory');?>/Images/logo.jpg" alt="logo"/>
                    </a>
                    <div class="slogan">
                    <h1><?php echo get_bloginfo( 'name' ); ?></h1>
                    </div>
                    <div class="pull-right">
                    <form role="search" method="get" class="td-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <div class="search">
                            <input type="text" id="s" name="s"   placeholder="Tìm kiếm" />
                            <input type="submit" value="Tìm kiếm"  class="search"/>
                        </div>
                    </form>
                    <!--/input-group -->
                    </div>
                </div>
            </div>
            <div id="nav-header" class="menu">
                <div class="navbar navbar-default" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="sr-only">Toggle navigation</span><a id="ctl13_LinkButton1" href="javascript:__doPostBack(&#39;ctl13$LinkButton1&#39;,&#39;&#39;)">English</a><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
                    <div class="collapse navbar-collapse">
                    <?php 
                        if(has_nav_menu('main-menu')):
                            $arg = array(
                                'theme_location' => 'main-menu',
                                'menu_id' => 'menu-td-header',
                                'container_class' => 'container wrapper',
                                'menu_class' => 'nav navbar-nav',
                                'menu_id' => ''
                                );
                                wp_nav_menu($arg);
                        endif;
                    ?>
                    <div class="container wrapper">
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="tvk_tooltip"></div>
        <style>
            .section{padding-left: 0;}
            .video-right
            {margin-top: 70px;}@media screen and (max-width: 767px)
            {.video-right
            {margin-top: 0;height: auto;}
            .video-right img
            {width:100%;}
            }
        </style>
        