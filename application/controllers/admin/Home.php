<?php
class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $admin = $this->session->userdata('admin');
        if (empty($admin)) {
            $this->session->set_flashdata('msg', 'You are not logged In');
            redirect(base_url() . 'admin/login/index');
        }
    }

    public function index($page = 1)
    {
        $queryString = $this->input->get('q');
        if ($queryString != '') {
            $params['queryString'] = $queryString;
            $resultdata = $this->dashboard_model->getFilterData($params);
            $data['actual_link'] = $this->session->userdata('actual_link');
            $data['data'] = $resultdata;
            $data['queryString'] = $queryString;
        } else {

            $count = $this->dashboard_model->getDataCount();
            $config['base_url'] = base_url('admin/home/index');
            $config['use_page_numbers'] = TRUE;
            $config['total_rows'] = $count;
            $config['per_page'] = 25;

            $config['first-link'] = 'First';
            $config['last_link'] = 'Last';
            $config['next_link'] = 'Next';
            $config['prev_link'] = 'Prev';
            $config['full_tag_open'] = '<ul class="pagination justify-content-end">';
            $config['full_tag_close'] = '</ul>';
            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="disabled page-item"><li class="active page-item"><a href="#" class="page-link">';
            $config['cur_tag_close'] = '<span class="sr-only"></span></a></li>';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tagl_close'] = '</li>';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tagl_close'] = '</li>';
            $config['attributes'] = array('class' => 'page-link');

            $this->pagination->initialize($config);
            $pagination_links = $this->pagination->create_links();
            $params['offset'] = $config['per_page'];
            $params['limit'] = ($page * $config['per_page']) - $config['per_page'];
            $resultdata = $this->dashboard_model->getData($params);
            $data['data'] = $resultdata;
            $data['queryString'] = $queryString;
            $data['pagination_links'] = $pagination_links;

        }
        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $this->session->set_userdata('last_url', $actual_link);

        // Notification
        $data['status'] = 0;
        $data['date'] = date('y-m-d');
        $data['notification'] = $this->dashboard_model->notification('main_table',$data);
        $data['notic_rows'] = $this->dashboard_model->notic_rows('main_table',$data);

        $this->load->view('admin/dashboard/list', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|alpha');
        $this->form_validation->set_rules('phone', 'Phone', 'required|regex_match[/^[0-9]{10}$/]');
        // $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback d-block">', '</p>');

        if ($this->form_validation->run() == TRUE) {
            $formArray['name'] = $this->input->post('name');
            $formArray['phone'] = $this->input->post('phone');
            $formArray['email'] = $this->input->post('email');
            $formArray['location'] = $this->input->post('location');
            $formArray['date'] = Date("Y-m-d h:i:s");
            $formArray['status'] = $this->input->post('status');
            $formArray['address'] = $this->input->post('address');
            $formArray['issue'] = $this->input->post('issue');

            $this->dashboard_model->create($formArray);

            $this->session->set_flashdata('success', 'Create new data successfully');
            redirect(base_url() . 'admin/home');
        } else {
            // Notification
            $data['status'] = 0;
            $data['date'] = date('y-m-d');
            $data['notification'] = $this->dashboard_model->notification('main_table',$data);
            $data['notic_rows'] = $this->dashboard_model->notic_rows('main_table',$data);
            $this->load->view('admin/dashboard/add',$data);
        }
    }

    public function edit($id)
    {
        
        $editdata = $this->dashboard_model->getEditData($id);
        if (empty($editdata)) {
            $this->session->set_flashdata('error', 'Data not Found');
            redirect(base_url() . 'admin/home/index');
        }

        $this->form_validation->set_rules('address', 'Conversation Status', 'required');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback d-block">', '</p>');

        if ($this->form_validation->run() == TRUE) {
            $formArray['location'] = $this->input->post('location');
            $formArray['update_at'] = Date("Y-m-d h:i:s");
            $formArray['status'] = $this->input->post('status');
            $formArray['address'] = $this->input->post('address');
            $formArray['issue'] = $this->input->post('remark');
            
            $this->dashboard_model->update($id, $formArray);

            $this->session->set_flashdata('success', 'Update data successfully');

            echo $actual_link = $this->session->userdata('actual_link');
            redirect($actual_link);
        } else {
            $data['editdata'] = $editdata;
            $last_url = $this->session->userdata('last_url');
            $this->session->set_userdata('actual_link', $last_url);  
        }
        // Notification
        $data['status'] = 0;
        $data['date'] = date('y-m-d');
        $data['notification'] = $this->dashboard_model->notification('main_table',$data);
        $data['notic_rows'] = $this->dashboard_model->notic_rows('main_table',$data);

        $this->load->view('admin/dashboard/edit', $data);
    }

    public function delete($id)
    {
        $deletedata = $this->dashboard_model->getEditData($id);
        if (empty($deletedata)) {
            $this->session->set_flashdata('error', 'Data not Found');
            redirect(base_url() . 'admin/home/index');
        }

        $deletedata = $this->dashboard_model->delete($id);
        $this->session->set_flashdata('success', 'Delete data successfully');
        $last_url = $this->session->userdata('last_url');
        header("Refresh:0; url=$last_url");
        // redirect(base_url() . 'admin/home');
    }

    public function view($id)
    {
        $params['id'] = $id;
        $data['view_data'] = $this->dashboard_model->user_view($params);
        $data['last_url'] = $this->session->userdata('last_url');

        // Notification
        $data['status'] = 0;
        $data['date'] = date('y-m-d');
        $data['notification'] = $this->dashboard_model->notification('main_table',$data);
        $data['notic_rows'] = $this->dashboard_model->notic_rows('main_table',$data);
        
        $this->load->view('admin/dashboard/user_view',$data);
    }

    public function recent_post()
    {
        // Notification
        $data['status'] = 0;
        $data['date'] = date('y-m-d');
        $data['notification'] = $this->dashboard_model->notification('main_table',$data);
        $data['notic_rows'] = $this->dashboard_model->notic_rows('main_table',$data);
        $data['actual_link'] = $this->session->userdata('actual_link');
        $this->load->view('admin/recent-post',$data);
    }
    // for self visit
    // public function self_visit(){
    //     $this->load->view('admin/dashboard/self');
    // }
    public function self_visit($page = 1)
    {
        $queryString = $this->input->get('q');
        if ($queryString != '') {
            $params['queryString'] = $queryString;
            $params['status'] = 7;
            $resultdata = $this->app_model->getFilterData($params);
            $data['actual_link'] = $this->session->userdata('actual_link');
            $data['data'] = $resultdata;
            $data['queryString'] = $queryString;
        } else {
            $params['status'] = 7;
            $count = $this->app_model->getDataCount($params);
            $config['base_url'] = base_url('admin/home/self_visit');
            $config['use_page_numbers'] = TRUE;
            $config['total_rows'] = $count;
            $config['per_page'] = 25;

            $config['first-link'] = 'First';
            $config['last_link'] = 'Last';
            $config['next_link'] = 'Next';
            $config['prev_link'] = 'Prev';
            $config['full_tag_open'] = '<ul class="pagination justify-content-end">';
            $config['full_tag_close'] = '</ul>';
            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="disabled page-item"><li class="active page-item"><a href="#" class="page-link">';
            $config['cur_tag_close'] = '<span class="sr-only"></span></a></li>';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tagl_close'] = '</li>';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tagl_close'] = '</li>';
            $config['attributes'] = array('class' => 'page-link');

            $this->pagination->initialize($config);
            $pagination_links = $this->pagination->create_links();
            $params['offset'] = $config['per_page'];
            $params['limit'] = ($page * $config['per_page']) - $config['per_page'];

            $params['status'] = 7;
            $resultdata = $this->app_model->self($params);
            $data['data'] = $resultdata;
            $data['queryString'] = $queryString;
            $data['pagination_links'] = $pagination_links;

        }
        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $this->session->set_userdata('last_url', $actual_link);

        // Notification
        $data['status'] = 0;
        $data['date'] = date('y-m-d');
        $data['notification'] = $this->app_model->notification('main_table',$data);
        $data['notic_rows'] = $this->app_model->notic_rows('main_table',$data);
        // echo "<pre>";
        // print_r($data);exit;
        $this->load->view('admin/dashboard/self', $data);
    }
    public function future($page = 1)
    {
        $queryString = $this->input->get('q');
        if ($queryString != '') {
            $params['queryString'] = $queryString;
            $params['status'] = 8;
            $resultdata = $this->app_model->getFilterData($params);
            $data['actual_link'] = $this->session->userdata('actual_link');
            $data['data'] = $resultdata;
            $data['queryString'] = $queryString;
        } else {
            $params['status'] = 8;
            $count = $this->app_model->getDataCount($params);
            $config['base_url'] = base_url('admin/home/self_visit');
            $config['use_page_numbers'] = TRUE;
            $config['total_rows'] = $count;
            $config['per_page'] = 25;

            $config['first-link'] = 'First';
            $config['last_link'] = 'Last';
            $config['next_link'] = 'Next';
            $config['prev_link'] = 'Prev';
            $config['full_tag_open'] = '<ul class="pagination justify-content-end">';
            $config['full_tag_close'] = '</ul>';
            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="disabled page-item"><li class="active page-item"><a href="#" class="page-link">';
            $config['cur_tag_close'] = '<span class="sr-only"></span></a></li>';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tagl_close'] = '</li>';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tagl_close'] = '</li>';
            $config['attributes'] = array('class' => 'page-link');

            $this->pagination->initialize($config);
            $pagination_links = $this->pagination->create_links();
            $params['offset'] = $config['per_page'];
            $params['limit'] = ($page * $config['per_page']) - $config['per_page'];

            $params['status'] = 8;
            $resultdata = $this->app_model->self($params);
            $data['data'] = $resultdata;
            $data['queryString'] = $queryString;
            $data['pagination_links'] = $pagination_links;

        }
        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $this->session->set_userdata('last_url', $actual_link);

        // Notification
        $data['status'] = 0;
        $data['date'] = date('y-m-d');
        $data['notification'] = $this->app_model->notification('main_table',$data);
        $data['notic_rows'] = $this->app_model->notic_rows('main_table',$data);
        // echo "<pre>";
        // print_r($data);exit;
        $this->load->view('admin/dashboard/future', $data);
    }
    
}
