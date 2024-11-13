<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_User extends CI_Model {

	public function __construct()
	{
		parent::__construct();

		$this->load->database('oracledb');
	}

	public function m_user_list($status = "", $role = ""){
		$userid = $this->session->userdata('empno');
		$where = "WHERE 
				A.CUST = B.CUST (+) AND
				A.ID_USER != 1";

		if ($status != "all" && !empty($status)) {
			if ($status == "pending") {
				$where .= " AND A.CONFIRM = 'N'";
			} elseif ($status == "non_aktif") {
				$where .= " AND A.ISACTIVE = 'N'";
			} elseif ($status == "aktif") {
				$where .= " AND A.ISACTIVE = 'Y'";
			}
		}

		if ($role != "all" && !empty($role)) {
			if ($role == "admin") {
				$where .= " AND A.IS_ADMIN = 'Y'";
			} elseif ($role == "cust") {
				$where .= " AND A.IS_ADMIN = 'N'";
			}
		}
		$hasil = "
			SELECT 
				A.*
			FROM 
				CD_USER A, CD_CUSTOMER B
		".$where."
			ORDER BY A.IS_ADMIN ASC, A.STATUS ASC, A.ISACTIVE ASC
		";
		// echo "<pre/>";print_r($hasil);exit;
		$data = $this->db->query($hasil)->result();
		return $data;
	}
	
	public function m_user($ID_USER){
		$hasil = "
			SELECT 
				A.*, B.CUST as CUST_CODE, B.FULL_NAME as CUST_FULL_NAME, B.BIZ_NO as CUST_NPWP, B.ADDRESS1 as CUST_ADDRESS, B.ADDRESS1 as CUST_ADDRESS2, B.CHIEF_NAME as CUST_PIC_NAME, B.CHIEF_ID as CUST_PIC_ID, B.TELEPHONE_NO as CUST_PHONE, B.MOBILE_PHONE as CUST_MOBILE, B.FAX_NO as CUST_FAX, NVL(B.STATUS, '03') as CUST_STATUS
			FROM 
				CD_USER A, CD_CUSTOMER B
			WHERE 
				A.CUST = B.CUST (+) AND
				A.ID_USER = $ID_USER
		";
		$data = $this->db->query($hasil)->row();
		return $data;
	}
	
	public function m_customer_notexist_search($keywords){
		$hasil = "
			SELECT 
				B.*, A.ID_USER
			FROM 
				CD_CUSTOMER B
			LEFT JOIN CD_USER A ON B.CUST = A.CUST
			WHERE A.ID_USER IS NULL AND (B.CUST LIKE '$keywords%' OR B.FULL_NAME LIKE '$keywords%')
			ORDER BY B.CUST ASC, B.FULL_NAME ASC
		";
		$data = $this->db->query($hasil)->result();
		return $data;
	}
	
	public function update_verify($userID, $confirm, $customerIntegration, $reason, $verEmp, $verDate){
		$isActive = "";
		$status = 0;
		if ($confirm == 'Y') {
			$isActive = "Y";
			$status = 1;
		}
		$hasil = "
			UPDATE CD_USER SET CUST = '$customerIntegration', CONFIRM = '$confirm', REASON = '$reason', VER_EMP = '$verEmp', VER_DATE = '$verDate', ISACTIVE = '$isActive', STATUS = '$status' WHERE ID_USER = '$userID'
		";
		$data = $this->db->query($hasil);
		return $data;
	}
	
	public function m_order_user($where) {
	    $hasil = "
	         SELECT A.*, B.SHORT_NAME FROM (
                SELECT DISTINCT ORDER_NO, ORDER_DATE, CUSTOMER, ITEM, QTY, UP, AMOUNT FROM UV_SH_SS_ORDER $where
                UNION ALL
                SELECT DISTINCT ORDER_NO, ORDER_DATE, CUSTOMER, ITEM, QTY, UP, AMOUNT  FROM UV_SS_ORDER $where
                UNION ALL
                SELECT DISTINCT ORDER_NO, ORDER_DATE, CUSTOMER, ITEM, QTY, UP, (QTY * UP) as AMOUNT FROM TR_SS_ORDER $where
            ) A JOIN CD_ITEM B ON A.ITEM = B.ITEM AND B.DELETED = 'N'
	    ";
	   // dd($hasil);
	    $data = $this->db->query($hasil);
		return $data;
	}

	public function m_delivery_user($where) {
	    $hasil = "
	        SELECT A.*, B.SHORT_NAME
            FROM (
                SELECT DELIVERY_NO, DELIVERY_DATE, CUSTOMER, QTY, UP, ITEM, ORDER_NO, AMOUNT, QTY_1 as BW
                    FROM UV_SS_DELIVERY 
                $where
                UNION ALL
                SELECT DELIVERY_NO, DELIVERY_DATE, CUSTOMER, QTY, UP, ITEM, ORDER_NO, AMOUNT, BW
                    FROM SH_SS_DELIVERY 
                $where
                UNION ALL
                SELECT DELIVERY_NO, DELIVERY_DATE, CUSTOMER, QTY, UP, ITEM, ORDER_NO, AMOUNT, BW
                    FROM TR_SS_DELIVERY 
                $where
            ) A JOIN CD_ITEM B ON A.ITEM = B.ITEM AND B.DELETED = 'N'
	    ";
	   	// dd($hasil);
	    $data = $this->db->query($hasil);
		return $data;
	}

	public function m_order_broiler($where) {
	    $hasil = "
	        SELECT 
				A.*, 
				B.PLAZMA_NAME, 
				C.FARM_NAME, 
				D.FULL_NAME, 
				CASE NVL(A.STATUS, 'N') 
					WHEN 'N' THEN 'REQUESTED'
					WHEN 'Y' THEN 'ORDERED'
					WHEN 'C' THEN 'CANCELED'
				END AS STATUS,
				CASE NVL(A.CONFIRM_STATUS, 'N')  
					WHEN 'N' THEN 'NOT CONFIRM'
					WHEN 'P' THEN 'PENDING'
					WHEN 'Y' THEN 'CONFIRM'
				END AS CONFIRM_STATUS
			FROM
				TR_SS_ORDER_REQUEST A,
				TR_CD_PLAZMA B, 
				TR_CD_FARM C,
				CD_CUSTOMER D
			WHERE 
				A.PLAZMA 	    = B.PLAZMA (+) AND
				A.FARM 		    = C.FARM (+) AND
				A.CUSTOMER 		= TRIM(D.CUST)
				$where
			ORDER BY A.REQ_NO DESC
	    ";
	   // dd($hasil);
	    $data = $this->db->query($hasil);
		return $data;
	}


	public function m_invoice_user($where) {
	    // $hasil = "
	    //     SELECT A.*, B.SHORT_NAME
     //        FROM (
     //            SELECT INVOICE_NO, INVOICE_DATE, ORDER_NO, CUSTOMER, QTY, UP, ITEM, AMOUNT, QTY_1 AS BW, '' AS DELIVERY_NO
     //                FROM UV_SS_INVOICE 
     //            $where
     //            UNION ALL
     //            SELECT INVOICE_NO, INVOICE_DATE, ORDER_NO, CUSTOMER, QTY, UP, ITEM, AMOUNT, BW, DELIVERY_NO
     //                FROM SH_SS_INVOICE 
     //            $where
     //            UNION ALL
     //            SELECT INVOICE_NO, INVOICE_DATE, ORDER_NO, CUSTOMER, QTY, UP, ITEM, AMOUNT, BW, DELIVERY_NO FROM TR_SS_INVOICE 
     //            $where
     //        ) A JOIN CD_ITEM B ON A.ITEM = B.ITEM AND B.DELETED = 'N'
     //        ORDER BY A.INVOICE_DATE DESC
	    // ";
	    $hasil = "
	        SELECT A.*, B.SHORT_NAME, C.FULL_NAME, C.ADDRESS1, C.ADDRESS2
            FROM (
                SELECT INVOICE_NO, INVOICE_DATE, '' AS ORDER_NO, CUSTOMER, QTY, UP, ITEM, AMOUNT, BW, '' AS DELIVERY_NO
                    FROM UV_INVOICE_ALL 
                $where
            ) A JOIN CD_ITEM B ON A.ITEM = B.ITEM AND B.DELETED = 'N' JOIN CD_CUSTOMER C ON A.CUSTOMER = C.CUST
            ORDER BY A.INVOICE_DATE DESC
	    ";
	   	// dd($hasil);
	    $data = $this->db->query($hasil);
		return $data;
	}
	
	public function update_acc($userID, $name, $email, $phone, $address){
		$hasil = "
			UPDATE CD_USER SET FULL_NAME = '$name', EMAIL = '$email', PHONE = '$phone', ADDRESS = '$address' WHERE ID_USER = '$userID'
		";
		$data = $this->db->query($hasil);
		return $data;
	}

	public function user_nonactive($userID){
		$hasil = "
			UPDATE CD_USER SET ISACTIVE = 'N' WHERE ID_USER = '$userID'
		";
		$data = $this->db->query($hasil);
		return $data;
	}

	public function saldo() {
		$CUST = $this->session->userdata('cust');
		$THIS_MONTH = date("Ymd");
		$hasil = "
			SELECT 
                NVL(X.REMAIN_MONTH,0) AS REMAIN_MONTH,                                                                 
                REMAIN_NEXT_MONTH,
                X.FULL_NAME,
                x.CHIEF_NAME,
                X.ADDRESS1,
                '$THIS_MONTH' AS NEXT_MONTH,
                NVL(X.DOC_SALES,0) AS DOC_SALES,
                NVL(X.CASH_IN_AMT,0) AS CASH_IN_AMT,
                NVL(X.CASH_OTH,0) AS CASH_OTH,
                CUST                                    
            FROM (SELECT 
                B.FULL_NAME,                                                                                                     
                   B.ADDRESS1,                                                                                                      
                   B.REGION_CODE,                                                                                                   
                   CUST,                                                                                                            
                   CHIEF_NAME,                                                                                                        
                   (select sum(begin_remain)
                     from ss_customer_remainder
                     where company ='01'
                     and  ymd ='$THIS_MONTH' 
                     and cust = b.cust ) AS REMAIN_MONTH,                                                
                   (select sum(actual_remain)
                     from ss_customer_remainder
                     where company ='01'
                     and  ymd ='$THIS_MONTH' 
                     and cust = b.cust )               AS REMAIN_NEXT_MONTH,
                   (select sum(sales)
                     from ss_customer_remainder
                     where company ='01'
                     and  ymd ='$THIS_MONTH' 
                     and cust = b.cust )                       AS DOC_SALES,                                                                     
                  (select sum(amount_in)
                     from ss_customer_remainder
                     where company ='01'
                     and  ymd ='$THIS_MONTH' 
                     and cust = b.cust )  AS CASH_IN_AMT,
                  (select sum(dcash_in) + sum(dgiro_in) + sum(dcbd_in)+ sum(dtra_in)
                     from ss_customer_remainder
                     where company ='01'
                     and  ymd ='$THIS_MONTH' 
                     and cust = b.cust )  AS CASH_OTH
              FROM CD_CUSTOMER B                                                                                                    
             WHERE B.CUST = '$CUST'                                                                                                
           ) X 
		";
		$data = $this->db->query($hasil);
		return $data;
	}

	public function insert_confirmation_saldo($APPROVED_DATE, $APPROVED_USER, $APPROVED_YN, $BG_REMAIN, $CASH_IN, $CN_AMOUNT, $COMPANY, $CUST, $ED_REMAIN, $SALES_AMT, $YMD){
		$hasil = "
			INSERT INTO SS_CUSTOMER_CONFIRMATION (APPROVED_DATE, APPROVED_USER, APPROVED_YN, BG_REMAIN, CASH_IN, CN_AMOUNT, COMPANY, CUST, ED_REMAIN, SALES_AMT, YMD) VALUES ('$APPROVED_DATE', '$APPROVED_USER', '$APPROVED_YN', '$BG_REMAIN', '$CASH_IN', '$CN_AMOUNT', '$COMPANY', '$CUST', '$ED_REMAIN', '$SALES_AMT', '$YMD')
		";
		$data = $this->db->query($hasil);
		return $data;
	}

	public function m_check_saldo($ymd, $cust){
		$hasil = "
			SELECT 
				A.*
			FROM 
				SS_CUSTOMER_CONFIRMATION A
			WHERE 
				A.YMD = '$ymd' AND
				A.CUST = '$cust'
		";
		$data = $this->db->query($hasil);
		return $data;
	}

	public function m_saldo_history($cust){
		$hasil = "
			SELECT 
				A.*
			FROM 
				SS_CUSTOMER_CONFIRMATION A
			WHERE
				A.CUST = '$cust'
		";
		$data = $this->db->query($hasil);
		return $data;
	}

	public function m_remainder_history($cust){
		// $hasil = "
		// 	SELECT * FROM (
		// 		SELECT * FROM SS_CUSTOMER_REMAINDER
		// 		WHERE CUST ='$cust' 
		// 		  	AND YMD = TO_CHAR(SYSDATE ,'YYYYMMDD')
		// 		UNION ALL
		// 		SELECT * FROM SS_CUSTOMER_REMAINDER
		// 		WHERE CUST ='$cust' 
		// 		  	AND YMD = TO_CHAR(SYSDATE - 1,'YYYYMM')
		// 		UNION ALL
		// 		SELECT * FROM  SS_CUSTOMER_REMAINDER
		// 		WHERE CUST ='$cust' 
		// 			AND YMD NOT LIKE TO_CHAR(SYSDATE,'YYYYMM')||'%'
		// 			AND YMD IN ( 
		// 				SELECT DISTINCT TO_CHAR(LAST_DAY(TO_DATE(YMD,'YYYYMMDD')),'YYYYMMDD')
		// 				FROM SS_CUSTOMER_REMAINDER
		// 				WHERE CUST ='$cust'
		// 		    )
		// 	) ORDER BY YMD DESC
			
		// ";
		$hasil = "
			SELECT YMD,
	           CUST,
	           SUM(BEGIN_REMAIN) BEGIN_REMAIN,
	           SUM(SALES) SALES,
	           SUM(AMOUNT_IN) AMOUNT_IN,
	           SUM(BEGIN_REMAIN) + SUM(SALES) - SUM(AMOUNT_IN) ENDING
	        FROM 
	                (
	                SELECT * FROM SS_CUSTOMER_REMAINDER
	                WHERE CUST ='$cust' 
	                      AND YMD = TO_CHAR(SYSDATE ,'YYYYMMDD')
	                UNION ALL
	                SELECT * FROM SS_CUSTOMER_REMAINDER
	                WHERE CUST ='$cust' 
	                      AND YMD = TO_CHAR(SYSDATE - 1,'YYYYMM')
	                UNION ALL
	                SELECT * FROM  SS_CUSTOMER_REMAINDER
	                WHERE CUST ='$cust' 
	                    AND YMD NOT LIKE TO_CHAR(SYSDATE,'YYYYMM')||'%'
	                    AND YMD IN ( 
	                        SELECT DISTINCT TO_CHAR(LAST_DAY(TO_DATE(YMD,'YYYYMMDD')),'YYYYMMDD')
	                        FROM SS_CUSTOMER_REMAINDER
	                        WHERE CUST ='$cust'
	                    )
	            ) 
	            GROUP BY YMD,
	           CUST
	            ORDER BY YMD DESC

		";
		$data = $this->db->query($hasil);
		// dd($hasil);
		return $data;
	}

	public function m_transfer_history($cust, $sdate, $edate){
		$hasil = "
			SELECT 
				A.*
			FROM 
				SS_COLLECTION_MASTER A
			WHERE
				A.CUSTOMER = '$cust' AND
				(A.CASH_IN_DATE BETWEEN '$sdate' AND '$edate')
			ORDER BY CASH_NO DESC
		";
		$data = $this->db->query($hasil);
		return $data;
	}

	public function get_user($id)
		{
			$hasil = "
			SELECT 
				*
			FROM 
				CD_USER
			WHERE 
				ID_USER = '$id'
		";
		// dd($query);
			$query = $this->db->query($hasil);
			
			return $query->row_array();
		}

	public function update_user($id, $password, $passwordRaw)
		{
			// $this->db->where('id', $id);
			$data = array('PASS' => $password, 'PASS_RAW' => $passwordRaw);
			// dd($data);
			$hasil = "
			UPDATE CD_USER SET PASS = '$password', PASS_RAW = '$passwordRaw' WHERE ID_USER = '$id'
		";
			$update = $this->db->query($hasil);
			// dd($id);
			return $update;
		}

	function edit_data($where,$table){	
		$table = 'CD_USER';	
		return $this->db->get_where($table,$where);
	}

	function update_data($where,$data,$table){
		$table = 'CD_USER';	
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}