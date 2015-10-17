<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Budget_model extends CI_Model {
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
	public function create_budget($title) {
		
		$data = array(
                        'name'   => $title
		);
		
		return $this->db->insert('budget', $data);
		
	}
        public function get_budget($id) {
		
	 if ($id === 0)
            {
                $query = $this->db->get('budget');
                return $query->result_array();
            }
            $query = $this->db->get_where('budget', array('id' => $id));
            return $query->row_array();

	}
        
        public function delete_budget($id) {
		
		 if ($id != 0)
	            {
	                $this->db->delete('budget', array('id' => $id));
	                return true;
	            } 

	}
	
	public function update_budget($id, $value) {
		
		 if ($id != 0)
	            {
	                $data = array('name' => $value);
					$this->db->where('id', $id);
					$this->db->update('budget', $data);
	                return true;
	            } 

	}
        
        
        
        
        
	 
	
}