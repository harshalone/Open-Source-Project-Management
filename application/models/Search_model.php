<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Search_model extends CI_Model {
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
	 public function get_projects($id, $perpage, $segment) {
		 
            if($perpage =='' || $segment ==''){
            
                $this->db->order_by('id', 'DESC');
                $this->db->where('status', 1);
                $query = $this->db->get('projects', $perpage, $segment); 
                //print_r($this->db->last_query());
                return $query->result_array();

                
            }else{
            
                $this->db->order_by('id', 'DESC'); 
                $this->db->where('status', 1);
                $query = $this->db->get('projects', $perpage, $segment); 
                //print_r($this->db->last_query());
                return $query->result_array();
            }
             

	}
	
	 public function get_freelancers($id, $perpage, $segment) {
		  
                
                $this->db->join ('users', 'users.id = profiles.userid' , 'left'); 
                $this->db->order_by('profiles.id', 'DESC'); 
                $this->db->where('approved', 1);
                $query = $this->db->get('profiles', $perpage, $segment); 
                //print_r($this->db->last_query());
                return $query->result_array();
 
             

	}
	
	public function get_project_details($id) {
		  
                $this->db->where('id', $id);
                $query = $this->db->get_where('projects'); 
                //print_r($this->db->last_query());
                return $query->result_array();
  

	}
	
	public function add_discussions($title, $userid, $description) {
		$descriptionnew = nl2br($description);
		$data = array(
                   'userid'   => $userid, 
                   'title'   => $title, 
                   'details' => $descriptionnew
		);
		
	    return $this->db->insert('forum', $data);
		
	}
	
	public function add_reply($discussionid, $userid, $reply) {
		$replynew = nl2br($reply);
		$data = array(
                   'discussionid'   => $discussionid, 
                   'userid'   => $userid, 
                   'reply' => $replynew
		);
		
	    return $this->db->insert('forum_reply', $data);
		
	}
	
	
	
	public function get_reply($id, $perpage, $segment) {
		 
	       if($perpage =='' || $segment ==''){
               
                $this->db->join ( 'users', 'users.id = forum_reply.userid' , 'left' );
                $this->db->where('discussionid', $id);
                $this->db->order_by('forum_reply.id', 'DESC'); 
                $query = $this->db->get('forum_reply'); 
                //print_r($this->db->last_query());
                return $query->result_array();

                
            }else{
            
                $this->db->join ( 'users', 'users.id = forum_reply.userid' , 'left' );
                $this->db->where('discussionid', $id);
                $this->db->order_by('forum_reply.id', 'DESC'); 
                $query = $this->db->get('forum_reply', $perpage, $segment); 
                //print_r($this->db->last_query());
                return $query->result_array();
            } 
                
	} 
	
	public function get_discussion($id, $perpage, $segment) {
	  
        $query = $this->db->get_where('forum', array('id' => $id), $perpage, $segment); 
        //print_r($this->db->last_query());
        return $query->result_array();
                

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