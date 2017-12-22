<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Appusers extends CI_Controller {

    // DB Config
    var $TABLE = 'eb_user';
    var $PK = 'user_id';
    // MVC config
    var $PANEL = 'admin';
    var $CONTROLLER = 'appusers';
    var $MODEL = 'admin/mdl_appusers';
    var $TITLE = 'User\'s';
    var $LIST_PAGE_NAME = 'admin/appusers/appusersListing';
    var $EDIT_PAGE_NAME = 'admin/appusers/appusersForm';
    var $EDIT_CONTROLLER_NAME = 'form';
    var $SEARCH_WHERE = " and ( user_email like '%SEARCH_TEXT%' or user_name  like '%SEARCH_TEXT%')";
    var $SEARCH_USER_TYPE = "and( user_service_type like '%SEARCH_TEXT%')";

    function Appusers() {
        parent::__construct();
        $this->mdl_common->checkAdminSession();
        $this->load->model($this->MODEL, 'model');
    }

    function index($start = '0') {
        if ($start == 's') {
            $start = 0;
            $searchUserType = $this->input->post('user_service_type');
            $searchKey = $this->input->post('searchText');
            $this->session->set_userdata('searchKey', $searchKey);
            $this->session->set_userdata('searchUserType', $searchUserType);
        } else {
            $searchKey = $this->session->userdata('searchKey');
            $searchUserType = $this->session->userdata('searchUserType');
        }

        $res = $this->model->get_data('', $searchKey, $searchUserType);
        $data = $this->mdl_common->pagiationData($this->PANEL . '/' . $this->CONTROLLER . '/index/', $res->num_rows(), $start, '4', '20');
        $data['searchKey'] = $searchKey;
        $data['searchUserType'] = $searchUserType;

        $this->session->set_userdata('start', $start);
        $this->load->view($this->LIST_PAGE_NAME, $data);
    }

    function form($id = '') {
        
        $this->edit_user = $id;
        
        $this->form_validation->set_rules('form[user_name]', 'User Fullname', 'trim|required');
        $this->form_validation->set_rules('form[user_email]', 'User Email', 'trim|required|callback_email_exist');
        //$this->form_validation->set_rules('form[customer_password]', 'Customer Password', 'trim|requiredt');


        if ($this->form_validation->run() == FALSE) {
            if (!$_POST && $id != '') {
                $res = $this->model->get_data($id);
                $res2 = $this->model->get_user_profile($id);
                $data = $res->row_array();
                $data['userProfile'] = $res2->row_array();
            } else {
                $data = $this->input->post('form');
                $data['userProfile'] = $this->input->post('form2');
            }
            $data['id'] = $id;

            $this->load->view($this->EDIT_PAGE_NAME, $data);
        } else {


            $id = $this->model->saveData($id);
            $start = $this->session->userdata('start');
            if ($start != '')
                redirect('admin/' . $this->CONTROLLER . '/index/' . $start);
            else
                redirect('admin/' . $this->CONTROLLER . '/index/s/');
        }
    }

    function deleteData($id = '', $status) {
        if ($id == "") {
            $data = $this->input->post('deletes');
        } else {
            $data = array($id);
        }

        foreach ($data as $Id) {
            $this->model->deleteData($Id);
        }

        $start = $this->session->userdata('start');
        if ($id == "") {
            setMessage('Selected records deleted successfully.', 'green');
            redirect('admin/' . $this->CONTROLLER . '/index/' . $start);
        }
    }

    function email_exist($str) {
        $this->db->where('' . $this->PK . ' != ', $this->edit_user);
        $this->db->where('user_email', $str);
        $prod = $this->db->get($this->TABLE);

        if ($prod->row()) {
            $this->form_validation->set_message('email_exist', 'This email is already registered.');
            return FALSE;
        } else
            return TRUE;
    }

}

?>