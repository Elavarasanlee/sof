<?php
/**
 * Description of paging
 *
 * @author User
 */
class Paging extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->load->model('page_model');
        $this->load->library('pagination');
        $config["base_url"] = base_url() . "1/paging/";
        $config["total_rows"] = $this->page_model->record_count();
        $config["per_page"] = 5;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["results"] = $this->page_model->fetch_records($config["per_page"], $page);
        echo $this->pagination->create_links();
    }
}

?>
