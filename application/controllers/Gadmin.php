<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gadmin extends CI_Controller {

	public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url')); 
                $this->load->model('gadmin_model');
                $this->load->library('session');
		
	} 
        
        /**
	 * login function.
	 * 
	 * @access public
	 * @return void
	 */
	public function index() {
		
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
                        $this->load->view('gadmin/login', $data);
                        $this->load->view('templates/footer', $data);
			
		} else {
			
			// set variables from the form
			$email    = $this->input->post('email');
			$password = $this->input->post('password');
			
			if ($this->gadmin_model->resolve_user_login($email, $password)) {
				
				$user_id = $this->gadmin_model->get_user_id_from_email($email);
				$user    = $this->gadmin_model->get_user($user_id);
				
				// set session user datas
				$_SESSION['user_id']      = (int)$user->id;
				$_SESSION['username']     = (string)$user->username;
				$_SESSION['logged_in']    = (bool)true;
				$_SESSION['is_confirmed'] = (bool)$user->is_confirmed;
				$_SESSION['is_admin']     = (bool)$user->is_admin;
				
				// user login ok 
                                if($user->is_admin){
                                 redirect('gadmin/dashboard');
                                }else{
                                    // login failed
				$data->error = 'You are not an administrator. Please contact at support@googlelance.com'; 
				
				// send error to the view
				$this->load->view('templates/head.inc.php', $data); 
                                $this->load->view('templates/header', $data);
                                $this->load->view('gadmin/login', $data);
                                $this->load->view('templates/footer', $data);
                                }
				
			} else {
				
				// login failed
				$data->error = 'Wrong username or password.';
				
				// send error to the view
				$this->load->view('templates/head.inc.php', $data); 
                                $this->load->view('templates/header', $data);
                                $this->load->view('gadmin/login', $data);
                                $this->load->view('templates/footer', $data);
				
			}
			
		}
		
	}
	
	public function dashboard() {
            
            $logged_in = $this->session->logged_in;
            
            if ($logged_in == FALSE)
            {
                    //redirect('/gadmin/login');
            }
            // create the data object
	        $data = new stdClass();
            
            $this->load->view('templates/head.inc.php', $data); 
            $this->load->view('templates/header', $data);
            $this->load->view('gadmin/dashboard', $data);
            $this->load->view('templates/footer', $data);
            
        }
        
    public function project_settings() {
            
            $logged_in = $this->session->logged_in;
            
            if ($logged_in == FALSE)
            {
                    //redirect('/gadmin/index');
            }
            // create the data object
	        $data = new stdClass();
            
            $this->load->view('templates/head.inc.php', $data); 
            $this->load->view('templates/header', $data);
            $this->load->view('gadmin/project_settings', $data);
            $this->load->view('templates/footer', $data);
            
        }
        
     public function add_category(){ 
              
		$data = new stdClass();
		$this->load->model('category_model');
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation'); 
                
                $data->actionTrigger    = $this->input->get('action'); 
                
                if(!isset($data->actionTrigger) || $data->actionTrigger==''){ $data->actionTrigger = "add"; }
                
                if($data->actionTrigger != 'add'){
                   $data->categoryid      = $this->input->get('id');  
                   $data->category_detail = $this->category_model->get_category($data->categoryid); 
                }
                //print_r($data->categories);
		$data->categories = $this->category_model->get_category(0);
		// set validation rules
		$this->form_validation->set_rules('category', 'Category', 'required');
		$this->form_validation->set_rules('action', 'Action', 'required');
		
		if ($this->form_validation->run() == false) {
			
			$this->load->view('templates/head.inc.php', $data); 
                        $this->load->view('templates/header', $data);
                        $this->load->view('gadmin/project_settings/category/add_category', $data);
                        $this->load->view('templates/footer', $data);
			
		} else {
			
			// set variables from the form
			$category  = $this->input->post('category');
			$action    = $this->input->post('action'); 
                        $id        = $this->input->post('id');
                         
                        
                        if($action=="add"){
                            $this->category_model->create_category($category);
                            $data->success = 'Your category created successfully.';
                            
                        }else if($action=="update"){
                            $this->category_model->update_category($id, $category);
                            $data->success = 'Your category updated successfully.';
                        }else if($action=="delete"){ 
                            $this->category_model->delete_category($id);
                            $data->success = 'Your category deleted successfully.';
                        }
                        $data->categories = $this->category_model->get_category(0); 
                        // send error to the view
                        $this->load->view('templates/head.inc.php', $data); 
                        $this->load->view('templates/header', $data);
                        $this->load->view('gadmin/project_settings/category/add_category', $data);
                        $this->load->view('templates/footer', $data);
				
			 
			
		}
     }
     
     public function budget(){ 
              
		$data = new stdClass();
		$this->load->model('budget_model');
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation'); 
                
                $data->actionTrigger    = $this->input->get('action'); 
                
                if(!isset($data->actionTrigger) || $data->actionTrigger==''){ $data->actionTrigger = "add"; }
                
                if($data->actionTrigger != 'add'){
                   $data->budgetid      = $this->input->get('id');  
                   $data->category_detail = $this->budget_model->get_budget($data->budgetid); 
                }
                //print_r($data->categories);
		$data->categories = $this->budget_model->get_budget(0);
		// set validation rules
		$this->form_validation->set_rules('budget', 'Budget', 'required');
		$this->form_validation->set_rules('action', 'Action', 'required');
		
		if ($this->form_validation->run() == false) {
			
			$this->load->view('templates/head.inc.php', $data); 
                        $this->load->view('templates/header', $data);
                        $this->load->view('gadmin/project_settings/budget/budget', $data);
                        $this->load->view('templates/footer', $data);
			
		} else {
			
			// set variables from the form
			$budget    = $this->input->post('budget');
			$action    = $this->input->post('action'); 
                        $id        = $this->input->post('id');
                         
                        
                        if($action=="add"){
                            $this->budget_model->create_budget($budget);
                            $data->success = 'Your budget created successfully.';
                            
                        }else if($action=="update"){
                            $this->budget_model->update_budget($id, $budget);
                            $data->success = 'Your budget updated successfully.';
                        }else if($action=="delete"){ 
                            $this->budget_model->delete_budget($id);
                            $data->success = 'Your budget deleted successfully.';
                        }
                        $data->categories = $this->budget_model->get_budget(0); 
                        // send error to the view
                        $this->load->view('templates/head.inc.php', $data); 
                        $this->load->view('templates/header', $data);
                        $this->load->view('gadmin/project_settings/budget/budget', $data);
                        $this->load->view('templates/footer', $data);
				
			 
			
		}
     }
      
     public function location(){ 
              
		$data = new stdClass();
		$this->load->model('location_model');
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation'); 
                
                // this is the pagination class config 
                $this->load->library('pagination');
                $config['base_url'] = site_url().'gadmin/location/page/';
                $config['total_rows'] = $this->db->get('location')->num_rows();
                $config['per_page'] = 20;
                $config['uri_segment'] = 4;
                $config['num_links'] = $config['total_rows']/$config['per_page'];
                $config['full_tag_open'] = '<ul class="pagination">';
                $config['full_tag_close'] = '</ul>'; 
                $config['cur_tag_open'] = '<li class="active"><a href="#">'; 
				$config['cur_tag_close'] = '</a></li>';
				$config['num_tag_open'] = '<li>'; 
				$config['num_tag_close'] = '</li>';
				$config['prev_link'] = '<li>&lt;';
				$config['next_tag_open'] = '<li>';
                 
                $perpage = 20;
                $segment = $this->uri->segment(4);
                $data->page = $segment;
                $this->pagination->initialize($config);
                
                $data->actionTrigger    = $this->input->get('action'); 
                
                if(!isset($data->actionTrigger) || $data->actionTrigger==''){ $data->actionTrigger = "add"; }
                
                if($data->actionTrigger != 'add'){
                   $data->locationid      = $this->input->get('id');  
                   $data->category_detail = $this->location_model->get_location($data->locationid, 1, $segment); 
                }
                //print_r($data->categories);
				$data->categories = $this->location_model->get_location(0, $perpage, $segment); 
				// set validation rules
				$this->form_validation->set_rules('location', 'Location', 'required');
				$this->form_validation->set_rules('action', 'Action', 'required');
		
		if ($this->form_validation->run() == false) {
			
			$this->load->view('templates/head.inc.php', $data); 
                        $this->load->view('templates/header', $data);
                        $this->load->view('gadmin/project_settings/location/location', $data);
                        $this->load->view('templates/footer', $data);
			
		} else {
			
			// set variables from the form
			$location  = $this->input->post('location');
			$action    = $this->input->post('action'); 
                        $id        = $this->input->post('id');
                         
                        
                        if($action=="add"){
                            $this->location_model->create_location($location);
                            $data->success = 'Your location created successfully.';
                            
                        }else if($action=="update"){
                            $this->location_model->update_location($id, $location);
                            $data->success = 'Your location updated successfully.';
                        }else if($action=="delete"){ 
                            $this->location_model->delete_location($id);
                            $data->success = 'Your location deleted successfully.';
                        } 

                        $data->categories = $this->location_model->get_location(0, $perpage, $segment); 
                        // send error to the view
                        $this->load->view('templates/head.inc.php', $data); 
                        $this->load->view('templates/header', $data);
                        $this->load->view('gadmin/project_settings/location/location', $data);
                        $this->load->view('templates/footer', $data);
				
			 
			
		}
     }
   
     public function skills(){ 
              
		$data = new stdClass();
		$this->load->model('skills_model');
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation'); 
                
                // this is the pagination class config 
                $this->load->library('pagination');
                $config['base_url'] = site_url().'gadmin/skills/page/';
                $config['total_rows'] = $this->db->get('skills')->num_rows();;
                $config['per_page'] = 20;
                $config['uri_segment'] = 4;
                $config['num_links'] = $config['total_rows']/$config['per_page'];
                $config['full_tag_open'] = '<ul class="pagination">';
                $config['full_tag_close'] = '</ul>'; 
                $config['cur_tag_open'] = '<li class="active"><a href="#">'; 
				$config['cur_tag_close'] = '</a></li>';
				$config['num_tag_open'] = '<li>'; 
				$config['num_tag_close'] = '</li>';
				$config['prev_link'] = '<li>&lt;';
				$config['next_tag_open'] = '<li>';
                 
                $perpage = 20;
                $segment = $this->uri->segment(4);
                $data->page = $segment;
                $this->pagination->initialize($config);
                
                $data->actionTrigger    = $this->input->get('action'); 
                
                if(!isset($data->actionTrigger) || $data->actionTrigger==''){ $data->actionTrigger = "add"; }
                
                if($data->actionTrigger != 'add'){
                   $data->locationid      = $this->input->get('id');  
                   $data->category_detail = $this->skills_model->get_skill($data->locationid, 1, $segment); 
                }
                //print_r($data->categories);
				$data->categories = $this->skills_model->get_skill(0, $perpage, $segment); 
				// set validation rules
				$this->form_validation->set_rules('skill', 'Skill', 'required');
				$this->form_validation->set_rules('action', 'Action', 'required');
		
		if ($this->form_validation->run() == false) {
			
			$this->load->view('templates/head.inc.php', $data); 
                        $this->load->view('templates/header', $data);
                        $this->load->view('gadmin/project_settings/skills/skills', $data);
                        $this->load->view('templates/footer', $data);
			
		} else {
			
			// set variables from the form
			$location  = $this->input->post('skill');
			$action    = $this->input->post('action'); 
                        $id        = $this->input->post('id');
                         
                        
                        if($action=="add"){
                            $this->skills_model->create_skill($location);
                            $data->success = 'Your skill created successfully.';
                            
                        }else if($action=="update"){
                            $this->skills_model->update_skill($id, $location);
                            $data->success = 'Your skill updated successfully.';
                        }else if($action=="delete"){ 
                            $this->skills_model->delete_skill($id);
                            $data->success = 'Your skill deleted successfully.';
                        } 

                        $data->categories = $this->skills_model->get_skill(0, $perpage, $segment); 
                        // send error to the view
                        $this->load->view('templates/head.inc.php', $data); 
                        $this->load->view('templates/header', $data);
                        $this->load->view('gadmin/project_settings/skills/skills', $data);
                        $this->load->view('templates/footer', $data);
				
			 
			
		}
     }
     
     public function newprojects(){ 
              
		$data = new stdClass();
		$this->load->model('gadmin_model');
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation'); 
                
                // this is the pagination class config 
                $this->load->library('pagination');
                $config['base_url'] = site_url().'gadmin/newprojects/page/';
                $this->db->where('status', 0);
                $config['total_rows'] = $this->db->get('projects')->num_rows();
                $config['per_page'] = 20;
                $config['uri_segment'] = 4;
                $config['num_links'] = $config['total_rows']/$config['per_page'];
                $config['full_tag_open'] = '<ul class="pagination">';
                $config['full_tag_close'] = '</ul>'; 
                $config['cur_tag_open'] = '<li class="active"><a href="#">'; 
				$config['cur_tag_close'] = '</a></li>';
				$config['num_tag_open'] = '<li>'; 
				$config['num_tag_close'] = '</li>';
				$config['prev_link'] = '<li>&lt;';
				$config['next_tag_open'] = '<li>';
                 
                $perpage = 20;
                $segment = $this->uri->segment(4);
                $data->page = $segment;
                $this->pagination->initialize($config);
                 
                $data->new_projects = $this->gadmin_model->get_new_projects(0, $perpage, $segment);  
                $this->form_validation->set_rules('location', 'Location', 'required');
                $this->form_validation->set_rules('action', 'Action', 'required');
		 
                $this->load->view('templates/head.inc.php', $data); 
                $this->load->view('templates/header', $data);
                $this->load->view('gadmin/project/newproject', $data);
                $this->load->view('templates/footer', $data);
		 
     }
     
     public function editproject(){
        $data = new stdClass(); 
        $this->load->model('gadmin_model');
        $this->load->model('user_model');
        $projectid = $this->uri->segment(3);
        // load form helper and validation library
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        // set validation rules 
         $this->form_validation->set_rules('status', 'status', 'required', array('required' => 'Please select what you want to do!'));
        
        
        if ($this->form_validation->run() == false) {
			
            $data->project_details = $this->gadmin_model->get_project_details($projectid);  
            //get_project_details($id)
            $this->load->view('templates/head.inc.php', $data); 
            $this->load->view('templates/header', $data);
            $this->load->view('gadmin/project/editproject', $data);
            $this->load->view('templates/footer', $data);
			
	} else {
            $status     = $this->input->post('status');
            $projectid  = $this->input->post('projectid');
            $data->moredetails  = $this->input->post('moredetails');
            
            if($status==1){
               $this->gadmin_model->project_action($status, $projectid); 
               $data->success = "Your project is approved succesfully";
            }
            if($status==2){
                $data->project_details = $this->gadmin_model->delete_project($projectid);  
                redirect('gadmin/newprojects');
            }
            if($status==3){
                // send need more details email to user
                
                $data->project_details = $this->gadmin_model->get_project_details($projectid);
                $userid = $data->project_details[0]['userid'];
                $data->user_details = $this->user_model->get_user_details($userid);
                if($data->user_details[0]['is_confirmed']){
                    //print_r($data->user_details[0]['is_confirmed']); die();
                    // Send email
                    $this->load->library('email');
                    $subject = "Googlelance: please provide more details for project id [#".$data->project_details[0]['id']."]";
                    $this->email->from(SITE_SUPPORT_EMAIL, SITE_SUPPORT_NAME);
                    $this->email->to($data->user_details[0]['email']); 
                    $this->email->subject($subject);
                    $this->email->message($this->load->view('templates/email/gadmin/need_more_project_details', $data, true));
                    $mail_sent = $this->email->send(); 
                    $data->success = "Update message to the user has been sent sucessfully";
                }
            }
            
            $data->project_details = $this->gadmin_model->get_project_details($projectid); 
            
            //get_project_details($id)
            $this->load->view('templates/head.inc.php', $data); 
            $this->load->view('templates/header', $data);
            $this->load->view('gadmin/project/editproject', $data);
            $this->load->view('templates/footer', $data);
            //print_r($data->project_details); 
       }
     
     }
     
     public function allprojects(){
        $data = new stdClass();
        $this->load->model('gadmin_model');
        // load form helper and validation library
        $this->load->helper('form');
        $this->load->library('form_validation'); 

        // this is the pagination class config 
        $this->load->library('pagination');
        $config['base_url'] = site_url().'gadmin/newprojects/page/';
        $this->db->where('status', 0);
        $config['total_rows'] = $this->db->get('projects')->num_rows();
        $config['per_page'] = 20;
        $config['uri_segment'] = 4;
        $config['num_links'] = $config['total_rows']/$config['per_page'];
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>'; 
        $config['cur_tag_open'] = '<li class="active"><a href="#">'; 
                        $config['cur_tag_close'] = '</a></li>';
                        $config['num_tag_open'] = '<li>'; 
                        $config['num_tag_close'] = '</li>';
                        $config['prev_link'] = '<li>&lt;';
                        $config['next_tag_open'] = '<li>';

        $perpage = 20;
        $segment = $this->uri->segment(4);
        $data->page = $segment;
        $this->pagination->initialize($config);

        $data->new_projects = $this->gadmin_model->get_all_projects(0, $perpage, $segment);  
        $this->form_validation->set_rules('location', 'Location', 'required');
        $this->form_validation->set_rules('action', 'Action', 'required');

        $this->load->view('templates/head.inc.php', $data); 
        $this->load->view('templates/header', $data);
        $this->load->view('gadmin/project/newproject', $data);
        $this->load->view('templates/footer', $data);
     }
     
}
