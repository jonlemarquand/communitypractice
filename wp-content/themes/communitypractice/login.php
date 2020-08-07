if(isset($_POST['login_Sbumit'])) {
	$creds                  = array();
	$creds['user_login']    = stripslashes( trim( $_POST['userName'] ) );
	$creds['user_password'] = stripslashes( trim( $_POST['passWord'] ) );
	$creds['remember']      = isset( $_POST['rememberMe'] ) ? sanitize_text_field( $_POST['rememberMe'] ) : '';
	$redirect_to            = esc_url_raw( $_POST['redirect_to'] );
	$secure_cookie          = null;
		
	if($redirect_to == '')
		$redirect_to= get_site_url(). '/' ; 
		
		if ( ! force_ssl_admin() ) {
			$user = is_email( $creds['user_login'] ) ? get_user_by( 'email', $creds['user_login'] ) : get_user_by( 'login', sanitize_user( $creds['user_login'] ) );

		if ( $user && get_user_option( 'use_ssl', $user->ID ) ) {
			$secure_cookie = true;
			force_ssl_admin( true );
		}
	}

	if ( force_ssl_admin() ) {
		$secure_cookie = true;
	}

	if ( is_null( $secure_cookie ) && force_ssl_login() ) {
		$secure_cookie = false;
	}

	$user = wp_signon( $creds, $secure_cookie );

	if ( $secure_cookie && strstr( $redirect_to, 'wp-admin' ) ) {
		$redirect_to = str_replace( 'http:', 'https:', $redirect_to );
	}

	if ( ! is_wp_error( $user ) ) {
		wp_safe_redirect( $redirect_to );			
	} else {			
		if ( $user->errors ) {
			$errors['invalid_user'] = __('<strong>ERROR</strong>: Invalid user or password.'); 
		} else {
			$errors['invalid_user_credentials'] = __( 'Please enter your username and password to login.', 'kvcodes' );
		}
	}		 
}