<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<link type="text/css" href="/wp-content/themes/silesia/sprite.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'silesia' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php 
  $t_show_slideshow = nattywp_get_option("t_show_slideshow");
  $t_scroll_pages = nattywp_get_option("t_scroll_pages");
  $t_hide_tagline = nattywp_get_option("t_hide_tagline");
  $t_hide_social = nattywp_get_option("t_hide_social");
  $t_twitterurl = nattywp_get_option("t_twitterurl");
  $t_facebookurl = nattywp_get_option("t_facebookurl");
  $t_feedburnerurl = nattywp_get_option("t_feedburnerurl");
?>
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>


<div id="main-wrapper">
<div id="cnt" class="wrapper">
  <div class="top">
    <?php 
      if(nattywp_get_option("t_head_nav") == 'nav') {
        silesia_show_navigation ('primary', 'silesia_show_pagemenu');
      } else {
        silesia_breadcrumbs();
      } ?>
	<form id="searchforma" class="search" action="http://planetlibre.es/" method="get">
<input id="edit-search-theme-form-keys" class="search-input png_crop" type="text" name="s" onclick="value=''" onblur="if (!value)value='Search'" value="Search" title="search">
<input class="search-submit png_crop" type="image" src="http://planetlibre.es/wp-content/themes/silesia/images/submit.png" value="" name="op" title="Search" alt="Search">
</form>
 <!-- <div class="clear"></div> -->           
  </div> <!-- END top -->
<div id="pseudomenu"></div>

<?php
  if ($t_show_slideshow == 'hide') {}
  elseif ($t_show_slideshow == 'pag' || !isset($t_show_slideshow) || $t_show_slideshow == 'no') { // Display Slideshow ?>
  <div class="head-img">
  <div class="slideshow-bg module">
    <a id="left-arrow" href="#"></a>
    <a id="right-arrow" href="#"></a>
    <div class="slideshow">
      <?php if ($t_scroll_pages == 'no' || $t_scroll_pages[0] == 'no' || $t_scroll_pages[0] == ''){
        echo '<div><img src="'.get_template_directory_uri().'/images/header/header.jpg" alt="Header" /></div>';
        echo '<div><img src="'.get_template_directory_uri().'/images/header/headers.jpg" alt="Header" /></div>';
      } else {
        foreach ($t_scroll_pages as $ad_pgs ) { 
         query_posts('page_id='.$ad_pgs ); while (have_posts()) : the_post(); ?>
         <div><?php if ( has_post_thumbnail() ) {the_post_thumbnail('slide-thumb');} // 970x225 ?></div>
         <?php endwhile; wp_reset_query();
        } //end foreach 
      } ?>  
    </div><!-- END Slideshow -->
  </div> <!-- END slideshow-bg -->
  </div>
  <?php } else { // Display Header Image
    $header_image = get_header_image();
    if ( !empty( $header_image ) ) : ?>
      <div class="head-img">
      <img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="Header" />
      </div>
    <?php endif;
  } // End if ?>
<!-- END Header -->