<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Code extends CI_Model {

	public function __construct()
	{
		parent::__construct();

		$this->load->database('oracledb');
	}

	public function dashboard_order($periode = ''){
		$CUST = $this->session->userdata('cust');
		$THIS_MONTH = date("Ym")."%";
        if (!empty($periode)) {
            $THIS_MONTH = date("Ym", strtotime($periode))."%";
        }

        $is_admin = $this->session->userdata('admin');
        $where = "ORDER_DATE LIKE '$THIS_MONTH'";
        if ($is_admin != 'Y') {
            $where .= " AND CUSTOMER =  '$CUST'";
        }
		$hasil = "
            SELECT SUM(A.QTY) as QTY, SUM(A.AMOUNT) as AMOUNT FROM (
                SELECT ORDER_NO, ORDER_DATE, CUSTOMER, QTY, AMOUNT FROM UV_SH_SS_ORDER WHERE $where
                UNION ALL
                SELECT ORDER_NO, ORDER_DATE, CUSTOMER, QTY, AMOUNT  FROM UV_SS_ORDER WHERE $where
                UNION ALL
                SELECT ORDER_NO, ORDER_DATE, CUSTOMER, QTY, (QTY * UP) as AMOUNT FROM TR_SS_ORDER WHERE $where
            ) A
		";
		$data = $this->db->query($hasil);
		return $data;
	}

	public function dashboard_delivery($periode = ''){
		$CUST = $this->session->userdata('cust');
		$THIS_MONTH = date("Ym")."%";
        if (!empty($periode)) {
            $THIS_MONTH = date("Ym", strtotime($periode))."%";
        }

        $is_admin = $this->session->userdata('admin');
        $where = "DELIVERY_DATE LIKE '$THIS_MONTH'";
        if ($is_admin != 'Y') {
            $where .= " AND CUSTOMER =  '$CUST'";
        }
		$hasil = "
		    SELECT SUM(A.QTY) as QTY, SUM(A.AMOUNT) as AMOUNT 
            FROM (
                SELECT DELIVERY_NO, DELIVERY_DATE, CUSTOMER, QTY, AMOUNT 
                    FROM UV_SS_DELIVERY 
                WHERE $where
                UNION ALL
                SELECT DELIVERY_NO, DELIVERY_DATE, CUSTOMER, QTY, AMOUNT 
                    FROM SH_SS_DELIVERY 
                WHERE $where
                UNION ALL
                SELECT DELIVERY_NO, DELIVERY_DATE, CUSTOMER, QTY, AMOUNT 
                    FROM TR_SS_DELIVERY 
                WHERE $where
            ) A
  		";
		$data = $this->db->query($hasil);
		return $data;
	}

	public function dashboard_invoice($periode = ''){
		$CUST = $this->session->userdata('cust');
		$THIS_MONTH = date("Ym")."%";
        if (!empty($periode)) {
            $THIS_MONTH = date("Ym", strtotime($periode))."%";
        }

        $is_admin = $this->session->userdata('admin');
        $where = "INVOICE_DATE LIKE '$THIS_MONTH'";
        if ($is_admin != 'Y') {
            $where .= " AND CUSTOMER =  '$CUST'";
        }
		$hasil = "
		    SELECT SUM(A.QTY) as QTY, SUM(A.AMOUNT) as AMOUNT
            FROM (
                SELECT INVOICE_NO, INVOICE_DATE, CUSTOMER, QTY, AMOUNT 
                    FROM UV_SS_INVOICE 
                WHERE $where
                UNION ALL
                SELECT INVOICE_NO, INVOICE_DATE, CUSTOMER, QTY, AMOUNT 
                    FROM SH_SS_INVOICE 
                WHERE $where
                UNION ALL
                SELECT INVOICE_NO, INVOICE_DATE, CUSTOMER, QTY, AMOUNT FROM TR_SS_INVOICE 
                WHERE $where
            ) A
  		";
		$data = $this->db->query($hasil);
		return $data;
	}
	
	public function dashboard_remainder($periode = ''){
		$CUST = $this->session->userdata('cust');
		$TODAY = date("Ymd");

        $currentMonth = date("Y-m");
        if (!empty($periode) && $periode != $currentMonth) {
            $TODAY = date("Ymt", strtotime($periode));
        }

        $is_admin = $this->session->userdata('admin');
        $where = "YMD = '".$TODAY."'";
        if ($is_admin != 'Y') {
            $where .= " AND CUST =  '$CUST'";
        }
		$hasil = "
            SELECT BEGIN_REMAIN     AS BEGIN_REMAIN,
                   SALES            AS TOTAL_SALES,
                   AMOUNT_IN        AS CASH_IN,
                   ACTUAL_REMAIN    AS ENDING,
                   BEGIN_ADR AS ADR
            FROM SS_CUSTOMER_REMAINDER
            WHERE $where
		";
		$data = $this->db->query($hasil);
		return $data;
	}

    public function dashboard_last_update(){
        $hasil = "
            SELECT DESC1 as LastUpdate FROM CD_CODE WHERE CODE = 'CL'
        ";
        $data = $this->db->query($hasil);
        return $data;
    }

    public function dashboard_transfer_list($periode) {
        $CUST = $this->session->userdata('cust');
        $THIS_MONTH = date("Ym")."%";
        if (!empty($periode)) {
            $THIS_MONTH = date("Ym", strtotime($periode))."%";
        }

        $is_admin = $this->session->userdata('admin');
        $where = "CASH_IN_DATE LIKE '$THIS_MONTH'";
        if ($is_admin != 'Y') {
            $where .= " AND CUSTOMER =  '$CUST'";
        }
        $hasil = "
            SELECT 
                SUM(A.CASH_IN_AMOUNT) as CASH_IN,
                SUM(A.CASH_AMOUNT) as CASH_AMOUNT
            FROM 
                SS_COLLECTION_MASTER A
            WHERE
                $where
            ORDER BY CASH_NO DESC
        ";
        $data = $this->db->query($hasil);
        return $data;
    }
	
	public function dashboard_grafik_sales(){
		$CUST = $this->session->userdata('cust');
		$THIS_MONTH = date("Ym")."%";

        $is_admin = $this->session->userdata('admin');
        $where = "INVOICE_DATE LIKE TO_CHAR(SYSDATE,'YYYY')||'%' ";
        $where1 = "";
        if ($is_admin != 'Y') {
            $where .= " AND CUSTOMER = '$CUST'";
            $where1 = " AND CUSTOMER = '$CUST'";
        }
		$hasil = "
            SELECT ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '01' THEN AMOUNT ELSE 0 END)/100000,0) JAN,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '02' THEN AMOUNT ELSE 0 END)/100000,0) FEB,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '03' THEN AMOUNT ELSE 0 END)/100000,0) MAR,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '04' THEN AMOUNT ELSE 0 END)/100000,0) APR,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '05' THEN AMOUNT ELSE 0 END)/100000,0) MAY,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '06' THEN AMOUNT ELSE 0 END)/100000,0) JUN,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '07' THEN AMOUNT ELSE 0 END)/100000,0) JUL, 
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '08' THEN AMOUNT ELSE 0 END)/100000,0) AUG,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '09' THEN AMOUNT ELSE 0 END)/100000,0) SEP,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '10' THEN AMOUNT ELSE 0 END)/100000,0) OCT,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '11' THEN AMOUNT ELSE 0 END)/100000,0) NOV,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '12' THEN AMOUNT ELSE 0 END)/100000,0) DEC
            FROM (
                 SELECT SUBSTR(INVOICE_DATE,1,6) YYMM,
                       AMOUNT
                 FROM UV_SS_INVOICE
                 WHERE $where
                 UNION ALL 
                 SELECT SUBSTR(INVOICE_DATE,1,6) YYMM,
                       AMOUNT
                 FROM TR_SS_INVOICE
                 WHERE $where
                 UNION ALL  
                 SELECT SUBSTR(INVOICE_DATE,1,6) YYMM,
                       AMOUNT
                 FROM SH_SS_INVOICE
                 WHERE $where
                 UNION ALL  
                 SELECT SUBSTR(SALES_DATE,1,6) YYMM,
                       AMT
                 FROM GP_SS_SALES
                 WHERE SALES_DATE LIKE TO_CHAR(SYSDATE,'YYYY')||'%' $where1
            )


		";
		$data = $this->db->query($hasil);
		return $data;
	}

    public function dashboard_grafik_order(){
        $CUST = $this->session->userdata('cust');
        $THIS_MONTH = date("Ym")."%";

        $is_admin = $this->session->userdata('admin');
        $where = "ORDER_DATE LIKE TO_CHAR(SYSDATE,'YYYY')||'%' ";
        if ($is_admin != 'Y') {
            $where .= " AND CUSTOMER = '$CUST'";
        }
        $hasil = "
            SELECT ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '01' THEN QTY ELSE 0 END)/1000,0) JAN,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '02' THEN QTY ELSE 0 END)/1000,0) FEB,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '03' THEN QTY ELSE 0 END)/1000,0) MAR,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '04' THEN QTY ELSE 0 END)/1000,0) APR,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '05' THEN QTY ELSE 0 END)/1000,0) MAY,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '06' THEN QTY ELSE 0 END)/1000,0) JUN,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '07' THEN QTY ELSE 0 END)/1000,0) JUL, 
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '08' THEN QTY ELSE 0 END)/1000,0) AUG,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '09' THEN QTY ELSE 0 END)/1000,0) SEP,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '10' THEN QTY ELSE 0 END)/1000,0) OCT,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '11' THEN QTY ELSE 0 END)/1000,0) NOV,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '12' THEN QTY ELSE 0 END)/1000,0) DEC
            FROM (
                 SELECT SUBSTR(ORDER_DATE,1,6) YYMM,
                       QTY
                 FROM UV_SH_SS_ORDER
                 WHERE $where
                 UNION ALL 
                 SELECT SUBSTR(ORDER_DATE,1,6) YYMM,
                       QTY
                 FROM UV_SS_ORDER
                 WHERE $where
                 UNION ALL  
                 SELECT SUBSTR(ORDER_DATE,1,6) YYMM,
                       QTY
                 FROM TR_SS_ORDER
                 WHERE $where
            )


        ";
        $data = $this->db->query($hasil);
        return $data;
    }

    public function dashboard_grafik_delivery(){
        $CUST = $this->session->userdata('cust');
        $THIS_MONTH = date("Ym")."%";

        $is_admin = $this->session->userdata('admin');
        $where = "DELIVERY_DATE LIKE TO_CHAR(SYSDATE,'YYYY')||'%' ";
        if ($is_admin != 'Y') {
            $where .= " AND CUSTOMER = '$CUST'";
        }
        $hasil = "
            SELECT ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '01' THEN QTY ELSE 0 END)/1000,0) JAN,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '02' THEN QTY ELSE 0 END)/1000,0) FEB,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '03' THEN QTY ELSE 0 END)/1000,0) MAR,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '04' THEN QTY ELSE 0 END)/1000,0) APR,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '05' THEN QTY ELSE 0 END)/1000,0) MAY,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '06' THEN QTY ELSE 0 END)/1000,0) JUN,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '07' THEN QTY ELSE 0 END)/1000,0) JUL, 
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '08' THEN QTY ELSE 0 END)/1000,0) AUG,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '09' THEN QTY ELSE 0 END)/1000,0) SEP,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '10' THEN QTY ELSE 0 END)/1000,0) OCT,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '11' THEN QTY ELSE 0 END)/1000,0) NOV,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '12' THEN QTY ELSE 0 END)/1000,0) DEC
            FROM (
                 SELECT SUBSTR(DELIVERY_DATE,1,6) YYMM,
                       QTY
                 FROM UV_SS_DELIVERY
                 WHERE $where
                 UNION ALL 
                 SELECT SUBSTR(DELIVERY_DATE,1,6) YYMM,
                       QTY
                 FROM SH_SS_DELIVERY
                 WHERE $where
                 UNION ALL  
                 SELECT SUBSTR(DELIVERY_DATE,1,6) YYMM,
                       QTY
                 FROM TR_SS_DELIVERY
                 WHERE $where
            )


        ";
        $data = $this->db->query($hasil);
        return $data;
    }

    public function dashboard_grafik_invoice(){
        $CUST = $this->session->userdata('cust');
        $THIS_MONTH = date("Ym")."%";

        $is_admin = $this->session->userdata('admin');
        $where = "INVOICE_DATE LIKE TO_CHAR(SYSDATE,'YYYY')||'%' ";
        if ($is_admin != 'Y') {
            $where .= " AND CUSTOMER = '$CUST'";
        }
        $hasil = "
            SELECT ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '01' THEN AMOUNT ELSE 0 END)/1000000,0) JAN,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '02' THEN AMOUNT ELSE 0 END)/1000000,0) FEB,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '03' THEN AMOUNT ELSE 0 END)/1000000,0) MAR,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '04' THEN AMOUNT ELSE 0 END)/1000000,0) APR,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '05' THEN AMOUNT ELSE 0 END)/1000000,0) MAY,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '06' THEN AMOUNT ELSE 0 END)/1000000,0) JUN,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '07' THEN AMOUNT ELSE 0 END)/1000000,0) JUL, 
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '08' THEN AMOUNT ELSE 0 END)/1000000,0) AUG,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '09' THEN AMOUNT ELSE 0 END)/1000000,0) SEP,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '10' THEN AMOUNT ELSE 0 END)/1000000,0) OCT,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '11' THEN AMOUNT ELSE 0 END)/1000000,0) NOV,
                   ROUND(SUM(CASE WHEN SUBSTR(YYMM,-2) = '12' THEN AMOUNT ELSE 0 END)/1000000,0) DEC
            FROM (
                 SELECT SUBSTR(INVOICE_DATE,1,6) YYMM,
                       AMOUNT
                 FROM UV_SS_INVOICE
                 WHERE $where
                 UNION ALL 
                 SELECT SUBSTR(INVOICE_DATE,1,6) YYMM,
                       AMOUNT
                 FROM TR_SS_INVOICE
                 WHERE $where
                 UNION ALL  
                 SELECT SUBSTR(INVOICE_DATE,1,6) YYMM,
                       AMOUNT
                 FROM SH_SS_INVOICE
                 WHERE $where
            )


        ";
        $data = $this->db->query($hasil);
        return $data;
    }

    public function data_customer() {
        $hasil = "
            SELECT A.CUST, A.SHORT_NAME 
                FROM CD_CUSTOMER A 
                INNER JOIN CD_USER B ON A.CUST = B.CUST 
            WHERE A.DELETED = 'N' AND 
                B.CONFIRM = 'Y' 
            ORDER BY SHORT_NAME ASC
        ";
        $data = $this->db->query($hasil);
        return $data;
    }

}