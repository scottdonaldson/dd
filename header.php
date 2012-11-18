<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php wp_title(''); ?></title>
	<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	
    <link rel="icon" type="image/png" href="<?php echo bloginfo('template_url'); ?>/images/favicon.ico" />
    
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url') ?>" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/css/dugoff.css" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/css/media.css" />

	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    
	<?php wp_head(); ?>    
    
</head>

<body <?php body_class(); ?>>

<div id="container" class="clearfix">
    <header>
    
    <?php if (is_home()) { ?>
    	<h1 id="site-title"><a href="<?php echo home_url(); ?>" rel="home" title="Daniel DuGoff">Daniel DuGoff</a></h1>
    <?php } else { ?>
    	<h3 id="site-title"><a href="<?php echo home_url(); ?>" rel="home" title="Daniel DuGoff">Daniel DuGoff</a></h3>
    <?php } ?>
    <div class="topnav">
        <span><a href="<?php echo home_url(); ?>" rel="home" title="Daniel DuGoff">Work</a></span>
        <span><a href="<?php echo home_url(); ?>/?page_id=83">CV</a></span>
        <span>
        <?php query_posts('posts_per_page=1'); while (have_posts()) : the_post(); ?>
        <a href="<?php the_permalink(); ?>">Log</a>
        <?php endwhile; wp_reset_query(); ?>
        </span>    
    </div>
    
    </header>          
    
    <?php if (is_page('1916')) { 
		      get_template_part('nav'); 
		  
		  } elseif(is_single() && !is_singular('project') || is_page('5631')) { ?>
		  
          <nav class="order borderbox">
          	  <a href="<?php echo home_url(); ?>/?page_id=3345">archive view</a>
              
              <br /><br />
              
              <div class="blognav">
              	<span class="next1"><a>&larr;</a></span>
                <span class="prev1"><a>&rarr;</a></span>
              </div>
              
          </nav>
	
    <?php } ?>
          
    
    <div id="main" role="main" class="clearfix borderbox">