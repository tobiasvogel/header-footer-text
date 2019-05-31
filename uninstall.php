<?php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

delete_option( 'theme_footer_text' );
delete_option( 'theme_header_text' );
