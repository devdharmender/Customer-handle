<?php
class Not_interested extends CI_Controller
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
            $params['status'] = 5;
            $resultdata = $this->app_model->getFilterData($params);
            $data['actual_link'] = $this->session->userdata('actual_link');
            $data['data'] = $resultdata;
            $data['queryString'] = $queryString;
        } else {
            $params['status'] = 5;
            $count = $this->app_model->getDataCount($params);
            $config['base_url'] = base_url('admin/not_interested/index');
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

            $params['status'] = 5;
            $resultdata = $this->app_model->getData($params);
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

        $this->load->view('admin/not-interested/list', $data);
    }

    // public function add()
    // {
    //     $this->form_validation->set_rules('name', 'Name', 'required');
    //     $this->form_validation->set_rules('phone', 'Phone', 'required');
    //     // $this->form_validation->set_rules('email', 'Email', 'required');
    //     $this->form_validation->set_error_delimiters('<p class="invalid-feedback d-block">', '</p>');

    //     if ($this->form_validation->run() == TRUE) {
    //         $formArray['name'] = $this->input->post('name');
    //         $formArray['phone'] = $this->input->post('phone');
    //         $formArray['email'] = $this->input->post('email');
    //         $formArray['location'] = $this->input->post('location');
    //         $formArray['date'] = Date("Y-m-d h:i:s");
    //         $formArray['status'] = $this->input->post('status');
    //         $formArray['address'] = $this->input->post('address');
    //         $formArray['issue'] = $this->input->post('issue');

    //         $this->app_model->create($formArray);

    //         $this->session->set_flashdata('success', 'Create new data successfully');
    //         redirect(base_url() . 'admin/home');
    //     } else {
    //         // Notification
    //         $data['status'] = 0;
    //         $data['date'] = date('y-m-d');
    //         $data['notification'] = $this->app_model->notification('main_table',$data);
    //         $data['notic_rows'] = $this->app_model->notic_rows('main_table',$data);
    //         $this->load->view('admin/not-interested/add',$data);
    //     }
    // }

    public function edit($id)
    {
        $editdata = $this->app_model->getEditData($id);
        // print_r($editdata);
        // die;
        if (empty($editdata)) {
            $this->session->set_flashdata('error', 'Data not Found');
            redirect(base_url() . 'admin/Follow_up/index');
        }

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        // $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback d-block">', '</p>');

        if ($this->form_validation->run() == TRUE) {
            $formArray['name'] = $this->input->post('name');
            $formArray['phone'] = $this->input->post('phone');
            $formArray['email'] = $this->input->post('email');
            $formArray['location'] = $this->input->post('location');
            $formArray['update_at'] = Date("Y-m-d h:i:s");
            $formArray['status'] = $this->input->post('status');
            $formArray['address'] = $this->input->post('address');
            $formArray['issue'] = $this->input->post('remark');
            
            $this->app_model->update($id, $formArray);

            $this->session->set_flashdata('success', 'Update data successfully');

            $actual_link = $this->session->userdata('actual_link');
            redirect($actual_link);
        } else {
            $data['editdata'] = $editdata;
            $last_url = $this->session->userdata('last_url');
            $this->session->set_userdata('actual_link', $last_url);  
        }
        // Notification
        $data['status'] = 0;
        $data['date'] = date('y-m-d');
        $data['notification'] = $this->app_model->notification('main_table',$data);
        $data['notic_rows'] = $this->app_model->notic_rows('main_table',$data);

        $this->load->view('admin/not-interested/edit', $data);
    }

    public function delete($id)
    {
        $deletedata = $this->app_model->getEditData($id);
        if (empty($deletedata)) {
            $this->session->set_flashdata('error', 'Data not Found');
            redirect(base_url() . 'admin/not_interested/index');
        }

        $deletedata = $this->app_model->delete($id);
        $this->session->set_flashdata('success', 'Delete data successfully');
        $last_url = $this->session->userdata('last_url');
        header("Refresh:0; url=$last_url");
        // redirect(base_url() . 'admin/home');
    }

    public function view($id)
    {
        $params['id'] = $id;
        $params['status'] = 5;
        $data['view_data'] = $this->app_model->user_view($params);
        $data['last_url'] = $this->session->userdata('last_url');

        // Notification
        $data['status'] = 0;
        $data['date'] = date('y-m-d');
        $data['notification'] = $this->app_model->notification('main_table',$data);
        $data['notic_rows'] = $this->app_model->notic_rows('main_table',$data);
        
        $this->load->view('admin/not-interested/user_view',$data);
    }

    public function recent_post()
    {
        // Notification
        $data['status'] = 0;
        $data['date'] = date('y-m-d');
        $data['notification'] = $this->app_model->notification('main_table',$data);
        $data['notic_rows'] = $this->app_model->notic_rows('main_table',$data);
        $data['actual_link'] = $this->session->userdata('actual_link');
        $this->load->view('admin/recent-post',$data);
    }
    
}
