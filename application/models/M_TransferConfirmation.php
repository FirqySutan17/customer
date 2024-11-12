<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_TransferConfirmation extends CI_Model {

	public function __construct()
	{
		parent::__construct();

		$this->load->database('oracledb');
	}

	public function m_transfer_confirmation($CUST, $sdate, $edate){
		$hasil = "
			SELECT 
				A.*
			FROM 
				SS_CUSTOMER_PAYMENT A
			WHERE 
				A.CUST = '$CUST' AND
				(A.TRANSFER_DATE BETWEEN '$sdate' AND '$edate')
			ORDER BY A.TRANSFER_DATE DESC
		";
		$data = $this->db->query($hasil);
		return $data;
	}
	

	public function insert_transfer_confirmation($CUST, $BANK_CHARGE_AMT, $CASH_IN_AMT, $TOTAL_AMT, $BANK_ACCOUNT_NO, $TRANSFER_NO, $IMAGE, $DESCRIPTION, $BANK, $TRANSFER_DATE){
		$date = date('Y-m-d H:i:s');
		$hasil = "
			INSERT INTO SS_CUSTOMER_PAYMENT (CUST, BANK_CHARGE_AMT, CASH_IN_AMT, TOTAL_AMT, BANK_ACCOUNT_NO, TRANSFER_NO, IMAGE, DESKRIPSI, BANK, TRANSFER_DATE, STATUS, CREATED_AT) VALUES ('$CUST', '$BANK_CHARGE_AMT', '$CASH_IN_AMT', '$TOTAL_AMT', '$BANK_ACCOUNT_NO', '$TRANSFER_NO', '$IMAGE', '$DESCRIPTION', '$BANK', '$TRANSFER_DATE', 0, '$date')
		";
		$data = $this->db->query($hasil);
		return $data;
	}

	public function m_bank_account(){
		$hasil = "
			SELECT BANK, BANK_ACCOUNT_NO
				FROM CD_BANK_ACCOUNT A
			ORDER BY BANK, BANK_ACCOUNT_NO ASC
		";
		$data = $this->db->query($hasil);
		return $data;
	}
}