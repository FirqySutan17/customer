<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Main extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_User');
		$this->load->model('M_Code');

	}

	public function index()
	{

		if (($this->session->userdata('empno') == true) && ($this->session->userdata('confirm') == 'Y')) {
			$periode = date("Y-m");
			if ($this->input->post('periode')) {
				$periode = $this->input->post('periode');
			}
			// $data['order'] = $this->M_Code->dashboard_order($periode)->row();
			// $data['delivery'] = $this->M_Code->dashboard_delivery($periode)->row();
			$data['transfer_list'] = $this->M_Code->dashboard_transfer_list($periode)->row();
			$data['invoice'] = $this->M_Code->dashboard_invoice($periode)->row();
			$data['remainder'] = $this->M_Code->dashboard_remainder($periode)->row();
			$data['last_update'] = $this->M_Code->dashboard_last_update()->row();
			// dd($data);
			// $gs = $this->M_Code->dashboard_grafik_sales()->row();
			// $data['grafik_sales'] = json_encode([$gs->JAN, $gs->FEB, $gs->MAR, $gs->APR, $gs->MAY, $gs->JUN, $gs->JUL, $gs->AUG, $gs->SEP, $gs->OCT, $gs->NOV, $gs->DEC]);
			$ID_USER = $this->session->userdata('id_user');
    
			$user 		= $this->M_User->m_user($ID_USER);
			$data['user'] = $user;
			$data['periode'] = $periode;
			$this->load->view('afterLogin/V_dashboard',$data);
		} else {
			
			$this->load->view('beforeLogin/V_login');
		}	
	}

	public function login()
	{
		if (($this->session->userdata('empno') == true) AND ($this->session->userdata('confirm') == 'Y')) {
			redirect('index');
		} else {
			$this->load->view('beforeLogin/V_login');
		}	
	}


	public function login_data(){
		
		$user_suja = $this->input->post('user');
		$password = $this->input->post('password');
		$user_ok = str_replace("'","",$user_suja);
		$password_ok = str_replace("'","",$password);
		$login = $this->M_Main->m_login($user_ok, $password_ok);
		if ($login == 1) {
			if (($this->session->userdata('empno') == true) && ($this->session->userdata('confirm') == 'Y')) {
				// Sukses login
				if (!empty($this->session->userdata('parse_invoice'))) {
					$parse_invoice 	= $this->session->userdata('parse_invoice');
					$customer 		= $parse_invoice[0];
					$no_invoice 	= $parse_invoice[1];

					$this->session->unset_userdata('parse_invoice');
					redirect('sales_list/pdf/'.$customer.'/'.$no_invoice);
				}
				redirect('index');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger p-5" role="alert">
		                <strong>Gagal Login!</strong> Akun anda sedang divalidasi oleh Tim PT Super Unggas Jaya.
		            </div>');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger p-5" role="alert">
		                <strong>Gagal Login!</strong> UserID atau Password salah.
		            </div>');
		}
		redirect('login');

	}

	public function parse_invoice($raw_invoice) {
		$exp_raw = explode("_", $raw_invoice);
		$customer = $exp_raw[0];
		$no_invoice = $exp_raw[1];

		if (($this->session->userdata('empno') == true) && ($this->session->userdata('confirm') == 'Y')) {
			redirect('sales_list/pdf/'.$customer.'/'.$no_invoice);
		}
		$this->session->set_userdata('parse_invoice', $exp_raw);
		redirect('login');
	}

	public function register()
	{
		$this->load->view('beforeLogin/V_Register');
	}

	public function profile() {
		if (empty($this->session->userdata('empno')) || $this->session->userdata('confirm') == 'N') {
			redirect('login');
		}
		$ID_USER = $this->session->userdata('id_user');
		
		$user 		= $this->M_User->m_user($ID_USER);
		$data['user'] = $user;
		$this->load->view('afterLogin/user/profile',$data);
	}

	public function kritik_saran() {
		$ID_USER = $this->session->userdata('id_user');
		
		$user 		= $this->M_User->m_user($ID_USER);
		$data['user'] = $user;
		$this->load->view('afterLogin/user/kritik-saran',$data);
	}

	public function data()
	{
		if (empty($this->session->userdata('empno')) || $this->session->userdata('confirm') == 'N') {
			redirect('login');
		}
		$data['order'] = $this->M_Code->dashboard_order()->row();
		$data['delivery'] = $this->M_Code->dashboard_delivery()->row();
		$data['invoice'] = $this->M_Code->dashboard_invoice()->row();
		$data['remainder'] = $this->M_Code->dashboard_remainder()->row();
		// dd($data);

		$gs = $this->M_Code->dashboard_grafik_sales()->row();
		$go = $this->M_Code->dashboard_grafik_order()->row();
		$gd = $this->M_Code->dashboard_grafik_delivery()->row();
		$gi = $this->M_Code->dashboard_grafik_invoice()->row();
		// dd($gd);
		$data['grafik_sales'] = json_encode([$gs->JAN, $gs->FEB, $gs->MAR, $gs->APR, $gs->MAY, $gs->JUN, $gs->JUL, $gs->AUG, $gs->SEP, $gs->OCT, $gs->NOV, $gs->DEC]);
		$data['grafik_order'] = json_encode([$go->JAN, $go->FEB, $go->MAR, $go->APR, $go->MAY, $go->JUN, $go->JUL, $go->AUG, $go->SEP, $go->OCT, $go->NOV, $go->DEC]);
		$data['grafik_delivery'] = json_encode([$gd->JAN, $gd->FEB, $gd->MAR, $gd->APR, $gd->MAY, $gd->JUN, $gd->JUL, $gd->AUG, $gd->SEP, $gd->OCT, $gd->NOV, $gd->DEC]);
		$data['grafik_invoice'] = json_encode([$gi->JAN, $gi->FEB, $gi->MAR, $gi->APR, $gi->MAY, $gi->JUN, $gi->JUL, $gi->AUG, $gi->SEP, $gi->OCT, $gi->NOV, $gi->DEC]);
		$this->load->view('afterLogin/V_data', $data);
	}



	public function logout(){
		$this->session->unset_userdata('user_suja');
		$this->session->sess_destroy();
		redirect('login');
	}

	public function mrjempoot()
	{
		
		$this->load->view('V_Test');
	}

	public function faq()
	{
		
		$this->load->view('afterLogin/V_Faq');
	}

	public function generate_admin(){
		$pass = password_hash("1100", PASSWORD_DEFAULT);
		$date = date('Ymd');
		$sql = "
			INSERT INTO CD_USER(ID_USER, CUST, EMPNO, PASS, FULL_NAME, PHONE, EMAIL, ÇOMP_NAME, WEBSITE, CONFIRM, IS_ADMIN, REG_EMP, REG_DATE) 
			VALUES(1, 0, 999999, '$pass', 'Administrator', '', '', 'SUJA', '', 'Y', 'Y', '-', $date)
		";
		echo "<pre/>";print_r($sql);exit;
	}

	public function insert_register(){
		// echo "<pre/>";print_r($_POST);exit;
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$company_website = $this->input->post('company_website');
		$full_name = $this->input->post('full_name');
		$mobile_number = $this->input->post('mobile_number');
		$company_name = $this->input->post('company_name');
		$address = $this->input->post('address');
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
					(0, '$username','$password_encrypt', '$password', '$full_name', '$mobile_number', '$email', '$company_name', '$company_website', '$address', 'N','N', 'SYSTEM', '$date')
		";
		$INSERTDATA = $this->db->query($sql);
		if ($INSERTDATA) {
			$body = "<h3>Dear $full_name</h3> <p>Terima kasih sudah mendaftarkan akun Anda ke SUJA Customer. Silahkan menunggu konfirmasi dari Admin kami untuk diberikan akses login nya</p>";
			send_email($email, "Register SUJA Customer", $body);
			$this->session->set_flashdata('message', '
				<div class="alert alert-success p-5" role="alert">
							<strong>Terima kasih sudah mendaftarkan akun Anda ke SUJA Customer.</strong> Request User akan divalidasi oleh Team PT. Super Unggas Jaya. <br/> Team validasi akan menghubungi anda untuk melakukan konfirmasi terhadap pendaftaran akun ini. Aktivasi akun akan dikirimkan ke nomor WhatsApp dan Email yang didaftarkan.
						</div>
				');
		}else{
			$this->session->set_flashdata('message', '
				<div class="alert alert-danger p-5" role="alert">
							<strong>Daftar Akun Gagal!</strong> Silahkan hubungi admin PT Super Unggas Jaya mengenai hal ini.
						</div>
				');
		}
		}
		
	
	redirect('login');
	}
	public function manual_book() {
		$this->load->helper('download');
		force_download('assets/ManualBook.pptx', NULL);
	}

    public function select2_ajax_customer_notexist() {
        $search = strtoupper($this->input->post('search'));
        $list_customer = $this->M_User->m_customer_notexist_search($search);
        
        $data = array();
        foreach($list_customer as $customer){
            $text = $customer->CUST.' - '.$customer->FULL_NAME;
            $data[] = array("id"=>$customer->CUST, "text"=>$text);
        }
        echo json_encode($data);
    }

    public function testpdf() {
    	$this->load->library('pdf');
        
        // title dari pdf
        $data['title_pdf'] = 'Invoice';
        
        // filename dari pdf ketika didownload
        $file_pdf = 'invoice_data';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        
		$html = $this->load->view('afterLogin/invoice/invoice_pdf',$data, true);	    
        
        // return $this->load->view('afterLogin/invoice/invoice_pdf',$data);
        // run pdf
        $this->pdf->generate($html, $file_pdf,$paper,$orientation);
    }

}
