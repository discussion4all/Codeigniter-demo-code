<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Faq extends CI_Controller {

    // DB Config
    var $TABLE = 'eb_faq';
    var $PK = 'faq_id';
    // MVC config
    var $PANEL = 'admin';
    var $CONTROLLER = 'Faq';
    var $MODEL = 'admin/Mdl_faq';
    var $TITLE = 'FAQ';
    var $LIST_PAGE_NAME = 'admin/faq/faqListing';
    var $EDIT_PAGE_NAME = 'admin/faq/faqForm';
    var $EDIT_CONTROLLER_NAME = 'form';
    var $SEARCH_WHERE = " and ( faq_title like '%SEARCH_TEXT%'  or faq_description  like '%SEARCH_TEXT%' )";

    function Faq() {
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
        $this->form_validation->set_rules('form[faq_title]', 'Title', 'trim|required');
        $this->form_validation->set_rules('form[faq_description]', 'Description', 'required');
        
        
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

    function email_exist($str) {
        $this->db->where('' . $this->PK . ' != ', $this->edit_user);
        $this->db->where('customer_email', $str);
        $prod = $this->db->get($this->TABLE);

        if ($prod->row()) {
            $this->form_validation->set_message('email_exist', 'This email is already registered.');
            return FALSE;
        } else
            return TRUE;
    }

    function username_exist($str) {
        $this->db->where('' . $this->PK . ' != ', $this->edit_user);
        $this->db->where('customer_username', $str);
        $prod = $this->db->get($this->TABLE);

        if ($prod->row()) {
            $this->form_validation->set_message('username_exist', 'This Username is already registered please choose another name.');
            return FALSE;
        } else
            return TRUE;
    }

}

?>