<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	public function __construct() {
		
		parent::__construct(); 
		$this->load->helper(array('url'));  
        $this->load->library('session');
        $this->load->model('search_model');
		
	} 
	
	public function index()
	{
		redirect('search/projects');
	}
        
        public function projects()
		{
			// create the data object
	        $data = new stdClass();
		    // this is the pagination class config 
	        $this->load->library('pagination');
	        $config['base_url'] = site_url().'search/project/page/';
	        $config['total_rows'] = $this->db->get('projects')->num_rows();
	        $config['per_page'] = 20;
	        $config['uri_segment'] = 3;
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
	        $segment = $this->uri->segment(3); 
	        $data->page = $segment;
	        $this->pagination->initialize($config);
	        
	        $data->projects = $this->search_model->get_projects(0, $perpage, $segment);
	        
			$this->load->view('templates/head.inc.php', $data);
	        $this->load->view('templates/header', $data);
	        $this->load->view('search/search_projects', $data);
	        $this->load->view('templates/footer', $data);
		}
		
		public function freelancers()
		{
			// create the data object
	        $data = new stdClass();
		    // this is the pagination class config 
	        $this->load->library('pagination');
	        $config['base_url'] = site_url().'search/freelancers/page/';
	        $config['total_rows'] = $this->db->get('projects')->num_rows();
	        $config['per_page'] = 20;
	        $config['uri_segment'] = 3;
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
	        $segment = $this->uri->segment(3); 
	        $data->page = $segment;
	        $this->pagination->initialize($config);
	        
	        $data->freelancers = $this->search_model->get_freelancers(0, $perpage, $segment);
	        
			$this->load->view('templates/head.inc.php', $data);
	        $this->load->view('templates/header', $data);
	        $this->load->view('search/search_freelancers', $data);
	        $this->load->view('templates/footer', $data);
		}
        
        public function project()
		{
		        
		        $data = new stdClass(); 
		        $data->action = $this->input->get('action'); 
		        if($this->input->get('action') != '' ){
		          $logged_in = $this->session->logged_in; 
	              if ($logged_in == FALSE) { redirect('/user/login');}
		        }
		        $projectid = $this->uri->segment(3); 
		        if($projectid == '') { redirect('search/projects'); } 
	          
	            // load form helper and validation library
	            $this->load->helper('form');
	            $this->load->library('form_validation');
	  
	            $this->form_validation->set_rules('bid', 'Bid', 'required');
	            $this->form_validation->set_rules('contact', 'Contact', 'required');
	            $this->form_validation->set_rules('description', 'Proposal', 'required');
	            
	
			 if ($this->form_validation->run() == false) { 
			              
		        $data->project_details = $this->search_model->get_project_details($projectid);
			    $this->load->view('templates/head.inc.php', $data);
		        $this->load->view('templates/header', $data);
		        $this->load->view('project/project', $data);
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
	                 
			
	                      
		        $data->project_details = $this->search_model->get_project_details($projectid);
			    $this->load->view('templates/head.inc.php', $data);
		        $this->load->view('templates/header', $data);
		        $this->load->view('project/project', $data);
		        $this->load->view('templates/footer', $data);
							
						 
						
			 }
		        
		      
		}
}
