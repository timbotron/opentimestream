<?php

class Add_todo extends Controller {

	function Add_todo()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$this->load->helper(array('form', 'url', 'html'));	
		$this->load->library('form_validation');
		
		
		$this->load->view('header_view');
        $this->load->view('menu_view');
		
		$this->form_validation->set_rules('summary', 'Summary', 'required|xss_clean');
		$this->form_validation->set_rules('day', 'Day', 'required|callback_valid_date'); //custom valid_date !
		$this->form_validation->set_rules('hour', 'Hour', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('add_todo_input');  //form validation failed
		}
		else
		{
			//form data ok, entering to db
			$this->load->database();
			$this->load->model('Db_mojo');
			$this->Db_mojo->insert_todo();
			
			$this->load->view('success');
		}
		
		$this->load->view('footer_view');
	}
	
	function valid_date()  //checks to see if the day and hour, melded together are a real date.
	{
		$itemtime = $this->input->post('day') . " " . $this->input->post('hour');
		if (($itemtime = strtotime($itemtime)) === FALSE)
		{
			$this->form_validation->set_message('valid_date', 'The Day or hour field is invalid.');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
}


/* End of file add_todo.php */
/* Location: ./system/application/controllers/add_todo.php */
