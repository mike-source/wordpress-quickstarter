<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">

<!-- wp_head(): -->        
<?php wp_head(); ?>
<script src="//use.typekit.net/ats6pvm.js"></script>
<script>try{Typekit.load();}catch(e){}</script>

<link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">
</head>

<body <?php body_class(); ?>>
    <!--[if lt IE 8]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <header class="page-header  block-group">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="Form Logo" class="page-header__logo  block">
        <nav class="page-header__nav  page-header__nav--desktop  block">
            <ul class="nav  block  block-group">
                <li class="block"><a href="/#about">About</a></li>
                <li class="block"><a href="/#services">Services</a></li>
                <li class="block"><a href="/#team">Team</a></li>
                <li class="block"><a href="/#blog">Blog</a></li>
                <li class="block"><a href="/#contact">Contact</a></li>
                <li class="block"><a href="/#social">Social</a></li>
            </ul>
            <div class="members  block"><a href="#">Members</a></div>
        </nav>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="Form Logo" class="page-header__logo--mobile  block">
        <nav class="page-header__nav  page-header__nav--mobile  block">
            <ul class="nav  block  block-group">
                <li class="block"><a href="/#about">About</a></li>
                <li class="block"><a href="/#services">Services</a></li>
                <li class="block"><a href="/#team">Team</a></li>
                <li class="block"><a href="/#blog">Blog</a></li>
                <li class="block"><a href="/#contact">Contact</a></li>
                <li class="block"><a href="/#social">Social</a></li>
            </ul>
            <div class="members  block"><a href="#">Members</a></div>
        </nav>
        <div class="hamburger  page-header__hamburger">
            <span class="open">☰</span>
            <span class="close">x</span>
        </div>
    </header><!-- #header -->

<div class="header-spacer"></div>