<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class Gadmin_model extends CI_Model {
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
	public function create_user($fullname, $username, $email, $password, $random_number) {
		
		$data = array(
                        'fullname'   => $fullname,
			'username'   => $username,
			'email'      => $email,
			'password'   => $this->hash_password($password),
                        'randno'   => $random_number,
			'created_at' => date('Y-m-j H:i:s'),
		);
		
		return $this->db->insert('staff', $data);
		
	}
	
	/**
	 * resolve_user_login function.
	 * 
	 * @access public
	 * @param mixed $username
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function resolve_user_login($email, $password) {
		
		$this->db->select('password');
		$this->db->from('staff');
		$this->db->where('email', $email);
		$hash = $this->db->get()->row('password');
		
		return $this->verify_password_hash($password, $hash);
		
	}
        
        
	
	/**
	 * verify user with code and email.
	 *  
	 */
	public function verify_user($email, $code) {
		$sql   = "SELECT id FROM staff WHERE email = '$email' AND randno = '$code'";
		$query = $this->db->query($sql);
                
                if($query->num_rows()>0){
                    $updata = array('is_confirmed' => 1, 'randno' => '' ); 
                    $this->db->where('email', $email);
                    $this->db->update('users', $updata);   
		 return TRUE;
                }
                else{
                 return FALSE;    
                }
		
	}
	
	/**
	 * get_user function.
	 * 
	 * @access public
	 * @param mixed $user_id
	 * @return object the user object
	 */
	public function get_user($user_id) {
		
		$this->db->from('staff');
		$this->db->where('id', $user_id);
		return $this->db->get()->row();
		
	}
        
        
	
	/**
	 * hash_password function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @return string|bool could be a string on success, or bool false on failure
	 */
	private function hash_password($password) {
		
		return password_hash($password, PASSWORD_BCRYPT);
		
	}
	
	public function get_user_id_from_email($email){
                $this->db->select('id');
				$this->db->from('staff');
				$this->db->where('email', $email);
				$userid = $this->db->get()->row('id'); 
				return $userid;
        }
	
	/**
	 * verify_password_hash function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @param mixed $hash
	 * @return bool
	 */
	private function verify_password_hash($password, $hash) {
		
		return password_verify($password, $hash);
		
	}
        
        public function get_new_projects($id, $perpage, $segment) {
		 
            if($perpage =='' || $segment ==''){
            
                $this->db->order_by('id', 'DESC');
                $this->db->where('status', 0);
                $query = $this->db->get('projects', $perpage, $segment); 
                //print_r($this->db->last_query());
                return $query->result_array();

                
            }else{
            
                $this->db->order_by('id', 'DESC'); 
                $this->db->where('status', 0);
                $query = $this->db->get('projects', $perpage, $segment); 
                //print_r($this->db->last_query());
                return $query->result_array();
            }
             

	}
        
        public function get_all_projects($id, $perpage, $segment) {
		 
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
        
        public function get_project_details($id) {
	 
                $this->db->where('id', $id);
                $query = $this->db->get('projects'); 
                //print_r($this->db->last_query());
                return $query->result_array(); 
	}
        
        public function update_project($title, $userid, $category, $location, $budget, $skills, $description) {
		
		$data = array(
                   'title'   => $title,
                   'userid'   => $userid,
                   'category' => $category,
                   'location' => $location,
                   'budget' => $budget,
                   'skill' => $skills,
                   'details' => nl2br($description)
		);
		
	    return $this->db->update('projects', $data);
		
	}
        
        public function project_action($status, $projectid) {
		
		$data = array(
                   'status'   => $status
		);
		$this->db->where('id', $projectid);
	    return $this->db->update('projects', $data);
		
	}
        
         public function delete_project($projectid) { 
	    return $this->db->delete('projects', array('id' => $projectid));  
	}
	
        
        
}