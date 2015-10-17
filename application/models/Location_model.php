<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Location_model extends CI_Model {
	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}
	
	/**
	 * create_user function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @param mixed $email
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function create_location($title) {
		
		$data = array(
                        'name'   => $title
		);
		
		return $this->db->insert('location', $data);
		
	}
        
        public function get_location($id, $perpage, $segment) {
		 if ($id === 0)
            { 
                if($perpage =='' || $segment ==''){
                
                    $this->db->order_by('name', 'ASC');
	                $query = $this->db->get('location'); 
	                //print_r($this->db->last_query());
	                return $query->result_array();

	                
                }else{
                
	                $this->db->order_by('name', 'ASC');
	                $query = $this->db->get('location', $perpage, $segment); 
	                //print_r($this->db->last_query());
	                return $query->result_array();
                }
            }
            $query = $this->db->get_where('location', array('id' => $id));
            return $query->row_array();

	}
        
        public function delete_location($id) {
		
		 if ($id != 0)
	            {
	                $this->db->delete('location', array('id' => $id));
	                return true;
	            } 

	}
	
	public function update_location($id, $value) {
		
		 if ($id != 0)
	            {
	                $data = array('name' => $value);
					$this->db->where('id', $id);
					$this->db->update('location', $data);
	                return true;
	            } 

	}
        
        
        
        
        
	 
	
}