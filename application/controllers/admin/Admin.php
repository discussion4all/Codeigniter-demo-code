<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Admin extends CI_Controller {



    // DB Config

    var $TABLE = 'eb_admin';

    var $PK = 'admin_id';

    var $PASSWORD_FIELD = 'admin_password';

    // MVC config

    var $PANEL = 'admin';

    var $CONTROLLER = 'Admin';

    var $MODEL = 'admin/Mdl_admin';

    var $TITLE = 'Admin';

    var $LIST_PAGE_NAME = 'admin/login';

    var $CHANGE_PASSWORD = 'changePassword';

    var $CHANGE_PASSWORD_FORM = 'admin/chagepass_form';

    var $FORGOT_PASSWORD_FORM = 'admin/forgotpassword';



    function Admin() {



        parent::__construct();

        $this->load->model($this->MODEL, 'model');

    }



    function index() {



        

        if ($_POST) {

            $user = $this->input->post('username');

            $pass = ($this->input->post('password'));



            if ($this->model->loginValidate($user, $pass)) {

              

                redirect('admin/appusers/index/s');

            } else {

  

                $data['username'] = $this->input->post('username');

                $data['password'] = $this->input->post('password');

                $data['error'] = "Username and password doesn't match !";

                $this->load->view($this->LIST_PAGE_NAME, $data);

            }

        } else

            $this->load->view($this->LIST_PAGE_NAME);

    }



    function changePassword() {

        $this->mdl_common->checkAdminSession();

        $data = array('error' => '');

        $this->form_validation->set_rules('oldPassword', 'Old Password', 'trim|required|callback_password_exist');

        $this->form_validation->set_rules('newPassword', 'New Password', 'trim|required');

        $this->form_validation->set_rules('retypePassword', 'Retype Password', 'trim|required|matches[newPassword]');

        if ($this->form_validation->run() == FALSE) {

            $data['oldPassword'] = $this->input->post('oldPassword');

            $data['newPassword'] = $this->input->post('newPassword');

            $data['retypePassword'] = $this->input->post('retypePassword');

            $this->load->view($this->CHANGE_PASSWORD_FORM, $data);

        } else {

            $this->model->oldPassword = md5($this->input->post("oldPassword"));

            $this->model->newPassword = md5($this->input->post("newPassword"));

            $this->model->changePassword();

            $data = array('error' => 'Your Password has been changed successfully');

            $this->load->view($this->CHANGE_PASSWORD_FORM, $data);

        }

    }



    function forgotPassword() {

        if ($_POST) {

            $username = $this->input->post('username');

            if ($this->model->forgotValidate($username)) {

                $data['admin_username'] = $this->input->post('username');

                $data['error'] = "You have recieved password at your email.";

                $this->load->view($this->FORGOT_PASSWORD_FORM, $data);

            } else {

                $data['admin_username'] = $this->input->post('username');

                $data['error'] = "Username or email address is not registered with us.";

                $this->load->view($this->FORGOT_PASSWORD_FORM, $data);

            }

        } else

            $this->load->view($this->FORGOT_PASSWORD_FORM);

    }



    function logout() {

        $this->session->sess_destroy();

        redirect('admin/Admin');

    }



    function password_exist($str) {

        $this->db->where($this->PASSWORD_FIELD, md5($str));

        $this->db->where($this->PK, $this->session->userdata("admin_id"));

        $this->db->select($this->PASSWORD_FIELD);

        $prod = $this->db->get($this->TABLE);

        if ($prod->row())

            return TRUE;

        else {

            $this->form_validation->set_message('password_exist', 'Please enter correct password.');

            return FALSE;

        }

    }



}



?>