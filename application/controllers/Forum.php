<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller {

    public function __construct() {
		
		parent::__construct(); 
		$this->load->helper(array('url'));  
        $this->load->library('session');
        $this->load->model('forum_model');
		
	} 
 
	public function index()
	{
	    // create the data object
        $data = new stdClass();
	    // this is the pagination class config 
        $this->load->library('pagination');
        $config['base_url'] = site_url().'forum/page/';
        $config['total_rows'] = $this->db->get('forum')->num_rows();
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
        
        $data->discussions = $this->forum_model->get_discussions(0, $perpage, $segment); 
                
		 
		$this->load->view('templates/head.inc.php', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('user/forum/forum', $data);
        $this->load->view('templates/footer', $data);
	}
	
	public function page()
	{
	    // create the data object
        $data = new stdClass();
	    // this is the pagination class config 
        $this->load->library('pagination');
        $config['base_url'] = site_url().'forum/page/';
        $config['total_rows'] = $this->db->get('forum')->num_rows();
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
        
        $data->discussions = $this->forum_model->get_discussions(0, $perpage, $segment); 
                
		 
		$this->load->view('templates/head.inc.php', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('user/forum/forum', $data);
        $this->load->view('templates/footer', $data);
	}
        
        public function add_discussion()
	{
            $logged_in = $this->session->logged_in; 
            if ($logged_in == FALSE) { redirect('/user/login');}
             
            // load form helper and validation library
            $this->load->helper('form');
            $this->load->library('form_validation');

            // create the data object
            $data = new stdClass();  

            $this->form_validation->set_rules('title', 'Title', 'required'); 
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('tne', 'Terms and Conditions', 'required', array('required' => 'Please accept terms and conditions'));

		 if ($this->form_validation->run() == false) {
					 
		            // load form helper and validation library 
                            $this->load->view('templates/head.inc.php', $data);
                            $this->load->view('templates/header', $data);
                            $this->load->view('user/forum/add_discussion', $data);
                            $this->load->view('templates/footer', $data);
            
		 } else {
					
                    // set variables from the form
                    $title          = $this->input->post('title'); 
                    $description    = $this->input->post('description'); 
                    $userid         = $_SESSION['user_id'];
		           
                    $this->forum_model->add_discussions($title, $userid, $description);
                    $data->success = 'Your discussion is added successfully. Remember if our moderators find any spam we will delete it without any notification';
                  
                    // load form helper and validation library 
                    $this->load->view('templates/head.inc.php', $data);
                    $this->load->view('templates/header', $data);
                    $this->load->view('user/forum/add_discussion', $data);
                    $this->load->view('templates/footer', $data);
						
					 
					
		 }
		
	}
        
        public function discussion()
	        {
	
			    // create the data object
		        $data = new stdClass();
			    // this is the pagination class config 
		        $this->load->library('pagination');
		        $discussionid = $this->uri->segment(3); 
		        $config['base_url'] = site_url().'forum/discussion/'.$discussionid.'/';
		        $config['total_rows'] = $this->db->get_where('forum_reply', array('discussionid' => $discussionid))->num_rows(); 
		        $config['per_page'] = 10;
		        $config['uri_segment'] = 4; 
		        $segment = $this->uri->segment(4); 
		         
		        $config['num_links'] = $config['total_rows']/$config['per_page'];
		        $config['full_tag_open'] = '<ul class="pagination">';
		        $config['full_tag_close'] = '</ul>'; 
		        $config['cur_tag_open'] = '<li class="active"><a href="#">'; 
				$config['cur_tag_close'] = '</a></li>';
				$config['num_tag_open'] = '<li>'; 
				$config['num_tag_close'] = '</li>';
				$config['prev_link'] = '<li>&lt;';
				$config['next_tag_open'] = '<li>';
		         
		        $perpage = 10;
		        if ($discussionid == '') { redirect('/forum');}
		        $data->logged_in = $this->session->logged_in; 
		            
		        $data->discussionid = $discussionid;
		        $this->pagination->initialize($config);
		        
			    $id = $this->uri->segment(3);
			    $data->discussion = $this->forum_model->get_discussion($id, '', ''); 
			     
		        $this->load->helper('form');
		        $this->load->library('form_validation'); 
		         
	            $this->form_validation->set_rules('reply', 'Reply', 'required', array('required' => 'You forgot to type your reply! Try again'));
	
				 if ($this->form_validation->run() == false) { 
				    
				    $data->reply = $this->forum_model->get_reply($id, $perpage, $segment);
					$this->load->view('templates/head.inc.php', $data);
			        $this->load->view('templates/header', $data);
			        $this->load->view('user/forum/discussion', $data);
			        $this->load->view('templates/footer', $data);
		            
				 } else {
							
		                    // set variables from the form
		                    $reply          = $this->input->post('reply');  
		                    $userid         = $_SESSION['user_id'];
				           
		                    $this->forum_model->add_reply($id, $userid, $reply);
		                    $data->success = 'Your reply is added successfully. Remember if our moderators find any spam we will delete it without any notification';
		                     $data->reply = $this->forum_model->get_reply($id, $perpage, $segment);
		                  
		                    
							$this->load->view('templates/head.inc.php', $data);
					        $this->load->view('templates/header', $data);
					        $this->load->view('user/forum/discussion', $data);
					        $this->load->view('templates/footer', $data);
							
						 
						
			    }
			}
			 
}
