<?php
    // Add the info to the email
    function wpshore_wpcf7_before_send_mail($array) {
        global $wpdb;
        if(wpautop($array['body']) == $array['body']) // The email is of HTML type
            $lineBreak = "</p><br/>";
        else
            $lineBreak = "</p>\n";
        $trackingInfo .= '<p><p></p><p></p>-- <b>Tracking Info</b> --' . $lineBreak;
        $trackingInfo .= '<p>URL điền form: ' . $_SERVER['HTTP_REFERER'] . $lineBreak;
        if (isset ($_SESSION['OriginalRef']) )
            $trackingInfo .= '<p>Người dùng đến từ trang: ' . $_SESSION['OriginalRef'] . $lineBreak;
        // if (isset ($_SESSION['LandingPage']) )
        // 	$trackingInfo .= '<p>Trang đích trước khi điền form: ' . $_SESSION['LandingPage'] . $lineBreak;
        if ( isset ($_SERVER["REMOTE_ADDR"]) )
        $trackingInfo .= '<p>IP người dùng: ' . $_SERVER["REMOTE_ADDR"] . $lineBreak;
        if ( isset ($_SERVER["HTTP_X_FORWARDED_FOR"]))
            $trackingInfo .= '<p>User\'s Proxy Server IP: ' . $_SERVER["HTTP_X_FORWARDED_FOR"] . $lineBreak . $lineBreak;
        if ( isset ($_SERVER["HTTP_USER_AGENT"]) )
            $trackingInfo .= '<p>Thông tin trình duyệt: ' . $_SERVER["HTTP_USER_AGENT"] . $lineBreak;
        $array['body'] = str_replace('[tracking-info]', $trackingInfo, $array['body']);
        return $array;
    }
    add_filter('wpcf7_mail_components', 'wpshore_wpcf7_before_send_mail');
    // Original Referrer 
    function wpshore_set_session_values() 
    {
        if (!headers_sent()) {
            // Start session if not already started
            if (session_status() === PHP_SESSION_NONE) {
                @session_start();
            }
        }
        if (!isset($_SESSION['OriginalRef'])) 
        {
            if(isset($_SERVER['HTTP_REFERER'])) {
                $_SESSION['OriginalRef'] = $_SERVER['HTTP_REFERER']; 
            }
        }
        if (!isset($_SESSION['LandingPage'])) 
        {
            $_SESSION['LandingPage'] = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]; 
        }
    }
    add_action('plugins_loaded', 'wpshore_set_session_values');
