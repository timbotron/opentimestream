<?php

class Db_mojo extends Model 
{

    var $id = '';
    var $userid = '';
    var $uid = '';
    var $dtstamp = '';
    var $due = '';
    var $status = '';
    var $summary = '';
    var $alarm = '';

    function Db_mojo()
    {
        // Call the Model constructor
        parent::Model();
    }

    function insert_todo()
    {
        $itemtime = $this->input->post('day') . " " . $this->input->post('hour');
		$itemtime = strtotime($itemtime);
		
		//YYYY-MM-DD HH:MM:SS
		$this->due = date("Y-m-d H:i:s",$itemtime);  //need to do mojo for timezones
		$this->userid = 1;
		$this->uid = date("dHs"); //need to figure out actual uid design
		$this->dtstamp = date("Y-m-d H:i:s");
		$this->summary = $this->input->post('summary');
		$this->status = 0;
		$this->alarm = 0;
		//$data = array('id'=>'','userid'=>1,'uid'=>$uid,'dtstamp'=>$nowdate,'due'=>$itemtime,'status'=>0,'summary'=>$this->input->post('summary'),'alarm'=>0);
		
		$this->db->insert('ots_todo',$this);        
    }

}

/* End of file db_mojo.php */
/* Location: ./system/application/controllers/add_todo.php */
