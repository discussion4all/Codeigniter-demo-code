<?php

class Mdl_contactus extends CI_Model {

    function get_data($id='',$srchKey='') {
		$where  = "";
		$srchKey = mysql_escape_string(trim($srchKey));
		
		if($id == "") {						
			if($srchKey != '' && $srchKey != 'Search'){
				$searchText = str_replace('SEARCH_TEXT', $srchKey ,  $this->SEARCH_WHERE );
				$where  .= $searchText;
			}									
		} else {
			$where .= " and ".$this->PK."=".mysql_escape_string($id)." ";
		}
		 $where .= " ORDER BY created_on desc ";
		$sql = " select * from ".$this->TABLE."  where del_in = 0  ".$where;
		return $this->db->query($sql); 
	}
 
	function saveData($id) {
		$data = $_POST['form'];
		//$data['customer_contact'] = ( strpos( $data['customer_contact'] , '+') === false ? '+'.$data['customer_contact'] : $data['customer_contact'] );
		if($_FILES['imageUpload']['error'] == 0 ){
		$res = $this->mdl_common->uploadFile('imageUpload','img','admin', time().$_FILES['imageUpload']['name']);
		
			if($res['success']){
				$data['customer_photo'] = $res['path'];
			}
		}
		$password = $this->input->post('customer_password');
		if($password != ''){
			$data['customer_password'] = md5($password);
		}
		if($id=='') {
			$data['created_on'] = date('Y-m-d H:i:s');
			$this->db->insert($this->TABLE,$data);	
			$id = $this->db->insert_id();	
                        setMessage( 'Record inserted successfully.','green');
		} else	{
			$this->db->where( $this->PK  , $id);
			$this->db->update($this->TABLE, $data); 
                        setMessage( 'Record updated successfully.','green');
                }
                return $id;
   	}
 
	function deleteData($id='') { 
	
		 $this->db->where($this->PK,$id);
		 $this->db->update($this->TABLE,array('del_in' => 1 ));
	}
}
