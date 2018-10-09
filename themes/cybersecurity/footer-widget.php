<?php

if ( is_active_sidebar( 'cyber-security-footer-1' ) || is_active_sidebar( 'cyber-security-footer-2' ) || is_active_sidebar( 'cyber-security-footer-3' ) || is_active_sidebar( 'cyber-security-footer-4' ) || is_active_sidebar( 'cyber-security-footer-5' ) ) {?>
        <div id="footer-widget" class="row m-0">
            <div class="container">
                <div class="row">
                    <?php if ( is_active_sidebar( 'cyber-security-footer-1' )) : ?>
                        <div class="col-12 col-md-20"><?php dynamic_sidebar( 'cyber-security-footer-1' ); ?></div>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( 'cyber-security-footer-2' )) : ?>
                        <div class="col-12 col-md-20"><?php dynamic_sidebar( 'cyber-security-footer-2' ); ?></div>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( 'cyber-security-footer-3' )) : ?>
                        <div class="col-12 col-md-20"><?php dynamic_sidebar( 'cyber-security-footer-3' ); ?></div>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( 'cyber-security-footer-4' )) : ?>
                        <div class="col-12 col-md-20"><?php dynamic_sidebar( 'cyber-security-footer-4' ); ?></div>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( 'cyber-security-footer-5' )) : ?>
                        <div class="col-12 col-md-20"><?php dynamic_sidebar( 'cyber-security-footer-5' ); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

<?php }