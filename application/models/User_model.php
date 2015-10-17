<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User_model class.
 * 
 * @extends CI_Model
 */
class User_model extends CI_Model {
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
		
		$this->db->insert('users', $data);
		
		$userid = $this->db->insert_id();
		
		$data1  = array(
            'userid'   => $userid,
			'created_at' => date('Y-m-j H:i:s'),
		);
		
		return $this->db->insert('profiles', $data1);
		
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
		$this->db->from('users');
		$this->db->where('email', $email);
		$hash = $this->db->get()->row('password');
		
		return $this->verify_password_hash($password, $hash);
		
	}
        
        
	
	/**
	 * verify user with code and email.
	 *  
	 */
	public function verify_user($email, $code) {
		$sql   = "SELECT id FROM users WHERE email = '$email' AND randno = '$code'";
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
		
		$this->db->from('users');
		$this->db->where('id', $user_id);
		return $this->db->get()->row();
		
	}
	
	public function get_user_details($user_id) {
		  
		$this->db->join ( 'users', 'users.id = profiles.userid' , 'left' );
        $this->db->where('userid', $user_id); 
        $query = $this->db->get('profiles'); 
        //print_r($this->db->last_query());
        return $query->result_array();
		
	}
	
	
    public function get_user_id_from_email($email){
                $this->db->select('id');
				$this->db->from('users');
				$this->db->where('email', $email);
				$userid = $this->db->get()->row('id'); 
				return $userid;
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
	
	
	public function up_user($userid, $field, $value) {
		 
        $updata = array($field => $value); 
        $this->db->where('id', $userid);
        $this->db->update('users', $updata);   
		return TRUE;
                
		
	}
	
	public function update_user($summary, $fullname, $gender, $dob, $profession, $address, $contactno, $s_email, $skype, $twitter, $facebook, $userid){
		$updata = array('summary' => $summary,
						'fullname_official' => $fullname,
						'gender' => $gender,
						'dob' => $dob,
						'profession' => $profession,
						'address' => $address,
						'contact' => $contactno,
						's_email' => $s_email,
						'skype' => $skype,
						'twitter' => $twitter,
						'facebook' => $facebook 
		               ); 
        $this->db->where('userid', $userid);
        $this->db->update('profiles', $updata);   
		return TRUE;
		
	}
	
}