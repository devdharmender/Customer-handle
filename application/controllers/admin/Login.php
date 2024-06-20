<?php
class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // echo password_hash('admin@98765', PASSWORD_DEFAULT);
        $this->load->view('admin/login');
    }

    public function authenticate()
    {
        // $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        // Form validation check
        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $admin = $this->admin_model->getByUserName($email,$password);
            // print_r($admin);exit;
           

            // Return data check by using admin_model 
            if (!empty($admin)) {
                    $adminArray = array(
                        'id' => $admin->id,
                        'name' => $admin->name,
                        'email' => $admin->email,
                        'status' => $admin->status,
                       
                    );
                    $this->session->set_userdata('admin',$adminArray);
                    redirect(base_url() . 'admin/home');
            } else {
                $this->session->set_flashdata('msg', 'Either Username or password is incorrect');
                redirect(base_url() . 'admin/login/index');
            }
        } else {
            // echo "error";
            $this->load->view('admin/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('admin');
        redirect(base_url() . 'admin/login/index');
    }
}
