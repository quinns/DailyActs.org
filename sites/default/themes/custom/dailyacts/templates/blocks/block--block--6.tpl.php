<?php

/**
 * @file
 * Default theme implementation to display a block.
 *
 * Available variables:
 * - $block->subject: Block title.
 * - $content: Block content.
 * - $block->module: Module that generated the block.
 * - $block->delta: An ID for the block, unique within each module.
 * - $block->region: The block region embedding the current block.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - block: The current template type, i.e., "theming hook".
 *   - block-[module]: The module generating the block. For example, the user
 *     module is responsible for handling the default user navigation block. In
 *     that case the class would be 'block-user'.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Helper variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $block_zebra: Outputs 'odd' and 'even' dependent on each block region.
 * - $zebra: Same output as $block_zebra but independent of any block region.
 * - $block_id: Counter dependent on each block region.
 * - $id: Same output as $block_id but independent of any block region.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 * - $block_html_id: A valid HTML ID and guaranteed unique.
 *
 * @see template_preprocess()
 * @see template_preprocess_block()
 * @see template_process()
 *
 * @ingroup themeable
 */
?>
<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
<?php if ($block->subject): ?>
  <h2<?php print $title_attributes; ?>><?php print $block->subject ?></h2>
<?php endif;?>
  <?php print render($title_suffix); ?>

  <div class="content"<?php print $content_attributes; ?>>
    <?php //print $content ?>
    <div class="row">
	    <div class="col-md-3 col-sm-6 get-involved">
		    <h4><span class="hi">Get</span> involved</h4>
			<?php echo l('<i class="fa fa-heart"></i> '.t('Donate'), 'node/36', array('attributes' => array('class' => array('btn', 'btn-primary')), 'html' => true)); ?>
			<?php echo l(t('Volunteer'), 'node/43', array('attributes' => array('class' => array('btn', 'btn-primary')))); ?>
	    </div>
	    <div class="col-md-3 col-sm-6 recent-blogs">
		    <h4><span class="hi">Recent</span> blogs</h4>
		    <?php echo views_embed_view('latest_blog_posts', 'block_1').' '.l(t('More blogs'), 'blog'); ?>
	    </div>
	    <div class="col-md-3 col-sm-6 news-signup">
		    <h4><span class="hi">Newsletter</span> signup</h4>
			<?php		    
			    $block = module_invoke('mailchimp_signup', 'block_view', 'dailyacts_org_mailing_list');
				print render($block['content']);
			?>
	    </div>
	    <div class="col-md-3 col-sm-6 contact-us">
		    <h4><span class="hi">Contact</span> us</h4>
		    <div class="daily-acts-logo"></div>
		    PO Box 293<br>
		    Petaluma CA 94953<br>
			(707) 789-9664<br>
			<?php echo l(t('Contact'), 'contact'); ?>
	    </div>
    </div>    
  </div>
</div>
