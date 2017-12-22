<?php
class Mdl_common extends CI_Model
{
 	
	function checkAdminSession(){		 
		if($this->session->userdata('admin_id') == "" ){
			redirect('admin/admin');
		}		  
	}
	
	function check_session(){						
		if($this->session->userdata('user_id') == "" )
			redirect('/');
	}	
		
    function pagiationData($str,$num,$start,$segment,$per_page='20' ){
	 
		$config['base_url'] = base_url().$str;
			
		$config['total_rows'] = $num;
		if($per_page!='')
			$config['per_page'] = $per_page;
		else {
			
			if($this->session->userdata('per_page')=='')
				$this->session->set_userdata('per_page',20);
				
			$config['per_page']=$this->session->userdata('per_page');
		}
		$config['uri_segment'] = $segment;
		$config['first_link']=false;
		$config['last_link']=false;
		$config['full_tag_open'] = '<div id="pagination" style="display:inline;">';
		$config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config); 
	 
		$query = $this->db->last_query()." LIMIT ".$start." , ".$config['per_page'];
		$res = $this->db->query($query);
	
		$data['listArr'] = $res->result_array();
		$data['num'] = $res->num_rows();
		$data['links'] =  $this->pagination->create_links();
		return $data;
 
	}
	
	function per_page_drop(){
		$dropdown = array('20'=>'20 Per Page','40'=>'40 Per Page','60'=>'60 Per Page');
		return $dropdown;
	}	 
	 
	function dropDownAry($sql,$keyField,$valueField,$selectFiled="")
	{
		$dropDown = array();
		
		//if select is required in drop down
		if($selectFiled == "Y")
			$dropDown['Select'] = "Select";
		else if($selectFiled != "")
			$dropDown['Select'] = $selectFiled;
		
		$result = $this->db->query($sql);
		foreach($result->result_array() as $res)
		{
			$key = $res[$keyField];
			$dropDown[$key] = $res[$valueField];
		}
		return $dropDown;
	}
	
	function uploadFile($uploadFile,$filetype,$folder,$fileName='')
	{
		$resultArr = array();
		
		$config['max_size'] = '1024000';
		if($filetype == 'img') 	$config['allowed_types'] = 'gif|jpg|png|jpeg';
		if($filetype == 'All') 	$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|zip|xls';
		if($filetype == 'swf') 	$config['allowed_types'] = 'swf';
		if($filetype == 'html') 	$config['allowed_types'] = 'html|htm';
		
		if($filetype == 'video') 	$config['allowed_types'] = 'csv|mp4|3gp|vob|flv';
		if($filetype == 'DOC') 	$config['allowed_types'] = 'doc|docx';
		if($filetype == 'XLS') 	$config['allowed_types'] = 'xls|xlsx';
		if($filetype == 'PPT') 	$config['allowed_types'] = 'ppt';
		if($filetype == 'PDF') 	$config['allowed_types'] = 'pdf';

		if(substr($folder,0,17)=='application/views')
			$config['upload_path'] = './'.$folder.'/';
		else
			$config['upload_path'] = './uploads/'.$folder.'/';
			
		if($fileName != "")
			$config['file_name'] = $fileName;
		
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		
		if(!$this->upload->do_upload($uploadFile))
		{
			$resultArr['success'] = false;
			$resultArr['error'] = $this->upload->display_errors();
		}	
		else
		{
			$resArr = $this->upload->data();
			$resultArr['success'] = true;
			if(substr($folder,0,17)=='application/views')
				$resultArr['path'] = $folder.'/'.$resArr['file_name'];
			else
				$resultArr['path'] = "uploads/".$folder."/".$resArr['file_name'];
		}
		return $resultArr;
	}
 
	

	function sendMail($to,$from,$subject,$message,$attachmentName='',$attachmentFiled='')
	{
        if($_SERVER['HTTP_HOST'] == 'localhost'){
                
			require_once "dSendMail2.inc.php";			  
			$m = new dSendMail2;
			
			$from = 'dilip@artoonsolutions.com';
			$m->setTo($to);
			
			//'"Destinatario" <no-reply@cred3.com>';
			//$m->setFrom($from,'akash.italiya@artoonsolutions.com'); /*akash*/
			$m->setFrom($from,'Keatlog'); 
			$m->setSubject($subject);
			$m->setMessage($message);     		 
			
			if($attachmentFiled){ 
				// Attach the file.
				$m->autoAttachFile($attachmentName, file_get_contents($attachmentFiled));
			}
			
			// Real GMail example: 
			$m->sendThroughSMTP("smtp.gmail.com", 465, 'dilip@artoonsolutions.com', 'kerosene', true);/*akash*/ 
			$m->send();  
			
		} else {
			
			//headers
			$headers = "MIME-version: 1.0\n";
			$headers.= "Content-type: text/html; charset= iso-8859-1\n"; 
			$headers .= "From: Cybella Applications <".$from .">\n"; 
					
			mail($to,$subject,$message,$headers);
		}
	
	}	  	 
}