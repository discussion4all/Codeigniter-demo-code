<?php

class Mdl_faq extends CI_Model {

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
