<?php 
/**
 * 
 * Sample implementation of the Header Login Access.
 *
	<?php
		if ( function_exists( '_depot_header_login_button' ) ) {
			_depot_header_login_button();
		}
	?>
 */


if ( ! function_exists( '_depot_header_login_button' ) ) {
	/**
	 * Header Login .
	 *
	 * Display a login button and show account and profile links.
	 *
	 * @return void
	 */
	function _depot_header_login_button() {

        if ( is_user_logged_in() ) :

            $current_user = wp_get_current_user();
            $user_email = $current_user->user_email;
            $username= $current_user->user_login;
            $myaccount_page = get_option( 'woocommerce_myaccount_page_id' );
            if ( $myaccount_page ): $myaccount_page_url = get_permalink( $myaccount_page ); endif;
            

            ?>
                <div class="login-header">
                    <div class="top user-login">
                        <a href="<?php echo $myaccount_page_url; ?>">
                            <?php echo get_avatar($user_email, 23);?>
                            <span><?php echo $username;?></span>
                            <i class="ri-arrow-down-s-fill"></i>
                        </a>
                    </div>
                    <div class="sub-menu">
                        <ul>
                            <li><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','textdomain'); ?>"><?php _e('My Account','textdomain'); ?></a></li>
                            <li><a href="<?php echo wp_logout_url(home_url($_SERVER['REQUEST_URI']));?>" title="Logout"><?php _e('Log out','textdomain'); ?></a></li>
                        </ul>
                    </div>
                </div>
            <?php

        else :

            ?>
                <div class="login-header">
                    <div class="top user-logout">
                        <a href="">
                            <span><i class="ri-user-3-line"></i></span>
                        </a>
                    </div>
                </div>
            <?php

        endif;
	}
}


/**
 * 
 * Sample implementation of the Login Form.
 *
	<?php
		if ( function_exists( '_depot_login_form' ) ) {
			_depot_login_form();
		}
	?>
 */


/**
 * Handles my AJAX Login request.
 */

add_action( 'wp_ajax_my_login_access', 'my_ajax_handler_login' );
add_action( 'wp_ajax_nopriv_my_login_access', 'my_ajax_handler_login' );

add_action( 'wp_ajax_my_register_access', 'my_ajax_handler_register' );
add_action( 'wp_ajax_nopriv_my_register_access', 'my_ajax_handler_register' );

function my_ajax_handler_login() {
	
    check_ajax_referer( 'ajax_nonce' );

    $formData= [];
    wp_parse_str($_POST['data'], $formData);

    $creds = array(
        'user_login'    => $formData['uname'],
        'user_password' => $formData['upassword'],
        'remember'      => true
    );

    $user = wp_signon( $creds, false );

    if ( is_wp_error( $user ) ) {
        echo $user->get_error_message();
    }else{
      
      echo "Loggedin"; 
      
    }

	wp_die();
}

function my_ajax_handler_register() {
	
    check_ajax_referer( 'ajax_nonce' );

    $formData= [];
    wp_parse_str($_POST['data'], $formData);

    $creds = array(
        'user_name'    => $formData['user_register_name'],
        'user_email'    => $formData['uemail'],
        'user_password' => $formData['user_register_confirm_password'],
    );

    $user = wp_create_user( $creds['user_name'], $creds['user_password'], $creds['user_email'] );

    if ( is_wp_error( $user ) ) {
        echo $user->get_error_message();
    }else{
      
      echo "Loggedin"; 
      
    }

	wp_die();
}


if ( ! function_exists( '_depot_login_form' ) ) {
	/**
	 * Header Login .
	 *
	 * Display a login button and show account and profile links.
	 *
	 * @return void
	 */
	function _depot_login_form() {

        if ( ! is_user_logged_in() ) :

            $current_user = wp_get_current_user();
            $user_email = $current_user->user_email;
            $username= $current_user->user_login;
            $myaccount_page = get_option( 'woocommerce_myaccount_page_id' );
            if ( $myaccount_page ): $myaccount_page_url = get_permalink( $myaccount_page ); endif;
            
            ?>
                <div class="login-register-form">
                    
                    <div class="login-register-content">
                        <ul class="tablist">
                            <li class="login"><a href="" class="active"> <?php _e('Login', 'textdomain'); ?></a></li>
                            <li class="register"><a href=""> <?php _e('Register', 'textdomain'); ?></a></li>
                        </ul>

                        <div class="login-form oppened">
                            <p class="message" style="text-align: center;"></p>
                            <form method='post'>
                                <input required type="text" name="uname" id="uname" class="uname" placeholder="Username or Email">
                                <input required type="password" name="upassword" id="upassword" placeholder="Password">
                                <div class="links">
                                    <div class="remember-me">
                                        <input type="checkbox" name="uremember" id="uremember">
                                        <label for="remember"> <?php _e('Remember me', 'textdomain'); ?> </label>
                                    </div>
                                    <a href="<?php echo  wp_lostpassword_url();?>" class="lost_password"> <?php _e('Lost your password?', 'textdomain'); ?> </a>
                                </div>
                                <input type="submit" value="login" class="button">
                            </form>
                        </div>

                        <div class="register-form">
                            <p class="message" style="text-align: center;"></p>
                            <form method='post' >
                                <input required type="text" name="user_register_name" id="user_register_name" class="user_register_name" placeholder="Username">
                                <input required type="email" name="uemail" id="uemail" class="uemail" placeholder="Email@Example.com">
                                <input required type="password" name="user_register_password" id="user_register_password" placeholder="Password">
                                <input required type="password" name="user_register_confirm_password" id="user_register_confirm_password" placeholder="Repeat Password">
                                
                                <input type="submit" value="register" class="button">
                            </form>
                        </div>

                    </div>
                </div>

                <script>

                    jQuery(document).ready(function($) {  

                        // **  Login Register froms  **
   
                        var loginForm= $('.login-register-form');

                        if(loginForm){
                            
                            $('.login-header .top a').click(function(e){
                            
                                e.preventDefault();
                                loginForm.css('display', 'flex');
                                console.log('hello')
                            })
                        }

                        // Login form
                        $(".login-form form").submit(function(e) { 
                            e.preventDefault();         

                            var form = $(this).serialize();

                            $.post(my_ajax_obj.ajax_url, {     

                                _ajax_nonce: my_ajax_obj.nonce, 
                                action: "my_login_access",         
                                data: form          
                                }, function(data) {         

                                    if($.trim(data)=='Loggedin'){
                                        location.reload();
                                    }else{
                                        $('.login-register-content .login-form p.message').html(data)
                                    }
                                }

                            );

                        });

                        // Register form
                        $(".register-form form").submit(function(e) { 
                            e.preventDefault();         

                            var form = $(this).serialize();
                            var password= $("input#user_register_password").val()
                            var passwordConfimation= $("input#user_register_confirm_password").val()

                            if(password!=passwordConfimation){
                                $('.login-register-content .register-form p.message').html('Both passwords must match in order to register')
                            }else{

                                $.post(my_ajax_obj.ajax_url, {     
    
                                    _ajax_nonce: my_ajax_obj.nonce, 
                                    action: "my_register_access",         
                                    data: form          
                                    }, function(data) {         
                                        console.log(data)
                                        if($.trim(data)=='Loggedin'){
                                            location.reload();
                                        }else{
                                            $('.login-register-content .register-form p.message').html(data)
                                        }
                                    }
    
                                );

                            }

                        });

                        // login form

                        $('.login-register-form .tablist li.login a').click(function(e){
                            e.preventDefault();

                            $(this).addClass('active');
                            $('.login-register-form .tablist li.register a').removeClass('active');

                            $('.login-register-form .login-form').addClass('oppened');
                            $('.login-register-form .register-form').removeClass('oppened');

                        })

                        $('.login-register-form .tablist li.register a').click(function(e){
                            e.preventDefault();

                            $(this).addClass('active');
                            $('.login-register-form .tablist li.login a').removeClass('active');

                            $('.login-register-form .register-form').addClass('oppened');
                            $('.login-register-form .login-form').removeClass('oppened');

                        })


                        // hide login form 

                        $(document).click(function(e) 
                        {
                            var container = $(".login-register-content");
                            var loginHeader= $('header .login-header .top a');

                            if(loginForm){

                                if (!loginHeader.is(e.target) && loginHeader.has(e.target).length === 0 && !container.is(e.target) && container.has(e.target).length === 0) {

                                    $('.login-register-form').hide();
                                }

                            }
                        });

                    });

                </script>
                
            <?php

        endif;
	}
}
