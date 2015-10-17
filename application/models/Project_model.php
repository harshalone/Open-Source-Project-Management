<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Project_model extends CI_Model {
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
	public function create_project($title, $userid, $category, $location, $budget, $skills, $description) {
		
		$data = array(
                   'title'   => $title,
                   'userid'   => $userid,
                   'category' => $category,
                   'location' => $location,
                   'budget' => $budget,
                   'skill' => $skills,
                   'details' => nl2br($description)
		);
		
	    return $this->db->insert('projects', $data);
		
	}
        
        public function get_skill($id, $perpage, $segment) {
		 if ($id === 0)
            {   $this->db->order_by('name', 'ASC');
                $query = $this->db->get('skills', $perpage, $segment); 
                //print_r($this->db->last_query());
                return $query->result_array();
            }
            $query = $this->db->get_where('skills', array('id' => $id));
            return $query->row_array();

	}
        
        public function delete_skill($id) {
		
		 if ($id != 0)
	            {
	                $this->db->delete('skills', array('id' => $id));
	                return true;
	            } 

	}
	
	public function update_skill($id, $value) {
		
		 if ($id != 0)
	            {
	                $data = array('name' => $value);
					$this->db->where('id', $id);
					$this->db->update('skills', $data);
	                return true;
	            } 

	}
        
        
        
        
        
	 
	
}