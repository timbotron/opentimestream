<?php

class Simpleshow extends Controller {

	function Simpleshow()
	{
		parent::Controller();	
	}
	
	function index()
	{
        $this->load->helper('html');
		$this->load->view('header_view');
        $this->load->view('menu_view');
        
        //need all todo items for user 1
        $this->load->model('Db_mojo','',TRUE);  //the TRUE means to have the model connect to the db
		$data['results'] = $this->Db_mojo->usercal(); //weird how it has to be an array..
		$this->load->view('show_user',$data);
		$this->load->view('footer_view');
	}
}


/* End of file simpleshow.php */
/* Location: ./system/application/controllers/simpleshow.php */
