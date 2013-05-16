<?php
/**
 * Description of timezone
 *
 * @author Elavarasan Lee
 */
class Timezone extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('date','html','form'));
    }
    
    public function index() {
        $timezone = $this->input->post('timezones') ? $this->input->post('timezones') : 'UTC';
        $data['isdef-timezone'] = $this->input->post('timezones') ? TRUE : FALSE;
        $time = now();
        $daylight_saving = !empty($_POST['tz-dst']) ? TRUE : FALSE;
        $data['gmt_to_local'] = gmt_to_local($time,$timezone,$daylight_saving);
        $data['datestring'] = "%Y-%m-%d %h:%i:%s %a";
        $this->load->view('tz_view',$data);
    }
}
?>
