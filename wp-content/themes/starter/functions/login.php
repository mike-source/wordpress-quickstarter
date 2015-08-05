<?php

/**
 * Custom WP Admin login styling
 */
class Login {
    public function __construct() {
        add_action('login_head',        array($this, 'customCss'));
        add_filter('login_headerurl',   array($this, 'logoUrl'));
        add_filter('login_headertitle', array($this, 'logoTitle'));
    }

    public function customCss() {
        ?>
        <style>
            body.login {
                background: #000;
            }
            #login h1 a {
                background: url(<?php echo get_stylesheet_directory_uri() . '/assets/img/logo.png'?>) center no-repeat;
                height: 72px;
                width: 235px;
            }

            .login form {
                -webkit-box-shadow: none;
                   -moz-box-shadow: none;
                        box-shadow: none;
                -webkit-border-radius: 0;
                   -moz-border-radius: 0;
                        border-radius: 0;
            }
            .login #nav,
            .login #backtoblog {
                text-shadow: none;
            }
            .login #nav a,
            .login #backtoblog a {
                color: #FFF !important;
            }
            .login #nav a:hover,
            .login #backtoblog a:hover {
                color: #dfdf00 !important;
            }
            .wp-core-ui .button-primary,
            .wp-core-ui .button-primary:hover,
            .wp-core-ui .button-primary:focus {
                color: #000;
                background: #dfdf00;
                border: 0;
                box-shadow: none;
            }
            .wp-core-ui .button-primary:active {
                color: #FFF;
                background: #222;
                border: 0;
                box-shadow: none;
            }
        </style>
        <?php
    }

    public function logoUrl() {
        return site_url();
    }

    public function logoTitle() {
        return get_option('blogname');
    }
}
new Login;
