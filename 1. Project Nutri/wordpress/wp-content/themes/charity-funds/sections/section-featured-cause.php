<?php 
/**
 * Template part for displaying Featured Courses Section
 *
 * @package Charity Funds
 */
    $featured_services_section_title      = prime_charity_trust_get_option( 'featured_services_section_title' );
    $number_of_featured_services_items     = prime_charity_trust_get_option( 'number_of_featured_services_items' );

    for( $i=1; $i<=$number_of_featured_services_items; $i++ ) :
        $featured_services_posts[] = prime_charity_trust_get_option( 'featured_services_post_'.$i );
    endfor;
    ?>
    <?php if( !empty($featured_services_section_title) ):?>
    <div class="section-title">
        <h4><?php echo esc_html($featured_services_section_title);?></h4>
    </div>
    <?php endif;?>
    <div id="service-section" class="section-content">
        <?php $args = array (
            'post_type'     => 'post',
            'posts_per_page' => absint( $number_of_featured_services_items ),
            'post__in'      => $featured_services_posts,
            'orderby'       =>'post__in',
            'ignore_sticky_posts' => true,
        );?>
        <div class="owl-carousel">
            <?php
            $loop = new WP_Query($args);
            if ( $loop->have_posts() ) :
            $i=-1; $j=0; 
                while ($loop->have_posts()) : $loop->the_post(); $i++; $j++; ?>
                
                <article style="padding: 0 15px;">
                    <div class="featured-service-item">
                        <div class="entry-container">
                            <div class="content-image">
                                <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                                <div class="image-container" style="background-image: url(<?php echo esc_attr($image[0]); ?>);">
                                
                                </div>
                                <?php endif; ?>
                                <div class="cause-tags">
                                    <?php
                                    if( $tags = get_the_tags() ) {
                                        foreach( $tags as $content_tag ) {
                                            $sep = ( $content_tag === end( $tags ) ) ? '' : ' ';
                                            echo '<a href="' . esc_url(get_term_link( $content_tag, $content_tag->taxonomy )) . '">' . esc_html($content_tag->name) . '</a>' . esc_html($sep);
                                        }
                                    } ?>
                                </div>
                                <?php if( get_post_meta($post->ID, 'prime_charity_trust_raised', true) || get_post_meta($post->ID, 'prime_charity_trust_goal', true) ) {?>
                                    <div class="fund-box">
                                        <?php if( get_post_meta($post->ID, 'prime_charity_trust_raised', true) ) {?>
                                            <div class="raised-box">
                                                <span class="first-word"><?php esc_html_e('Raised','charity-funds'); ?></span>
                                                <span><?php if ( class_exists( 'WooCommerce' ) ) { echo esc_html(get_woocommerce_currency_symbol()); } ?><?php echo esc_html(get_post_meta($post->ID,'prime_charity_trust_raised',true)); ?></span>
                                            </div>
                                        <?php }?>
                                        <?php if( get_post_meta($post->ID, 'prime_charity_trust_goal', true) ) {?>
                                            <div class="goal-box">
                                                <span class="first-word"><?php esc_html_e('Goal','charity-funds'); ?></span>
                                                <span> <?php if ( class_exists( 'WooCommerce' ) ) { echo esc_html(get_woocommerce_currency_symbol()); } ?><?php echo esc_html(get_post_meta($post->ID,'prime_charity_trust_goal',true)); ?></span>
                                            </div>
                                        <?php }?>
                                        <?php $raised_value = get_post_meta($post->ID, 'prime_charity_trust_raised', true);
                                        $goal_value = get_post_meta($post->ID, 'prime_charity_trust_goal', true);
                                        if ($raised_value != '' && $goal_value != ''){
                                            $percent_value = round(($raised_value / $goal_value) * 100); ?>
                                            <div class="donate-slider">
                                                <div class="slide-inner" style="width: <?php echo esc_attr($percent_value); echo esc_html('%', 'charity-funds'); ?>"></div>
                                            </div>
                                        <?php }?>
                                    </div>
                                <?php }?>
                            </div>
                            <div class="content-details">
                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                </header>
                                <div class="entry-content">
                                    <?php
                                        $excerpt = prime_charity_trust_the_excerpt( 20 );
                                        echo wp_kses_post( wpautop( $excerpt ) );
                                    ?>
                                </div><!-- .entry-content -->
                                <div class="button-content">
                                    <a href="<?php the_permalink(); ?>" class="btn">
                                        <?php esc_html_e('Know More','charity-funds'); ?> <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div><!-- .button-content -->
                            </div>
                        </div><!-- .entry-container -->
                    </div><!-- .featured-service-item -->
                </article>

                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </div><!-- .section-content -->