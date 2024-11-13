<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Broiler extends CI_Controller {
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
		$customer   = $this->session->userdata('admin') == 'Y' ? "SHRH02" : $this->session->userdata('cust');
		$sdate      = date("Ym01");
		$edate      = date("Ymd");
		$list_customer = [];
		if ($this->session->userdata('admin') == 'Y') {
			$list_customer = $this->M_Code->data_customer()->result();
		}
		$filter_data = [
		    "customer"  => "",
		    "sdate"     => "",
		    "edate"     => "",
		];
		$where = " AND A.CUSTOMER = '$customer' AND (A.REQ_DATE BETWEEN '$sdate' AND '$edate')";
		if ($this->input->post('submit')) {
		    $filter_customer    = !empty($this->input->post('customer')) ? $this->input->post('customer') : $customer;
		    $filter_data["customer"] = $filter_customer;
		    if (!empty($filter_customer)) $where = " AND A.CUSTOMER = '$filter_customer'";
		    $filter_sdate       = !empty($this->input->post('sdate')) ? date("Ymd", strtotime($this->input->post('sdate'))) : $sdate;
		    $filter_edate       = !empty($this->input->post('edate')) ? date("Ymd", strtotime($this->input->post('edate'))) : $edate;
		    $filter_data["sdate"] = $filter_sdate;
		    $filter_data["edate"] = $filter_edate;
		    $where .= " AND (A.REQ_DATE BETWEEN '$filter_sdate' AND '$filter_edate')";	    
		}
		$order_data = $this->M_User->m_order_broiler($where)->result_array();
		// dd($order_data);
		$data['filter_data']    = $filter_data;
		$data['order_data'] 	= $order_data;
		$data['list_customer'] 	= $list_customer;
		$this->load->view('afterLogin/broiler/list',$data);
	}

	public function entry() {
		$customer   				= $this->session->userdata('admin') == 'Y' ? "SHRH02" : $this->session->userdata('name');
		$data['customer'] 			= $customer;
		// dd($data['customer'] );
		$this->load->view('afterLogin/broiler/index',$data);
	}

	public function do_create() {
	    if (empty($this->session->userdata('empno')) || $this->session->userdata('confirm') == 'N') {
			redirect('login');
		}

		$order_request = [
			"COMPANY"				=> "01",
			"REQ_NO"				=> $this->generateOrderNo(),
			"REQ_DATE"				=> date('Ymd'),
			"ORDER_CLASS"			=> '11',
			"CUSTOMER"				=> $this->session->userdata('cust'),
			"REMARKS"				=> $this->input->post('remark'),
			"STATUS"				=> "N",
			"SEQ"					=> 1,
			"ITEM"					=> '10001001',
			"REQ_QTY"				=> $this->input->post('qty'),
			"REQ_BW"				=> $this->input->post('bw'),
			"CUST_PHONE_NO" 		=> $this->session->userdata('phone'),
			"REG_DATE"				=> date('Ymd')
		];
		// echo "<pre/>";print_r($order_request);exit;

		$hasil = $this->db->insert("TR_SS_ORDER_REQUEST", $order_request);
		// echo "<pre/>";print_r($hasil);exit;
		if ($hasil) {
			$this->session->set_flashdata('message', '
				<div class="alert alert-success p-2" role="alert">
					<strong>Sukses!</strong> Data berhasil DISIMPAN
				</div>
			');
		} else {
			$this->session->set_flashdata('message', '
			<div class="alert alert-danger p-2" role="alert">
						<strong>Gagal!</strong> Data gagal DISIMPAN 
					</div>
			');
		}
		redirect('broiler/report');
	}

	public function do_cancel() {
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$post = $this->input->post();
			$request_no = $post['req_no'];
			try {
				$order_request = [
					"STATUS"	=> "C",
					"MOD_DATE"	=> date('Ymd')
				];

				$save = $this->db->update('TR_SS_ORDER_REQUEST', $order_request, array('REQ_NO' => $request_no));
				if ($save) {
					$this->session->set_flashdata('message', '
						<div class="alert alert-success p-2" role="alert">
									<strong>Gagal!</strong> Data berhasil dicancel 
								</div>
						');
					return redirect('broiler/report');
				}
			} catch (Exception $e) {
				dd($e->getMessage());
			}
			$this->session->set_flashdata('message', '
				<div class="alert alert-danger p-2" role="alert">
							<strong>Gagal!</strong> Data gagal dicancel 
						</div>
				');
			return redirect('broiler/report');
		}
		$this->session->set_flashdata('message', '
			<div class="alert alert-danger p-2" role="alert">
						<strong>Gagal!</strong> Data gagal dicancel 
					</div>
			');
    	return redirect('broiler/report');
	}
	
	private function generateOrderNo() {
		$generated_no = date('Ymd')."RQ";
		$no = 1;
		$today = date('Ymd');
		$this->db->select('REQ_NO, REG_DATE');
		$this->db->from('TR_SS_ORDER_REQUEST');
		$this->db->like('REG_DATE', $today, 'after');
		$this->db->order_by('REG_DATE', 'DESC');
		$this->db->order_by('REQ_NO', 'DESC');
		$latest_data = $this->db->get()->row();
		if (!empty($latest_data)) {
				$no = substr($latest_data->REQ_NO, -4);
				$no += 1;
		}
		if ($no < 10) {
				$no = "000".$no;
		} elseif ($no >= 10 && $no < 100) {
				$no = "00".$no;
		} elseif ($no >= 100 && $no < 1000) {
				$no = "0".$no;
		}

		$generated_no = $generated_no.$no;
		return $generated_no;
	}
	
	public function detail($ID_USER) {
	    $list_customer = [];
	    
	    if ($this->input->post()) {
	        $userID     = $this->input->post('ID_USER');
	        $confirm    = $this->input->post('STATUS');
	        $customerIntegration = !empty($this->input->post('customerIntegration')) ? $this->input->post('customerIntegration') : 0;
	        $reason     = $this->input->post('REASON');
	        $date       = date("Ymd");
	        $emp        = $this->session->userdata('empno');
	        
	        $update_verify = $this->M_User->update_verify($userID, $confirm, $customerIntegration, $reason, $emp, $date);
	        if ($update_verify) {
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
	
}