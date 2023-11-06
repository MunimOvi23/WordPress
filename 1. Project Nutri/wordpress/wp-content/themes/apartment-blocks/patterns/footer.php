<?php
/**
 * Title: Footer
 * Slug: apartment-blocks/footer
 * Categories: apartment-blocks, footer
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"60px","right":"20px","bottom":"60px","left":"20px"}}},"backgroundColor":"heading","textColor":"white","layout":{"type":"constrained","contentSize":"90%"},"fontSize":"small"} -->
<div class="wp-block-group has-white-color has-heading-background-color has-text-color has-background has-small-font-size" style="padding-top:60px;padding-right:20px;padding-bottom:60px;padding-left:20px"><!-- wp:group {"align":"wide","style":{"elements":{"link":{"color":{"text":"var:preset|color|Background"}}},"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"textColor":"Background","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide has-background-color has-text-color has-link-color" style="margin-top:0px;margin-bottom:0px"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}}} -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:site-logo /-->

<!-- wp:site-title {"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white","fontSize":"extra-large"} /--></div>
<!-- /wp:group -->

<!-- wp:paragraph {"align":"left"} -->
<p class="has-text-align-left"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','apartment-blocks'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:image {"id":1993,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/telephone.png'); ?>" alt="" class="wp-image-1993"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p>(+099)-123-456-789</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:image {"id":1990,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/envelope.png'); ?>" alt="" class="wp-image-1990"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph -->
<p><a href="mailto:example@example.com"><?php esc_html_e('example@example.com','apartment-blocks'); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:social-links {"iconColor":"white","iconColorValue":"#ffffff","iconBackgroundColor":"primary","iconBackgroundColorValue":"#de9e53","size":"has-normal-icon-size","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"className":"is-style-default"} -->
<ul class="wp-block-social-links has-normal-icon-size has-icon-color has-icon-background-color is-style-default"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"twitter"} /-->

<!-- wp:social-link {"url":"#","service":"instagram"} /-->

<!-- wp:social-link {"url":"#","service":"linkedin"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":5,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","letterSpacing":"1px"}},"textColor":"white"} -->
<h5 class="wp-block-heading has-white-color has-text-color" style="font-style:normal;font-weight:600;letter-spacing:1px"><?php esc_html_e('Recent Posts','apartment-blocks'); ?></h5>
<!-- /wp:heading -->

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"10px"}}},"backgroundColor":"primary","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-primary-color has-alpha-channel-opacity has-primary-background-color has-background is-style-wide" style="margin-top:10px"/>
<!-- /wp:separator -->

<!-- wp:query {"queryId":22,"query":{"perPage":"3","pages":"1","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"default","columnCount":3}} -->
<!-- wp:post-title {"level":6,"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"spacing":{"margin":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}}},"textColor":"white","fontSize":"small"} /-->

<!-- wp:post-excerpt {"showMoreOnNewLine":false,"style":{"spacing":{"margin":{"top":"5px","right":"0px","bottom":"0px","left":"0px"}}},"className":"footer-post-excerpt","fontSize":"extra-small"} /-->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p><?php esc_html_e('There is no posts to display','apartment-blocks'); ?></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"level":5,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","letterSpacing":"1px"}},"textColor":"white"} -->
<h5 class="wp-block-heading has-white-color has-text-color" style="font-style:normal;font-weight:600;letter-spacing:1px"><?php esc_html_e('Quick Links','apartment-blocks'); ?></h5>
<!-- /wp:heading -->

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"10px"}}},"backgroundColor":"primary","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-primary-color has-alpha-channel-opacity has-primary-background-color has-background is-style-wide" style="margin-top:10px"/>
<!-- /wp:separator -->

<!-- wp:navigation-link {"label":"Home","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"About Us","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Services","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Gallery","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Projects","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Blogs","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Appartments","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Contact Us","type":"","url":"#","kind":"custom","isTopLevelLink":true} /--></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":5,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","letterSpacing":"1px"}},"textColor":"white"} -->
<h5 class="wp-block-heading has-white-color has-text-color" style="font-style:normal;font-weight:600;letter-spacing:1px"><?php esc_html_e('Gallery','apartment-blocks'); ?></h5>
<!-- /wp:heading -->

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"10px"}}},"backgroundColor":"primary","className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-primary-color has-alpha-channel-opacity has-primary-background-color has-background is-style-wide" style="margin-top:10px"/>
<!-- /wp:separator -->

<!-- wp:gallery {"linkTo":"none"} -->
<figure class="wp-block-gallery has-nested-images columns-default is-cropped"><!-- wp:image {"id":15,"sizeSlug":"thumbnail","linkDestination":"none"} -->
<figure class="wp-block-image size-thumbnail"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/gallery1.png'); ?>" alt="" class="wp-image-15"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":16,"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/gallery2.png'); ?>" alt="" class="wp-image-16"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":17,"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/gallery3.png'); ?>" alt="" class="wp-image-17"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":18,"sizeSlug":"thumbnail","linkDestination":"none"} -->
<figure class="wp-block-image size-thumbnail"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/gallery4.png'); ?>" alt="" class="wp-image-18"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":19,"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/gallery5.png'); ?>" alt="" class="wp-image-19"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":20,"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/gallery6.png'); ?>" alt="" class="wp-image-20"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":22,"sizeSlug":"thumbnail","linkDestination":"none"} -->
<figure class="wp-block-image size-thumbnail"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/gallery7.png'); ?>" alt="" class="wp-image-22"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":23,"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/gallery8.png'); ?>" alt="" class="wp-image-23"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":24,"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/gallery9.png'); ?>" alt="" class="wp-image-24"/></figure>
<!-- /wp:image --></figure>
<!-- /wp:gallery --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"20px","right":"20px","bottom":"20px","left":"20px"}}},"backgroundColor":"primary","textColor":"white","layout":{"type":"constrained","contentSize":"90%"}} -->
<div class="wp-block-group has-white-color has-primary-background-color has-text-color has-background" style="padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px"><!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"textColor":"Background"} -->
<p class="has-background-color has-text-color"><?php esc_html_e('© Copyright 2023. All Rights Reserved.','apartment-blocks'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|Background"}}}},"textColor":"Background"} -->
<p class="has-background-color has-text-color has-link-color"><?php esc_html_e('Proudly powered by','apartment-blocks'); ?> <a rel="noreferrer noopener" href="https://www.ovationthemes.com/" target="_blank"><?php esc_html_e('Ovation Themes','apartment-blocks'); ?></a> <?php esc_html_e('and','apartment-blocks'); ?> <a href="https://wordpress.org"><?php esc_html_e('WordPress','apartment-blocks'); ?></a>.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->