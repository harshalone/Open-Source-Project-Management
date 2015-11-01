<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Issue_model extends CI_Model {
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
	public function create_issue($title, $userid, $issuetype, $description) {
		
		$data = array( 
           'issuetype'   => $issuetype,
           'userid'   => $userid, 
           'title'   => $title,
           'details' => $description
           
		);
		
		return $this->db->insert('issues', $data);
		
	}
    
    public function fetch_open_issue($id, $perpage, $segment) {
		    $this->db->order_by('issueid', 'DESC');
            $query = $this->db->get_where('issues', array('status' => 0));
            return $query->result_array();

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