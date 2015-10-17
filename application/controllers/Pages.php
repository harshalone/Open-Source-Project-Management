<?php
class Pages extends CI_Controller {

        public function view($page = 'welcome_message')
        {
          if ( ! file_exists(APPPATH.'/views/'.$page.'.php'))
	        {
	                // Whoops, we don't have a page for that!
	                show_404();
	        }
	
	        $data['title'] = ucfirst($page); // Capitalize the first letter
	
	        $this->load->view('templates/head.inc.php', $data);
	        $this->load->view('templates/header', $data);
	        $this->load->view($page, $data);
	        $this->load->view('templates/footer', $data);
        }
}