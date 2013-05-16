<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of page_model
 *
 * @author User
 */
class Page_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function fetch_records($limit,$start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('page');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    
    public function record_count() {
        return 40;
    }
    
    public function insert_values($data) {
        for($i=0;$i<count($data);$i++)
            $this->db->insert('page',$data[$i]);
        return 1;
    }
}
?>
