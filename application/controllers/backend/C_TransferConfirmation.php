<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_TransferConfirmation extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_User');
		$this->load->model('M_TransferConfirmation');
		$this->load->model('M_Code');
		if (!empty($this->session->userdata('empno')) && $this->session->userdata('confirm') == 'N') {
			redirect('login');
		}
	}


	public function index() {
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
	    $data['filter_data'] 		= $filter_data;
		$transfer_history 		= $this->M_TransferConfirmation->m_transfer_confirmation($filter_customer, $filter_sdate, $filter_edate)->result();
		$data['transfer_history'] = $transfer_history;
		$this->load->view('afterLogin/transfer_confirmation/index',$data);
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
	    
	    
	    $data['user'] = $user;
	    $data['list_customer'] = $list_customer;
		$this->load->view('afterLogin/transfer_confirmation/add',$data);
	}

	public function add() {
	    if (empty($this->session->userdata('empno')) || $this->session->userdata('confirm') == 'N') {
			redirect('login');
		}

	    $ID_USER = $this->session->userdata('id_user');
		$CUST = $this->session->userdata('cust');
		$YMD 		= date("Ymd");
		if ($this->input->post('TRANSFER_NO')) {
			// dd($_POST);
			$STATUS = 0;
			$CREATED_AT = date("Y-m-d H:i:s");

			$BANK_CHARGE_AMT 	= $this->input->post('BANK_CHARGE');
			$CASH_IN_AMT 		= $this->input->post('AMOUNT');
			$TOTAL_AMT			= $BANK_CHARGE_AMT + $CASH_IN_AMT;

			$BANK_ACCOUNT 		= $this->input->post('BANK_ACCOUNT');
			$expBA 	= explode("|", $BANK_ACCOUNT);
			$BANK 	= $expBA[0];
			$BANK_ACCOUNT_NO 	= $expBA[1];

			$TRANSFER_NO	= $this->input->post('TRANSFER_NO');
			$TRANSFER_DATE	= date("Ymd", strtotime($this->input->post('TRANSFER_DATE')));
			$DESCRIPTION 	= $this->input->post('DESCRIPTION');
			$IMAGE = '';

			$this->load->library('upload');
            $configimg['upload_path']    = "./upload/transfer_confirmation";  //PROBLEM PATH
            $configimg['allowed_types']  = 'png|jpg|jpeg|gif';
            $configimg['max_size']       = 5000;
            $configimg['file_name']      = date('YmdHis').'_'.$CUST.'.jpg';
            //$configimg['file_name']      = 'SJ-'.trim(str_replace(" ","",date('d-M-Y--h-i-s')));

            $this->upload->initialize($configimg);

            if($_FILES['IMAGE']['name']){
	            if ($this->upload->do_upload('IMAGE')){

	                $img = $this->upload->data();

	                $w = $img['image_width']; // original image's width
	                $h = $img['image_height'];

	                $max_w = 1000; // destination image's width
	                //$max_h = 1000; // destination image's height

	                $config['image_library'] = 'gd2';
	                $config['source_image']='./upload/transfer_confirmation/'.$configimg['file_name'];
	                $config['maintain_ratio'] = true;
	                $config['source_image']='./upload/transfer_confirmation/'.$configimg['file_name'];
	                $config['create_thumb']= FALSE;
	                $config['quality']= '75%';
	                $config['width']= $max_w;
	                //$config['height']= $max_h;
	                $config['new_image']= './upload/transfer_confirmation/'.$configimg['file_name'];
	                $this->load->library('image_lib', $config);
	                $this->image_lib->resize();
	                $image_file = $img['file_name'];
	                $IMAGE = $image_file;
	            } else {
	               // $this->session->set_flashdata('GAGAL', '
	               //  <script type="text/javascript">
	               //      sweetAlert("", "Error Insert Data", "error");
	               //  </script>
	               //  ');
	                    // redirect('receive');
	            }
	        }

			$insert = $this->M_TransferConfirmation->insert_transfer_confirmation($CUST, $BANK_CHARGE_AMT, $CASH_IN_AMT, $TOTAL_AMT, $BANK_ACCOUNT_NO, $TRANSFER_NO, $IMAGE, $DESCRIPTION, $BANK, $TRANSFER_DATE);
			if ($insert) {
				$this->session->set_flashdata('GAGAL', '
	                <script type="text/javascript">
	                    sweetAlert("", "Success Insert Data", "success");
	                </script>
	                ');

				redirect('transfer_confirmation');
			} else {
				$this->session->set_flashdata('GAGAL', '
	                <script type="text/javascript">
	                    sweetAlert("", "Error Insert Data", "error");
	                </script>
	                ');	
			}
		}

	    $user 		= $this->M_User->m_user($ID_USER);
	    $data['user'] = $user;
	    $data['bank_account'] = $this->M_TransferConfirmation->m_bank_account()->result();
	    // echo "<pre/>";print_r(json_encode($data['bank_account']));exit;
		$this->load->view('afterLogin/transfer_confirmation/add',$data);
	}
}