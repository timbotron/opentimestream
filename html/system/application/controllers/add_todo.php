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
			$this->load->view('add_todo_input');
		}
		else
		{
			$this->load->database();
			$itemtime = $this->input->post('day') . " " . $this->input->post('hour');
			$itemtime = strtotime($itemtime);
			
			//YYYY-MM-DD HH:MM:SS
			$itemtime = date("Y-m-d H:i:s",$itemtime);  //need to do mojo for timezones
			$uid = date("dHs"); //need to figure out actual uid design
			$nowdate = date("Y-m-d H:i:s");
			$data = array('id'=>'','userid'=>1,'uid'=>$uid,'dtstamp'=>$nowdate,'due'=>$itemtime,'status'=>0,'summary'=>$this->input->post('summary'),'alarm'=>0);
			
			$this->db->insert('ots_todo',$data);
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


/* End of file Add_todo.php */
/* Location: ./system/application/controllers/add_todo.php */
