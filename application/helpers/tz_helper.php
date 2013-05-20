<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of tz_helper.php
 *
 * @author Elavarasan Lee
 */
if(!function_exists('get_time')) {
    function get_time() {
        $CI =& get_instance();
        $def_format = 'Y-m-d H:i:s';
        $time_zone = !empty($CI->session->userdata('def_tz')) ? $CI->session->userdata('def_tz') : 'UTC';
        
    }
}
?>
