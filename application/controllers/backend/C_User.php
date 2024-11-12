<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_User');
		$this->load->model('M_Code');
		
		if (!empty($this->session->userdata('empno')) && $this->session->userdata('confirm') == 'N') {
			redirect('login');
		}
	}


	public function index() {
		if (!empty($this->session->userdata('empno')) && $this->session->userdata('admin') == 'N') {
			redirect('index');
		}
		$status = "all";
		$role 	= "all";
		if ($this->input->post()) {
	        $role     = $this->input->post('role');
	        $status    = $this->input->post('status');
	    }
		$user_list 		= $this->M_User->m_user_list($status, $role);
		
		$user_total		= count($user_list);
		$user_active	= 0;
		$user_pending	= 0;
		if (!empty($user_list)) {
			foreach ($user_list as $vl) {
				if ($vl->CONFIRM == "N") {
					$user_pending++;
				} else {
					$user_active++;
				}
			}
		}
		$data['user_total'] = $user_total;
		$data['user_active'] = $user_active;
		$data['user_pending'] = $user_pending;
		$data['user_list'] = $user_list;
		$data['filter'] = [
			"role"	=> $role,
			"status"	=> $status
		];
		$this->load->view('afterLogin/user/index',$data);

	}

	public function user_nonactive() {
		if ($this->input->post()) {
			$userID     = $this->input->post('ID_USER');
			$user_nonactive = $this->M_User->user_nonactive($userID);
		}
		redirect('admin');
	}
	
	public function detail($ID_USER) {
		if (!empty($this->session->userdata('empno')) && $this->session->userdata('admin') == 'N') {
			redirect('index');
		}
	    $list_customer = [];
	    $user 		= $this->M_User->m_user($ID_USER);
	    if ($this->input->post()) {
	        $userID     = $this->input->post('ID_USER');
	        $confirm    = $this->input->post('STATUS');
	        $customerIntegration = !empty($this->input->post('customerIntegration')) ? $this->input->post('customerIntegration') : 0;
	        $reason     = $this->input->post('REASON');
	        $date       = date("Ymd");
	        $emp        = $this->session->userdata('empno');
	        
	        $update_verify = $this->M_User->update_verify($userID, $confirm, $customerIntegration, $reason, $emp, $date);
	        if ($update_verify) {
	        	if ($confirm == "Y") {
	        		$body = "<h3>Hi $user->FULL_NAME</h3> <p>Akun anda sudah dikonfirmasi oleh Admin kami, silahkan login menggunakan username dan password yang diisi saat registrasi. Terima kasih!</p>";
				  	send_email($user->EMAIL, "Verifikasi SUJA Customer", $body);
	        	}
	            $this->session->set_flashdata('message', '
    			    <div class="alert alert-success" role="alert">
		                <strong>Sukses!</strong> Data berhasil diverifikasi
		            </div>
    			');
	        } else {
	            $this->session->set_flashdata('message', '
        			<div class="alert alert-danger" role="alert">
        		                <strong>Gagal!</strong> Data akun ditolak 
        		            </div>
        			');
	        }
	    }
	    
	    $user 		= $this->M_User->m_user($ID_USER);
	    $data['user'] = $user;
	    $data['list_customer'] = $list_customer;
		$this->load->view('afterLogin/user/detail',$data);
	}

	function user_add(){
		$this->load->view('afterLogin/user/tambah_user');
	}

	public function user_store(){
		// echo "<pre/>";print_r($_POST);exit;
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = 'init1234';
		$full_name = $this->input->post('full_name');
		$mobile_number = $this->input->post('mobile_number');
		$password_encrypt = password_hash($password, PASSWORD_DEFAULT);
		$date = date("Ymd");
	
		$sql_checkuser = "SELECT ID_USER FROM CD_USER WHERE EMPNO = '$username' OR EMAIL = '$email'";
		$checkuser = $this->db->query($sql_checkuser)->result();
		if (!empty($checkuser)) {
			$this->session->set_flashdata('message', '
			<div class="alert alert-danger p-5" role="alert">
						<strong>Registrasi Gagal!</strong> Username atau Email sudah dipakai
					</div>
			');
		} else {
			$sql = "
				INSERT INTO CD_USER
					(CUST, EMPNO, PASS, PASS_RAW, FULL_NAME, PHONE, EMAIL, COMP_NAME, WEBSITE, ADDRESS, CONFIRM, IS_ADMIN, REG_EMP, REG_DATE)
				VALUES
					(0, '$username','$password_encrypt', '$password', '$full_name', '$mobile_number', '$email', '', '', '', 'N','N', 'SYSTEM', '$date')
		  ";
		  $INSERTDATA = $this->db->query($sql);
		//   dd($INSERTDATA);
		}
		
	 
	  redirect('login');
	}

	function user_edit($ID_USER){
		$where = array('ID_USER' => $ID_USER);
		$data['user'] = $this->M_User->edit_data($where,'ID_USER')->row_array();
		// dd($data);
		$this->load->view('afterLogin/user/user_edit',$data);
	}

	function user_update(){
		$ID_USER = $this->input->post('id');
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$address = $this->input->post('address');
	 
		$data = array(
			'name' => $name,
			'email' => $email,
			'phone' => $phone,
			'address' => $address,
		);
	 
		$where = array(
			'ID_USER' => $ID_USER
		);
	//  dd($where);
		$this->M_User->update_acc($ID_USER, $name, $email, $phone, $address);
		$this->session->set_flashdata('message', '
    			    <div class="alert alert-success" role="alert">
		                <strong>Sukses!</strong> Data user berhasil diperbaharui
		            </div>
    			');
		redirect('admin');
	}

	function user_change_pass($ID_USER){
		$where = array('ID_USER' => $ID_USER);
		$data['user'] = $this->M_User->edit_data($where,'ID_USER')->row_array();
		// dd($data);
		$this->load->view('afterLogin/user/user_change_pass',$data);
	}

	function user_update_pass(){
		$id = $this->input->post('id');

        $passwordRaw = 'init1234';
		$password = password_hash($passwordRaw, PASSWORD_DEFAULT);
		// dd($id);
		// dd($password);
		// dd($passwordRaw);
        $this->M_User->update_user($id, $password, $passwordRaw);
		// dd($id, $passwordRaw, $password);
		redirect('admin');
	}
	
	public function profile_edit() {
	    if (empty($this->session->userdata('empno')) || $this->session->userdata('confirm') == 'N') {
			redirect('login');
		}

	    $ID_USER = $this->session->userdata('id_user');
		if ($this->input->post('submit')) {
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$phone = $this->input->post('phone');
			$address = $this->input->post('address');

			$update = $this->M_User->update_acc($ID_USER, $name, $email, $phone, $address);
		}

	    $user 		= $this->M_User->m_user($ID_USER);
	    $data['user'] = $user;
		$this->load->view('afterLogin/user/profile_edit',$data);
	}

	public function saldo() {
	    if (empty($this->session->userdata('empno')) || $this->session->userdata('confirm') == 'N') {
			redirect('login');
		}

	    $ID_USER = $this->session->userdata('id_user');
		$CUST = $this->session->userdata('cust');
	    $saldo = $this->M_User->saldo()->row();
		$YMD 		= date("Ymd");
	    $check_saldo 		= $this->M_User->m_check_saldo($YMD, $CUST)->row();
		if ($this->input->post('submit') && empty($check_saldo)) {
			// dd($_POST);
			$BG_REMAIN 	= $this->input->post('BG_REMAIN');
			$SALES_AMT 	= $this->input->post('SALES_AMT');
			$CASH_IN 	= $this->input->post('CASH_IN');
			$CN_AMOUNT 	= $this->input->post('CN_AMOUNT');
			$ED_REMAIN 	= $this->input->post('ED_REMAIN');
			$REMARKS 	= $this->input->post('REMARKS');
			$APPROVED_DATE 	= date("Y-m-d H:i:s");
			$APPROVED_USER 	= $ID_USER;
			$APPROVED_YN 	= $this->input->post('persetujuan');
			$COMPANY 	= 1;
			$APPROVED_USER 	= $ID_USER;

			$update = $this->M_User->insert_confirmation_saldo($APPROVED_DATE, $APPROVED_USER, $APPROVED_YN, $BG_REMAIN, $CASH_IN, $CN_AMOUNT, $COMPANY, $CUST, $ED_REMAIN, $SALES_AMT, $YMD);
		}

	    $user 		= $this->M_User->m_user($ID_USER);
	    $data['user'] = $user;
	    $data['saldo'] = $saldo;
	    $data['check_saldo'] = $check_saldo;
		$this->load->view('afterLogin/user/saldo',$data);
	}

	public function list_saldo() {
		if (empty($this->session->userdata('empno')) || $this->session->userdata('confirm') == 'N') {
			redirect('login');
		}
		$CUST = $this->session->userdata('cust');
		$saldo_history 		= $this->M_User->m_saldo_history($CUST)->result();
		$data['saldo_history'] = $saldo_history;
		$this->load->view('afterLogin/user/saldo_list',$data);

	}

	public function saldo_detail($YMD) {
	    if (empty($this->session->userdata('empno')) || $this->session->userdata('confirm') == 'N') {
			redirect('login');
		}

	    $ID_USER = $this->session->userdata('id_user');
		$CUST = $this->session->userdata('cust');
	    $saldo = $this->M_User->saldo()->row();
	    $check_saldo 		= $this->M_User->m_check_saldo($YMD, $CUST)->row();

	    $user 		= $this->M_User->m_user($ID_USER);
	    $data['user'] = $user;
	    $data['saldo'] = $saldo;
	    $data['check_saldo'] = $check_saldo;
		$this->load->view('afterLogin/user/saldo_detail',$data);
	}

	public function list_remainder() {
		if (empty($this->session->userdata('empno')) || $this->session->userdata('confirm') == 'N') {
			redirect('login');
		}
		$customer   = $this->session->userdata('admin') == 'Y' ? "SHRH02" : $this->session->userdata('cust');
		$list_customer = [];
		if ($this->session->userdata('admin') == 'Y') {
			$list_customer = $this->M_Code->data_customer()->result();
		}
		$data['list_customer'] = $list_customer;
		$filter_data = [
			"customer"  => ""
		];
	    $filter_customer       = !empty($this->input->post('customer')) ? $this->input->post('customer') : $customer;
	    $filter_data["customer"] = $filter_customer;
		$remainder_history 		= $this->M_User->m_remainder_history($filter_customer)->result();
	    $data['filter_data'] 		= $filter_data;
		$data['remainder_history'] = $remainder_history;
		$this->load->view('afterLogin/user/remainder_list',$data);

	}

	public function list_transfer() {
		if (empty($this->session->userdata('empno')) || $this->session->userdata('confirm') == 'N') {
			redirect('login');
		}
		$customer   = $this->session->userdata('admin') == 'Y' ? "SHRH02" : $this->session->userdata('cust');
		$sdate      = date("Ym01");
		$edate      = date("Ymt");
		$list_customer = [];
		if ($this->session->userdata('admin') == 'Y') {
			$list_customer = $this->M_Code->data_customer()->result();
		}
		$data['list_customer'] = $list_customer;
		$filter_data = [
			"customer"  => "",
		    "sdate"     => $sdate,
		    "edate"     => $edate,
		];
		$filter_sdate       = !empty($this->input->post('sdate')) ? date("Ymd", strtotime($this->input->post('sdate'))) : $sdate;
	    $filter_edate       = !empty($this->input->post('edate')) ? date("Ymd", strtotime($this->input->post('edate'))) : $edate;
	    $filter_customer       = !empty($this->input->post('customer')) ? $this->input->post('customer') : $customer;
	    $filter_data["sdate"] = $filter_sdate;
	    $filter_data["edate"] = $filter_edate;
	    $filter_data["customer"] = $filter_customer;
		$transfer_history 		= $this->M_User->m_transfer_history($filter_customer, $filter_sdate, $filter_edate)->result();
		$data['transfer_history'] = $transfer_history;
		$data['filter_data'] 		= $filter_data;
		$this->load->view('afterLogin/user/transfer_list',$data);

	}

	public function changePassword()
    {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('oldpass', 'old password', 'callback_password_check');
        $this->form_validation->set_rules('password', 'new password', 'required');
        $this->form_validation->set_rules('passconf', 'confirm password', 'required|matches[password]');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		$user = $this->session->userdata('id_user');
        if($this->form_validation->run() == false) {
			
            $data = ["page" => "admin/change-password", 'session' => $user];
			// dd($data);
			$this->load->view('afterLogin/user/change_password',$data);
        }
        else {

            $id = $this->session->userdata('id_user');

            $passwordRaw = $this->input->post('password');
			$password = password_hash($passwordRaw, PASSWORD_DEFAULT);

            $this->M_User->update_user($id, $password, $passwordRaw);

            redirect('logout');
        }
    }

	public function password_check($oldpass)
    {
        $userid = $this->session->userdata('id_user');
        $user = $this->M_User->get_user($userid);

		// dd($user);
        if(password_verify($oldpass, $user['PASS_RAW'])) {
            $this->form_validation->set_message('password_check', 'The {field} does not match');
            return false;
        }

        return true;
    }
}