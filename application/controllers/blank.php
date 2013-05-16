<?php  
class Bus_model extends CI_Model {
  public function __construct()
  {
     $this->load->database();
  }

  function get() {
     return $this->db->query("SELECT * from seats order by rowId, columnId desc")
             ->result_array();
  }
}
?>

<?php
 class Bus_type extends Controller
 {
   public function __construct() {
        parent::__construct();
   }
   function bus_fun()
   {
       $this->load->model('busmodel');
       $data['query'] = $this->busmodel->get();
       $this->load->view('view',$data); //You should pass value to view...
   }
 }