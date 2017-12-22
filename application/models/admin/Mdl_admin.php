<?php 
class Mdl_admin extends CI_Model {
	    var $srchKey;

    function forgotValidate($user) {

        $sql = 'select * from '.$this->TABLE.' where del_in="0" and ( admin_email = "' . $user . '" or admin_username = "' . $user . '")    ';
        $qa = $this->db->query($sql);

        if ($qa->num_rows() > 0) {
            $resData = $qa->row();
            $password = generateRandom(6);
            $data[$this->PASSWORD_FIELD] = md5($password);
            $this->db->where($this->PK, $resData->admin_id);
            $this->db->update($this->TABLE, $data);
            $body = 'Hello '.$resData->admin_username.',<br/><br/>We are sorry to hear that you forgot your password. Here is your login details with new password :<br/><br/>Username : '.$resData->admin_username.'<br/>Password : '.$password.'<br/><br/>If you are facing any issues then feel free to contact us at support@silvergold22.com<br/><br/>Thank you.<br/>';
   
            $this->mdl_common->sendMail($resData->admin_email, '', 'Forgot password', $body);
            return true;
        } else {
                return false;
        }
    }
    function loginValidate($user, $pass) {
     
        $sql = 'select * from '.$this->TABLE.' where del_in="0" and (admin_email = "' . $user . '" or admin_username = "' . $user . '") and '.$this->PASSWORD_FIELD.' ="' . md5($pass) . '"';
        $qa = $this->db->query($sql);
        if ($qa->num_rows() > 0) {
            $resData = $qa->row();
            $userdata = array(
                'admin_id' => $resData->admin_id,
                'admin_username' => ($resData->admin_username),
                'admin_email' => ($resData->admin_email),
                'per_page' => '20'
            );
           
            $this->session->set_userdata($userdata);
               
        
            return true;
        }
    }
    function changePassword() {
        $newPassword = $this->newPassword;
        $db_array = array($this->PASSWORD_FIELD => $newPassword);
        $this->db->where($this->PK, $this->session->userdata("admin_id"));
        $this->db->update($this->TABLE, $db_array);
    }
}
?>