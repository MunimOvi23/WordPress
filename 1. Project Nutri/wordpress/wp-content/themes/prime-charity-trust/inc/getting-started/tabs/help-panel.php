<?php
/**
 * Help Panel.
 *
 * @package Prime_Charity_Trust
 */
?>

<div id="help-panel" class="panel-left visible">

    <div class="panel-aside active">
        <h4><?php printf( esc_html__( ' VISIT FREE DOCUMENTATION', 'prime-charity-trust' )); ?></h4>
        <p><?php esc_html_e( 'Are you a newcomer to the WordPress universe? Our comprehensive and user-friendly documentation guide is designed to assist you in effortlessly building a captivating and interactive website, even if you lack any coding expertise or prior experience. Follow our step-by-step instructions to create a visually appealing and engaging online presence.', 'prime-charity-trust' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( PRIME_CHARITY_TRUST_FREE_DOC_URL ); ?>" target="_blank">
            <?php esc_html_e( 'FREE DOCUMENTATION', 'prime-charity-trust' ); ?>
        </a>
    </div>

    <div class="panel-aside " >
        <h4><?php esc_html_e( 'Review', 'prime-charity-trust' ); ?></h4>
        <p><?php printf( esc_html__( 'If you are passionate about the %1$s theme, we would love to hear your thoughts and feedback regarding our theme. Your review will be highly valuable to us as we strive to enhance and improve our theme based on the needs and preferences of our users. Your opinion matters, and we sincerely appreciate your time and effort in sharing your experience with the %1$s theme.', 'prime-charity-trust' ), PRIME_CHARITY_TRUST_THEME_NAME  ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( PRIME_CHARITY_TRUST_REVIEW_URL ); ?>" title="<?php esc_attr_e( 'Visit the Documentation', 'prime-charity-trust' ); ?>" target="_blank">
            <?php esc_html_e( 'REVIEW', 'prime-charity-trust' ); ?>
        </a>
    </div>
    
    <div class="panel-aside">
        <h4><?php esc_html_e( 'CONTACT SUPPORT', 'prime-charity-trust' ); ?></h4>
        <p><?php printf( esc_html__( 'Thank you for choosing %1$s ! We appreciate your interest in our theme and are here to assist you with any support you may need.', 'prime-charity-trust' ), PRIME_CHARITY_TRUST_THEME_NAME  ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( PRIME_CHARITY_TRUST_SUPPORT_URL ); ?>" title="<?php esc_attr_e( 'Visit the Support', 'prime-charity-trust' ); ?>" target="_blank">
            <?php esc_html_e( 'CONTACT SUPPORT', 'prime-charity-trust' ); ?>
        </a>
    </div>

    
</div>