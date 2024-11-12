<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Invoice extends CI_Controller {
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
		    "no_invoice"  => ""
		];
		$where = "WHERE CUSTOMER = '$customer' AND (INVOICE_DATE BETWEEN '$sdate' AND '$edate')";
		if ($this->input->post('submit')) {
		    $filter_customer    = !empty($this->input->post('customer')) ? $this->input->post('customer') : $customer;
		    $filter_data["customer"] = $filter_customer;
		    if (!empty($filter_customer)) $where = "WHERE CUSTOMER = '$filter_customer'";
		    $filter_sdate       = !empty($this->input->post('sdate')) ? date("Ymd", strtotime($this->input->post('sdate'))) : $sdate;
		    $filter_edate       = !empty($this->input->post('edate')) ? date("Ymd", strtotime($this->input->post('edate'))) : $edate;
		    $filter_data["sdate"] = $filter_sdate;
		    $filter_data["edate"] = $filter_edate;
		    $where .= " AND (INVOICE_DATE BETWEEN '$filter_sdate' AND '$filter_edate')";
		    $filter_item        = !empty($this->input->post('item')) ? $this->input->post('item') : "";
		    $filter_data["item"] = $filter_item;
		    if (!empty($filter_item)) $where .= " AND ITEM = '$filter_item'";
		    $filter_no_invoice    = !empty($this->input->post('no_invoice')) ? $this->input->post('no_invoice') : "";
		    $filter_data["no_invoice"] = $filter_no_invoice;
		    if (!empty($filter_no_invoice)) $where .= " AND ORDER_NO = '$filter_no_invoice'";
		    
		}
		$invoice_data = $this->M_User->m_invoice_user($where)->result();
		// dd($invoice_data);
		$data['filter_data']    = $filter_data;
		$data['invoice_data'] = $invoice_data;
		$data['items']      = $this->M_Main->m_items()->result();
		$data['list_customer'] = $list_customer;
		$this->load->view('afterLogin/invoice/index',$data);

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

	public function pdf($invoice_no) {
    	$this->load->library('pdf');
        
        // title dari pdf
        $data['title_pdf'] = 'Invoice';
        
        // filename dari pdf ketika didownload
        $file_pdf = 'invoice_data';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        $where = "WHERE INVOICE_NO = '$invoice_no'";
        $invoice_data = $this->M_User->m_invoice_user($where)->result();
        $data['invoice_data'] = $invoice_data;
        // dd($data);
		$html = $this->load->view('afterLogin/invoice/invoice_pdf',$data, true);	    
        
        // return $this->load->view('afterLogin/invoice/invoice_pdf',$data);
        // run pdf
        $this->pdf->generate($html, $file_pdf,$paper,$orientation);
    }
	

	public function index_sales() {
		$customer   = $this->session->userdata('admin') == 'Y' ? "SHRH02" : $this->session->userdata('cust');
		if ($customer == 'SHND01') {
			redirect('logout');
		}
		$sdate      = date("Ym01");
		$edate      = date("Ymt");
		$list_customer = [];
		if ($this->session->userdata('admin') == 'Y') {
			$list_customer = $this->M_Code->data_customer()->result();
		}
		$filter_data = [
		    "customer"  => "",
		    "sdate"     => $sdate,
		    "edate"     => $edate,
		    "item"      => "",
		    "no_invoice"  => ""
		];
		$where = "WHERE CUSTOMER = '$customer' AND (INVOICE_DATE BETWEEN '$sdate' AND '$edate')";
		if ($this->input->post('submit')) {
		    $filter_customer    = !empty($this->input->post('customer')) ? $this->input->post('customer') : $customer;
		    $filter_data["customer"] = $filter_customer;
		    if (!empty($filter_customer)) $where = "WHERE CUSTOMER = '$filter_customer'";
		    $filter_sdate       = !empty($this->input->post('sdate')) ? date("Ymd", strtotime($this->input->post('sdate'))) : $sdate;
		    $filter_edate       = !empty($this->input->post('edate')) ? date("Ymd", strtotime($this->input->post('edate'))) : $edate;
		    $filter_data["sdate"] = $filter_sdate;
		    $filter_data["edate"] = $filter_edate;
		    $where .= " AND (INVOICE_DATE BETWEEN '$filter_sdate' AND '$filter_edate')";
		    $filter_item        = !empty($this->input->post('item')) ? $this->input->post('item') : "";
		    $filter_data["item"] = $filter_item;
		    if (!empty($filter_item)) $where .= " AND ITEM = '$filter_item'";
		    $filter_no_invoice    = !empty($this->input->post('no_invoice')) ? $this->input->post('no_invoice') : "";
		    $filter_data["no_invoice"] = $filter_no_invoice;
		    // if (!empty($filter_no_invoice)) $where .= " AND ORDER_NO = '$filter_no_invoice'";
		    if (!empty($filter_no_invoice)) $where .= " AND INVOICE_NO = '$filter_no_invoice'";
		    
		}
		$invoice_data = $this->M_User->m_invoice_user($where)->result();
		if ($this->session->userdata('admin') == 'Y') {
			// dd($invoice_data);
		}
		if ($this->input->post('submit') && $this->input->post('submit') == 'Simpan Data') {
			$this->all_sales_pdf($invoice_data);
		}
		$data['filter_data']    = $filter_data;
		$data['invoice_data'] = $invoice_data;
		$data['items']      = $this->M_Main->m_items()->result();
		$data['list_customer'] = $list_customer;
		$this->load->view('afterLogin/sales/index',$data);

	}

	public function sales_pdf($customer, $invoice_no) {
    	$this->load->library('pdf');
      if (empty($customer) || empty($invoice_no)) {
      	redirect('sales_list');
      }
      // title dari pdf
      $data['title_pdf'] = 'Invoice';
      
      // filename dari pdf ketika didownload
      $file_pdf = 'invoice_data';
      // setting paper
      $paper = 'A4';
      //orientasi paper potrait / landscape
      $orientation = "portrait";
      $where = "WHERE CUSTOMER = '$customer' AND INVOICE_NO = '$invoice_no'";
      $invoice_data = $this->M_User->m_invoice_user($where)->result();
      $data['invoice_data'] = $invoice_data;
      // dd($data);
			$html = $this->load->view('afterLogin/sales/sales_pdf',$data, true);	    
        
      // return $this->load->view('afterLogin/invoice/invoice_pdf',$data);
      // run pdf
      $this->pdf->generate($html, $file_pdf,$paper,$orientation);
    }

    private function all_sales_pdf($data_sales) {
        $data['sales'] = $data_sales;
  //   	$this->load->library('pdf');
        
  //       // title dari pdf
  //       $data['title_pdf'] = 'Sales List';
        
  //       // filename dari pdf ketika didownload
  //       $file_pdf = 'sales_list_'.date('YmdHis');
  //       // setting paper
  //       $paper = 'A4';
  //       //orientasi paper potrait / landscape
  //       $orientation = "portrait";
  //       // dd($data);
		// $html = $this->load->view('afterLogin/sales/all_sales_pdf',$data, true);	    
        
  //       // run pdf
  //       $this->pdf->generate($html, $file_pdf,$paper,$orientation);
        return $this->load->view('afterLogin/sales/all_sales_pdf',$data);
    }
}