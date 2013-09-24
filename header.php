<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width" />
    <title><?php wp_title(''); ?></title>
	<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="google-site-verification" content="wlU9OqBjfQU2Y_7rEMOn3h1aKrRviS-UXd1ii4rEI2Q" />
	
    <link rel="icon" type="image/png" href="<?php echo bloginfo('template_url'); ?>/images/favicon.ico" />

    <link rel="author" href="<?php echo bloginfo('template_url'); ?>/humans.txt">
    
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url') ?>" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/css/style.css" />

    <script src="<?php echo bloginfo('template_url'); ?>/js/vendor/modernizr.js"></script>
<?php wp_head(); ?>        
</head>

<body <?php body_class('preload noscrolling'); ?>>

<div id="page" class="clearfix">
    <!--[if lt IE 7]><p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p><![endif]-->
    <div class="hidden" id="template_url"><?php echo bloginfo('template_url'); ?></div>

<header>

<?php if (is_home()) { ?>
	<h1 id="site-title"><a href="<?php echo home_url(); ?>" rel="home" title="Daniel DuGoff">Daniel DuGoff</a></h1>
<?php } else { ?>
	<h3 id="site-title"><a href="<?php echo home_url(); ?>" rel="home" title="Daniel DuGoff">Daniel DuGoff</a></h3>
<?php } ?>

    <!-- <div class="topnav">
        <span><a href="<?php echo home_url(); ?>" rel="home" title="Daniel DuGoff">Work</a></span>
        <span><a href="<?php echo home_url(); ?>/?page_id=83">CV</a></span>
        <span>
        <?php 
        // Log links to the latest post
        query_posts('posts_per_page=1'); while (have_posts()) : the_post(); ?>
        <a href="<?php the_permalink(); ?>">Log</a>
        <?php endwhile; wp_reset_query(); ?>
        </span>    
    </div> -->

</header>          
    
<?php 
// On the home page, show the navigation
if (is_page('work')) { ?>

    <nav class="order">
        <li class="all"><a class="sorted">all</a></li>
        <?php wp_list_categories('title_li='); ?>
        
        <li class="year"><a><span class="twenty">20</span>12</a></li>
        <li class="year"><a><span class="twenty">20</span>11</a></li>
        <li class="year"><a><span class="twenty">20</span>10</a></li>
        <li class="year"><a><span class="twenty">20</span>09</a></li>
        <li class="year"><a><span class="twenty">20</span>08</a></li>
        <li class="year"><a><span class="twenty">20</span>07</a></li>
        <li class="year"><a><span class="twenty">20</span>06</a></li>
    </nav>

<?php } ?> 
          
<div id="main" role="main" class="clearfix" data-sort="all">