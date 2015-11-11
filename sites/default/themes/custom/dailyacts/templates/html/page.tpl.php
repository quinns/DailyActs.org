<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
 $theme_path = '/'.path_to_theme().'/';

// dpm($node, 'node');
 ?>

<?php if (!empty($secondary_nav)): ?>
<div class="container supernav">
	<div class="wrapper"><?php print render($secondary_nav); ?></div>
</div>
<?php endif; ?>
<div class="navigation-wrapper">
  <div class="container primary-nav">

    <div class="navbar-header">
      <?php if ($logo): ?>
      <a class="logo navbar-btn pull-left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
      </a>
      <?php endif; ?>

      <?php if (!empty($site_name)): ?>
      <a class="name navbar-brand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
      <?php endif; ?>

      <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
			Menu
			<!--
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			-->
      </button>
     </div>

      
<header id="navbar" role="banner" class="<?php print $navbar_classes; ?>">
	
	


    <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
      <div class="navbar-collapse collapse">
        <nav role="navigation">
		  <?php if (!empty($primary_nav)): ?>
			<div class="primary-nav-wrapper"> 
			    <?php print render($primary_nav); ?>
			</div>	
		  <?php endif; ?>
          <?php if (!empty($page['navigation'])): ?>
            <?php print render($page['navigation']); ?>
          <?php endif; ?>
        </nav>
      </div>
    <?php endif; ?>
  </div>
</header>
</div>
<!-- <div class="main-container container"> -->


<div id="site-body">
	
	
<!-- CAROUSEL -->
<?php if ($is_front) {
	$slides = entity_load('bean');
	ksort($slides);
	foreach($slides as $key => $value){
		if($slides[$key]->field_carousel_set[LANGUAGE_NONE][0]['value'] == 'Front page'){
			$slide_set[] = $slides[$key];
		}
	}
?>
<div id="front-carousel" class="carousel slide" data-ride="carousel" data-interval="0">
  <!-- Indicators -->
  <ol class="carousel-indicators">
	<?php
	if(count($slide_set) > 1){
		foreach($slide_set as $key => $value){
			if($key == 0){
				$active = ' class="active" ';
			} else {
				$active = null;
			}
				echo '<li data-target="#front-carousel" data-slide-to="'.$key.'" '.$active.'></li> ';
		}
	}
	?>
  </ol>
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
  		<?php 
		foreach($slide_set as $key => $value){ 
				$slide['image'] = file_create_url($value->field_carousel_image[LANGUAGE_NONE][0]['uri']);
				$slide['caption1'] = $value->field_caption_1[LANGUAGE_NONE][0]['safe_value'];
				$slide['caption2'] = $value->field_caption_2[LANGUAGE_NONE][0]['safe_value'];
				$slide['button_set'] = $value->field_button_set[LANGUAGE_NONE][0]['safe_value'];
				$slide['headline'] = $value->title;
				if($key == 0){
					$active = ' active ';
				} else{
					$active = null;
				}
		?>
		    <div class="item <?php echo $active; ?> slide-<?php echo $key; ?>" style="background-color: #000;">
			<!-- <img src="<?php echo $slide['image']; ?>" class="slide-art"> -->
			      <div class="carousel-caption">
			        <h3 class="caption-1"><?php echo $slide['caption1']; ?></h3>
			        <h1><?php echo $slide['headline']; ?></h1>
			        <h3 class="caption-2"><?php echo $slide['caption2']; ?></h3>
					<div class="row button-set">
						<?php echo $slide['button_set']; ?>
					</div>
			      </div>
			<div class="slide-art" class="slide-art" style="  background-image: url(<?php echo $slide['image']; ?>); "></div>


		      
		      </div>
		    
		<? } ?>    
    
    
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#front-carousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#front-carousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<? } ?>
<!-- END CAROUSEL -->





  <header role="banner" id="page-header">
    <?php if (!empty($site_slogan)): ?>
      <p class="lead"><?php print $site_slogan; ?></p>
    <?php endif; ?>

    <?php print render($page['header']); ?>
    
    
<!--
    <div class="interior-header-image">
        <h1 class="page-header"><span><?php print $title; ?></span></h1>
    </div>
-->
    

<!-- this background scrolly image should be made dynamic -->

<?php
	// 	try to load a custom header
	$site_section = taxonomy_term_load($node->field_site_section['und'][0]['tid']);

	$header_image = $site_section->field_header_image['und'][0]['uri'];
// 	$header_image = $node->field_site_section['und'][0]['taxonomy_term']->field_header_image['und'][0]['uri'];

	if(!empty($header_image)){
		$header_image = file_create_url($header_image);
	} else{
		$header_image = $theme_path.'images/mountains.jpg';
	}

/*
	if(empty($header_image)){ // if none found, use the default
		$header_image = $theme_path.'images/mountains.jpg';
	}
*/
?>


<div class="interior-header-image" data-parallax="scroll" data-image-src="<?php echo $header_image; ?>">
<!-- <div class="interior-header-image"> -->
	       <?php if (!empty($site_section)) { ?>
		        <h1 class="section-header"><div class="masking-tape"><span><?php print $site_section->name; ?></span></div></h1>
	       <? } ?>
	       
</div>

    
  </header> <!-- /#page-header -->



	<?php if (!empty($messages)){ print '<div class="container">'.$messages.'</div>'; } ?>

	<?php if (!empty($page['front_features'])) { ?>
	        <div class="front-features"><?php print render($page['front_features']); ?></div>
	<?php }	?>
	
	
	
	
	      <?php if (!empty($page['highlighted'])): ?>
	        <div class="highlighted"><?php print render($page['highlighted']); ?></div>
	      <?php endif; ?>
	
	<div class="main-container container">
		
	  <div class="row">
	
	    <?php if (!empty($page['sidebar_first'])): ?>
	      <aside class="col-sm-3" role="complementary">
	        <?php print render($page['sidebar_first']); ?>
	      </aside>  <!-- /#sidebar-first -->
	    <?php endif; ?>
	
	
	
	    <section<?php print $content_column_class; ?>>
		    
		    
	
	      <?php if (!empty($breadcrumb)): print $breadcrumb; endif;?>
	      <a id="main-content"></a>
	      <?php print render($title_prefix); ?>
	      <?php if (!empty($title)): ?>
	        <h1 class="page-header"><?php print $title; ?></h1>
	      <?php endif; ?>
	      <?php print render($title_suffix); ?>
<!-- 	      <?php print $messages; ?> -->
	      <?php if (!empty($tabs)): ?>
	        <?php print render($tabs); ?>
	      <?php endif; ?>
	      <?php if (!empty($page['help'])): ?>
	        <?php print render($page['help']); ?>
	      <?php endif; ?>
	      <?php if (!empty($action_links)): ?>
	        <ul class="action-links"><?php print render($action_links); ?></ul>
	      <?php endif; ?>
	      <?php print render($page['content']); ?>
	    </section>
	
	    <?php if (!empty($page['sidebar_second'])): ?>
	      <aside class="col-sm-3" role="complementary">
	        <?php print render($page['sidebar_second']); ?>
	      </aside>  <!-- /#sidebar-second -->
	    <?php endif; ?>
	
	  </div>
	</div>
	<div class="footer-wrapper">
		<footer class="footer container">
		  <?php print render($page['footer']); ?>
		</footer>
	</div>
	<div class="subfooter container"><?php echo render($page['sub_footer']); ?>
	<?php 
		echo l('<img src="'.$theme_path.'images/WIMPgives-logo.png">', 'http://www.wimpgives.com', array('html' => true, 'attributes' => array('title' => t('This website was designed and built for free by WIMPgives'), 'target' => '_blank', 'class' => array('wimpgives')))); ?>
	Site donated by <?php echo l(t('WIMPgives'), 'http://www.wimpgives.com', array('attributes' => array('target' => '_blank')));
	 ?>	
	</div>
</div>


