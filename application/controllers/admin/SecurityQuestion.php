<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class SecurityQuestion extends CI_Controller {

    // DB Config
    var $TABLE = 'eb_security_question';
    var $PK = 'sq_id';
    // MVC config
    var $PANEL = 'admin';
    var $CONTROLLER = 'SecurityQuestion';
    var $MODEL = 'admin/Mdl_securityquestion';
    var $TITLE = 'Security Question';
    var $LIST_PAGE_NAME = 'admin/securityquestion/sqListing';
    var $EDIT_PAGE_NAME = 'admin/securityquestion/sqForm';
    var $EDIT_CONTROLLER_NAME = 'form';
    var $SEARCH_WHERE = " and ( sq_title like '%SEARCH_TEXT%' )";

    function SecurityQuestion() {
        parent::__construct();
        $this->mdl_common->checkAdminSession();
        $this->load->model($this->MODEL, 'model');
    }

    function index($start = '0') {
        if ($start == 's') {
            $start = 0;
            $searchKey = $this->input->post('searchText');
            $this->session->set_userdata('searchKey', $searchKey);
        } else {
            $searchKey = $this->session->userdata('searchKey');
        }

        $res = $this->model->get_data('', $searchKey);
        $data = $this->mdl_common->pagiationData($this->PANEL . '/' . $this->CONTROLLER . '/index/', $res->num_rows(), $start, '4', '20');
        $data['searchKey'] = $searchKey;

        $this->session->set_userdata('start', $start);
        $this->load->view($this->LIST_PAGE_NAME, $data);
    }

    function form($id = '') {
        $this->edit_user = $id;
        $this->form_validation->set_rules('form[sq_question]', 'Question', 'trim|required');
        
        
        if ($this->form_validation->run() == FALSE) {
            if (!$_POST && $id != '') {
                $res = $this->model->get_data($id);
                $data = $res->row_array();
            } else {
                $data = $this->input->post('form');
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
}

?>