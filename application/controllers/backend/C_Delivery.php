<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Delivery extends CI_Controller {
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
		$edate      = date("Ymt");
		$list_customer = [];
		if ($this->session->userdata('admin') == 'Y') {
			$list_customer = $this->M_Code->data_customer()->result();
		}
		$filter_data = [
		    "customer"  => "",
		    "sdate"     => "",
		    "edate"     => "",
		    "item"      => "",
		    "no_delivery"  => ""
		];
		$where = "WHERE CUSTOMER = '$customer' AND (DELIVERY_DATE BETWEEN '$sdate' AND '$edate')";
		if ($this->input->post('submit')) {
		    $filter_customer    = !empty($this->input->post('customer')) ? $this->input->post('customer') : $customer;
		    $filter_data["customer"] = $filter_customer;
		    if (!empty($filter_customer)) $where = "WHERE CUSTOMER = '$filter_customer'";
		    $filter_sdate       = !empty($this->input->post('sdate')) ? date("Ymd", strtotime($this->input->post('sdate'))) : $sdate;
		    $filter_edate       = !empty($this->input->post('edate')) ? date("Ymd", strtotime($this->input->post('edate'))) : $edate;
		    $filter_data["sdate"] = $filter_sdate;
		    $filter_data["edate"] = $filter_edate;
		    $where .= " AND (DELIVERY_DATE BETWEEN '$filter_sdate' AND '$filter_edate')";
		    $filter_item        = !empty($this->input->post('item')) ? $this->input->post('item') : "";
		    $filter_data["item"] = $filter_item;
		    if (!empty($filter_item)) $where .= " AND ITEM = '$filter_item'";
		    $filter_no_delivery    = !empty($this->input->post('no_delivery')) ? $this->input->post('no_delivery') : "";
		    $filter_data["no_delivery"] = $filter_no_delivery;
		    if (!empty($filter_no_delivery)) $where .= " AND ORDER_NO = '$filter_no_delivery'";
		    
		}
		$delivery_data = $this->M_User->m_delivery_user($where)->result();
		// dd($delivery_data);
		$data['filter_data']    = $filter_data;
		$data['delivery_data'] = $delivery_data;
		$data['items']      = $this->M_Main->m_items()->result();
		$data['list_customer'] = $list_customer;
		$this->load->view('afterLogin/delivery/index',$data);

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