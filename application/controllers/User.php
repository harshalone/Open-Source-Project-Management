<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
  
        public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('user_model');
                $this->load->library('session');
		
	} 
	
	public function index() {
		
            redirect('user/login');
		
	}
	
	
        public function profile()
		{ 
			   
			$data = new stdClass();
            $logged_in = $this->session->logged_in; 
            if ($logged_in == FALSE) { redirect('/user/login');}
           		
			 
	        $data->userid  = $this->uri->segment(3);
            if ( $data->userid == '' || !is_numeric($data->userid) ) { redirect('/search/freelancers'); } 
            $data->user_details = $this->user_model->get_user_details($data->userid);
            if (empty($data->user_details)) { redirect('/search/freelancers'); } 
            $this->load->view('templates/head.inc.php', $data); 
            $this->load->view('templates/header', $data);
            $this->load->view('user/profile', $data);
            $this->load->view('templates/footer', $data);
            
				 
	        
	        
		}
        
	/**
	 * register function.
	 * 
	 * @access public
	 * @return void
	 */
	public function register() {
		
		// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set validation rules
		$this->form_validation->set_rules('fullname', 'Fullname', 'required|min_length[3]');
                $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]|is_unique[users.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]', array('is_unique' => 'This Email address already exists. Please login or try another one.'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
                $this->form_validation->set_rules('terms', 'Terms and Conditions', 'required', array('required' => 'Please accept terms and conditions'));
		$this->form_validation->set_rules('g-recaptcha-response','Captcha','callback_recaptcha');
                
		if ($this->form_validation->run() === false) {
			
			// validation not ok, send validation errors to the view
                        $this->load->view('templates/head.inc.php', $data);
			$this->load->view('templates/header', $data);
			$this->load->view('user/register', $data);
			$this->load->view('templates/footer', $data);
                         
			
		} else {
                        $this->load->helper('string');
			$data->random_number = random_string('alnum', 16);
			// set variables from the form
			$fullname = $this->input->post('fullname');
                        $username = $this->input->post('username');
			$email    = $this->input->post('email');
			$password = $this->input->post('password');
			
			if ($this->user_model->create_user($fullname, $username, $email, $password, $data->random_number)) {
				 
				// user creation ok 
                $data->success = 'Your account is created succesfully. Please varify your email address.';
				$this->load->view('templates/head.inc.php', $data);
			    $this->load->view('templates/header', $data);
				$this->load->view('user/register', $data);
				$this->load->view('templates/footer');
                                
                                // send verification email to user
                                $this->load->library('email');
                                $subject = "Googlelance: Please varify your email address.";
                                $this->email->from(SITE_SUPPORT_EMAIL, SITE_SUPPORT_NAME);
                                $this->email->to($email);
                                
                                
                                

                                $this->email->subject($subject);
                                $this->email->message($this->load->view('templates/email/verify_email', $data, true));

                                $mail_sent = $this->email->send();
                                
				
			} else {
				
				// user creation failed, this should never happen
				$data->error = 'There was a problem creating your new account. Please try again.';
				
				// send error to the view
				$this->load->view('header');
				$this->load->view('user/register', $data);
				$this->load->view('footer');
				
			}
			
		}
		
	}
	
        public function recaptcha($str='')
            {
              $google_url="https://www.google.com/recaptcha/api/siteverify";
              $secret='6LcfBQ8TAAAAALvaMwIRMTh2jKwQ2RDbn-bzExQZ';
              $ip=$_SERVER['REMOTE_ADDR'];
              $url=$google_url."?secret=".$secret."&response=".$str."&remoteip=".$ip;
              $curl = curl_init();
              curl_setopt($curl, CURLOPT_URL, $url);
              curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
              curl_setopt($curl, CURLOPT_TIMEOUT, 10);
              curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
              $res = curl_exec($curl);
              curl_close($curl);
              $res= json_decode($res, true);
              //reCaptcha success check
              if($res['success'])
              {
                return TRUE;
              }
              else
              {
                $this->form_validation->set_message('recaptcha', 'The reCAPTCHA field is telling me that you are a robot. Shall we give it another try?');
                return FALSE;
              }
            }
	
        /*
         * verify user with code and emmail
         * 
         * 
         */
        
	public function verify()
	{ 
                // create the data object
		$data = new stdClass();
                
                 
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set validation rules 
		$this->form_validation->set_rules('code', 'Code', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
		
		if ($this->form_validation->run() == false) {
			
			// validation not ok, send validation errors to the view
			$this->load->view('templates/head.inc.php', $data);
                        $this->load->library('form_validation');   
                        $this->load->view('templates/header', $data);
                        $this->load->view('user/verify', $data);
                        $this->load->view('templates/footer', $data);
			
		} else {
                    
                        // set variables from the form
			$email    = $this->input->post('email');
			$code     = $this->input->post('code');
                        if ($this->user_model->verify_user($email, $code)) {
				
				$data->success = 'Your account is verified succesfully. Please login.';  
				// user login ok
				$this->load->view('templates/head.inc.php', $data); 
                                $this->load->view('templates/header', $data);
                                $this->load->view('user/login', $data);
                                $this->load->view('templates/footer', $data);
				
			} else {
                                $data->error = 'This combination is not correct or your verification code is expired. Please contact our support department.';  
				// user login ok
				$this->load->view('templates/head.inc.php', $data);
                                $this->load->library('form_validation');   
                                $this->load->view('templates/header', $data);
                                $this->load->view('user/verify', $data);
                                $this->load->view('templates/footer', $data);
                        }
                    
                }
	}
        
        
        /**
	 * login function.
	 * 
	 * @access public
	 * @return void
	 */
	public function login() {
		
		// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set validation rules
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == false) {
			
			// validation not ok, send validation errors to the view
			$this->load->view('templates/head.inc.php', $data); 
                        $this->load->view('templates/header', $data);
                        $this->load->view('user/login', $data);
                        $this->load->view('templates/footer', $data);
			
		} else {
			
			// set variables from the form
			$email    = $this->input->post('email');
			$password = $this->input->post('password');
			
			if ($this->user_model->resolve_user_login($email, $password)) {
				
				$user_id = $this->user_model->get_user_id_from_email($email);
				$user    = $this->user_model->get_user($user_id);
				
				// set session user datas
				$_SESSION['user_id']      = (int)$user->id;
				$_SESSION['username']     = (string)$user->username;
				$_SESSION['logged_in']    = (bool)true;
				$_SESSION['is_confirmed'] = (bool)$user->is_confirmed;
				$_SESSION['is_admin']     = (bool)$user->is_admin;
				
				// user login ok 
				redirect('/dashboard');
				
			} else {
				
				// login failed
				$data->error = 'Wrong username or password.';
				
				// send error to the view
				$this->load->view('templates/head.inc.php', $data); 
                                $this->load->view('templates/header', $data);
                                $this->load->view('user/login', $data);
                                $this->load->view('templates/footer', $data);
				
			}
			
		}
		
	}
	
	/**
	 * logout function.
	 * 
	 * @access public
	 * @return void
	 */
	public function logout() {
		
		// create the data object
		$data = new stdClass();
		
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			
			// remove session datas
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}
			
			// user logout ok 
                        redirect('user/login');
			
		} else {
			
			// there user was not logged in, we cannot logged him out,
			// redirect him to site root
			redirect('user/login');
			
		}
		
	}
        
      
}
