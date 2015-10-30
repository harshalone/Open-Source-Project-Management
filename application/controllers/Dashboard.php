<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
  
        public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('user_model');
        $this->load->library('session');
		
	} 
	
	public function index() {
		
            $logged_in = $this->session->logged_in;
            
            if ($logged_in == FALSE)
            {
                    redirect('/user/login');
            }
            // create the data object
	        $data = new stdClass();
            
            $this->load->view('templates/head.inc.php', $data); 
            $this->load->view('templates/header', $data);
            $this->load->view('user/dashboard', $data);
            $this->load->view('templates/inc-footer', $data);
		
	}
	
	
        public function profile()
		{ 
			   
			$data['title'] = 'Profile';
			$this->load->view('templates/head.inc.php', $data);
			    
		        $this->load->view('templates/header', $data);
		        $this->load->view('profile', $data);
		        $this->load->view('templates/footer', $data);
		}
		
		public function projects()
		{ 
			   
			$data['title'] = 'Profile';
			$this->load->view('templates/head.inc.php', $data);
			    
		        $this->load->view('templates/header', $data);
		        $this->load->view('search/search_projects', $data);
		        $this->load->view('templates/footer', $data);
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
    
    public function create_issue() {
        
        $arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);    

   //add the header here
    header('Content-Type: application/json');
    echo json_encode( $arr );
        /*    
            $logged_in = $this->session->logged_in; 
            if ($logged_in == FALSE) { redirect('/user/login');}
            
            // fetch dropdown arrays
            $this->load->model('issue_model'); 
          
            // load form helper and validation library
            $this->load->helper('form');
            $this->load->library('form_validation');

            // create the data object
            $data = new stdClass();  

            $this->form_validation->set_rules('title', 'Title', 'required'); 
            $this->form_validation->set_rules('issue type', 'issuetype', 'required'); 
            $this->form_validation->set_rules('description', 'Description', 'required'); 
             
        

		 if ($this->form_validation->run() == false) {
					
		            echo "error";
            
		 } else {
					
                    // set variables from the form
                    $title          = $this->input->post('title');
                    $issuetype      = $this->input->post('issuetype');  
                    $description    = $this->input->post('description'); 
                    $userid         = $_SESSION['user_id'];
		           
                    $this->project_model->create_issue($title, $userid, $issuetype, $description);
                    $data->success = 'Your project created successfully. Once our moderators varify, it will be visible on our website.';
                    echo "success";
		 }
		  */   
            
        }
        
    public function post_project() {
            
            $logged_in = $this->session->logged_in; 
            if ($logged_in == FALSE) { redirect('/user/login');}
            
            // fetch dropdown arrays
            $this->load->model('category_model');
            $this->load->model('budget_model');
            $this->load->model('location_model');
            $this->load->model('skills_model');
            $this->load->model('project_model');
          
            // load form helper and validation library
            $this->load->helper('form');
            $this->load->library('form_validation');

            // create the data object
            $data = new stdClass();  

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('category', 'Category', 'required');
            $this->form_validation->set_rules('location', 'Location', 'required');
            $this->form_validation->set_rules('budget', 'Budget', 'required');
            $this->form_validation->set_rules('skills', 'skills', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('tne', 'Terms and Conditions', 'required', array('required' => 'Please accept terms and conditions'));

		 if ($this->form_validation->run() == false) {
					
		            $data->categories = $this->category_model->get_category(0);
		            $data->locations  = $this->location_model->get_location(0,'','');
		            $this->load->view('templates/head.inc.php', $data); 
		            $this->load->view('templates/header', $data);
		            $this->load->view('user/post_project', $data);
		            $this->load->view('templates/footer', $data);
            
		 } else {
					
                    // set variables from the form
                    $title          = $this->input->post('title');
                    $category       = $this->input->post('category'); 
                    $location       = $this->input->post('location');
                    $budget         = $this->input->post('budget');
                    $skills         = $this->input->post('skills');
                    $description    = $this->input->post('description'); 
                    $userid         = $_SESSION['user_id'];
		           
                    $this->project_model->create_project($title, $userid, $category, $location, $budget, $skills, $description);
                    $data->success = 'Your project created successfully. Once our moderators varify, it will be visible on our website.';
                 
		
                    $data->categories = $this->category_model->get_category(0);
		    $data->locations  = $this->location_model->get_location(0,'',''); 
                    // send error to the view
                    $this->load->view('templates/head.inc.php', $data); 
                    $this->load->view('templates/header', $data);
                    $this->load->view('user/post_project', $data);
                    $this->load->view('templates/footer', $data);
						
					 
					
		 }
		     
            
        }
        
        public function messages() {
          
            $data = new stdClass();
            $logged_in = $this->session->logged_in; 
            if ($logged_in == FALSE) { redirect('/user/login');}
           		
			 
	        $data->userid  = $this->session->user_id; //$this->uri->segment(3);
	        $data->to_userid = $this->uri->segment(3);
            if ( $data->to_userid == '' || !is_numeric($data->to_userid) ) { redirect('/search/freelancers'); } 
            $data->user_details   = $this->user_model->get_user_details($data->userid);
            $data->touser_details = $this->user_model->get_user_details($data->to_userid);
            
            // redirect if no user exist
            if (empty($data->touser_details)) { redirect('/search/freelancers'); }
            // redirect if messaging same person 
            if ($data->to_userid == $data->userid) { redirect('/search/freelancers'); }  
            
            
            $this->load->view('templates/head.inc.php', $data); 
            $this->load->view('templates/header', $data);
            $this->load->view('user/messages', $data);
            $this->load->view('templates/footer', $data);
            
        }
        
        
        
        public function settings() {
        
            $data = new stdClass();
            $logged_in = $this->session->logged_in; 
            if ($logged_in == FALSE) { redirect('/user/login');}
          
           
			// load form helper and validation library
            $this->load->helper('form');
            $this->load->library('form_validation');			
			 
	        $data->userid = $this->session->user_id;
            
            
            
            $this->form_validation->set_rules('summary', 'Summary', 'required');
            $this->form_validation->set_rules('fullname_official', 'Fullname', 'required');
            $this->form_validation->set_rules('gender', 'Gender', 'required');
            $this->form_validation->set_rules('dob', 'Date of Birth', 'required');
            $this->form_validation->set_rules('profession', 'Profession', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required'); 
            $this->form_validation->set_rules('contact', 'Contact No', 'required');   
            $this->form_validation->set_rules('semail', 'Secondary Email', 'required');   
             
           
           
	        if ($this->form_validation->run() == false) { 
	                        $data->user_details = $this->user_model->get_user_details($this->session->user_id);
		                    $this->load->view('templates/head.inc.php', $data); 
				            $this->load->view('templates/header', $data);
				            $this->load->view('user/settings', $data);
				            $this->load->view('templates/footer', $data);
            
				 } else {
							
		                    // set variables from the form
		                    $summary          = $this->input->post('summary');
		                    $fullname       = $this->input->post('fullname_official'); 
		                    $gender       = $this->input->post('gender');
		                    $dob         = $this->input->post('dob');
		                    $profession         = $this->input->post('profession');
		                    $address    = $this->input->post('address');  
		                    $contactno    = $this->input->post('contact');   
		                    $s_email    = $this->input->post('semail'); 
		                    $skype    = $this->input->post('skype');
		                    $twitter    = $this->input->post('twitter');
		                    $facebook    = $this->input->post('facebook');
				           
		                    $this->user_model->update_user($summary, $fullname, $gender, $dob, $profession, $address, $contactno, $s_email, $skype, $twitter, $facebook, $this->session->user_id);
		                    $data->success = 'Your Profile is updated successfully. If our moderators found any spam your account will be disabled instantly without any notifications'; 
				            $data->user_details = $this->user_model->get_user_details($this->session->user_id);
		                    $this->load->view('templates/head.inc.php', $data); 
				            $this->load->view('templates/header', $data);
				            $this->load->view('user/settings', $data);
				            $this->load->view('templates/footer', $data);
								
							 
							
				 }
             
            
        }
        
        public function profilepicture() {
            
            $logged_in = $this->session->logged_in; 
            if ($logged_in == FALSE) { redirect('/user/login'); }
            
            $userid = $this->session->user_id;  
            // create the data object
	        $data = new stdClass(); 
	        $data->userid = $this->session->user_id;
	        
            $data->user_details = $this->user_model->get_user_details($this->session->user_id);
            
            // set preferences
	        $config['upload_path'] = 'upload/users/profile/';
		    $config['allowed_types'] = 'png|jpeg|jpg|gif';
		    $config['max_size'] = '1024';
		    $config['max_width'] = '1024'; /* max width of the image file */
		    $config['max_height'] = '768'; /* max height of the image file */
		    $config['overwrite'] = TRUE; //
		    $config['detect_mime'] = TRUE;
		    $config['file_name'] = $userid.'.jpg';
		    
		    
		    
	
	        // load upload class library
	        $this->load->library('upload', $config);
	        $this->load->library('image_lib');
          
            // load form helper and validation library
			$this->load->helper('form');
			$this->load->library('form_validation');
             
			if (empty($_FILES['userimage']['name']))
			{
			    	$data->error = 'Please select an image to upload'; 
			}else{  
						
					
						
                    if (!$this->upload->do_upload('userimage'))
			        {
			           //$this->project_model->create_project($title, $userid, $category, $location, $budget, $skills, $description);
                        $data->error = 'Your Image cant be uploaded. Please check size, type as stated below.';	
                    }
			        else
			        { 
						
						// =======================
						   $data_upload = $this->upload->data();
						   $this->load->library('image_lib');
						   
 
							$file_name = $data_upload["file_name"];
				            $upload_path = 'upload/users/profile/';
							
							$config_resize['image_library'] = 'gd2';	
							$config_resize['create_thumb'] = TRUE;
							$config_resize['maintain_ratio'] = TRUE;
							$config_resize['master_dim'] = 'height';
							$config_resize['quality'] = "80%";
							$config_resize['source_image'] = './' . $upload_path . $userid.'.jpg';
							
				            // small thumb
							$file_name_thumb = $data_upload['raw_name'].'_thumb' . $data_upload['file_ext'];
							$config_resize['height'] = 75;
							$config_resize['width'] = 75;
							$this->image_lib->initialize($config_resize);
							$this->image_lib->resize();
							
							
							// clear config for img lib
							$this->image_lib->clear();
							
							// profile pic
							$file_name = $data_upload["file_name"];
				            $upload_path = 'upload/users/profile/'; 
							$config_resizep['image_library'] = 'gd2';	
							$config_resizep['create_thumb'] = TRUE;
							$config_resizep['maintain_ratio'] = TRUE;
							$config_resizep['master_dim'] = 'height';
							$config_resizep['quality'] = "80%";
							$config_resizep['source_image'] = './' . $upload_path . $userid.'.jpg';
							
				            // Profile Picture
							$file_name_thumb = $data_upload['raw_name'].'_profile' . $data_upload['file_ext'];
							$config_resizep['height'] = 400;
							$config_resizep['width'] = 400;
							$config_resizep['new_image'] = $data_upload['raw_name'].'_profile' . $data_upload['file_ext'];
							$this->image_lib->initialize($config_resizep);
							$this->image_lib->resize();
							
							$data->file_name_url = base_url() . $upload_path . $userid.'_profile_thumb.jpg';
							$data->file_name_thumb_url = base_url() . $upload_path . $userid.'_thumb.jpg';
							
					        // delete original
					        unlink($upload_path . $userid.'.jpg');
					        
					        $this->user_model->up_user($userid, 'pic', 1);
				            //$this->project_model->create_project($title, $userid, $category, $location, $budget, $skills, $description);
	                        $data->success = 'Image uploaded successfully'. $this->image_lib->display_errors();
						}
                         
			        } 
  
                  
		            $this->load->view('templates/head.inc.php', $data); 
		            $this->load->view('templates/header', $data);
		            $this->load->view('user/profilepicture', $data);
		            $this->load->view('templates/footer', $data);
				} 
            
            
        }

