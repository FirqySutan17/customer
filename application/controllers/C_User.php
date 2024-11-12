<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CI_User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Main');
        $this->load->library('session');
        $this->load->helper('url');
		$this->load->helper('form');

	}

	public function index()
	{
		
		$this->load->view('afterLogin/V_dashboard');
	}

	public function login()
	{
		$this->load->view('beforeLogin/V_login');
	}

	public function login_data(){
		if (isset($_POST['user_suja'])) {
            $user_suja = $this->input->post('user');
            $password = $this->input->post('password');
            $plant = $this->input->post('plant');

            $user_ok = str_replace("'","",$user_suja);
            $password_ok = str_replace("'","",$password);
            $plant_ok = str_replace("'","",$plant);
            $login = $this->M_Main->m_login($user_ok, $password_ok);
            if ($login == 1) {
            	redirect('main');
            } else {
            	// echo "salah";
            	$this->session->set_flashdata('message', '
					<div class="alert alert-danger" role="alert">
                        <strong>Failed!</strong> Wrong user or password
                    </div>
					');
				redirect();
            }
        }
	}

	public function register()
	{
		$this->load->view('beforeLogin/V_Register');
	}

	public function user()
	{
		$menu = "user";
		$this->load->view('afterLogin/V_user');
	}

	public function data()
	{
		$menu = "data";
		$this->load->view('afterLogin/V_user');
	}



}
