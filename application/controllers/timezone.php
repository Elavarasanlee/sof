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
        $post_tz = $this->input->post('timezones');
        $timezone = !empty($post_tz) ? $post_tz : 'UTC';
        $data['isdef_timezone'] = !empty($post_tz) ? timezones($post_tz) : FALSE;
        $data['tz_select_options'] = array('name'=>'tz-dst','id'=>'tz-dst','value'=>'TRUE','checked'=>FALSE);
        $time = now();
        $daylight_saving = !empty($_POST['tz-dst']) ? TRUE : FALSE;
        $data['gmt_to_local'] = gmt_to_local($time,$timezone,$daylight_saving);
        $data['datestring'] = "%Y-%m-%d %h:%i:%s %a";
        $this->load->view('tz_view',$data);
    }
    
    public function test() {
        $test = $this->input->get('hi');  echo 'hi '.$test.'<br/>';
        $this->load->view('test');
    }
}
?>
