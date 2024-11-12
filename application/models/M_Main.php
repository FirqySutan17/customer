<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Main extends CI_Model {

	public function __construct()
	{
		parent::__construct();

		$this->load->database('oracledb');
	}

	public function m_login($empno, $password){
		$query_login = "
						SELECT A.*, B.FULL_NAME as CUSTOMER_NAME
						FROM CD_USER A
						LEFT JOIN CD_CUSTOMER B ON A.CUST = B.CUST
						WHERE A.EMPNO = '$empno' AND A.ISACTIVE = 'Y'
						";
		$login = $this->db->query($query_login);
        if ($login->num_rows() == 1) {
            $usersuja = $login->row();
            if (password_verify($password, $usersuja->PASS)) {
            	$datasuja = array(
	            	'empno' => $usersuja->EMPNO,
	            	'name' => $usersuja->FULL_NAME,
	            	'confirm' => $usersuja->CONFIRM,
	            	'cust' => $usersuja->CUST,
	            	'admin' => $usersuja->IS_ADMIN,
	            	'email' => $usersuja->EMAIL,
	            	'id_user'   => $usersuja->ID_USER,
	            	'cust_name'	=> $usersuja->CUSTOMER_NAME
	         	);
	            $this->session->set_userdata($datasuja);
	            return 1;
            }
        }
        return 0;

	}

	public function m_user_list(){
		$CUST = $this->session->userdata('cust');
		$hasil = "
		select A.*,B.FULL_NAME
		from CD_USER A,
    	CD_CUSTOMER B
		where A.CUST = B.CUST (+)
		";
		$data = $this->db->query($hasil);
		return $data;
	}

	public function m_tot_user(){
		$CUST = $this->session->userdata('cust');
		$hasil = "
		  select count(*) TOT
		  from CD_USER
		";
		$data = $this->db->query($hasil);
		return $data;
	}
	
	public function m_tot_userY(){
		$CUST = $this->session->userdata('cust');
		$hasil = "
		  select count(*) TOT
		  from CD_USER
		  where CONFIRM = 'Y'
		";
		$data = $this->db->query($hasil);
		return $data;
	}
	
	public function m_tot_userN(){
		$CUST = $this->session->userdata('cust');
		$hasil = "
		  select count(*) TOT
		  from CD_USER
		  where CONFIRM = 'N'
		";
		$data = $this->db->query($hasil);
		return $data;
	}
	
	public function m_items(){
		$CUST = $this->session->userdata('cust');
		$hasil = "
		  SELECT DISTINCT A.ITEM, B.SHORT_NAME 
		  	FROM UV_ORDER_ALL A, CD_ITEM B
		  WHERE CUSTOMER = '$CUST' AND
		  	A.ITEM = B.ITEM
		  ORDER BY A.ITEM, B.SHORT_NAME ASC
		";
		$data = $this->db->query($hasil);
		return $data;
	}

	public function m_items_all(){
		$hasil = "
		  select ITEM, SHORT_NAME
		  from CD_ITEM
		  where DELETED = 'N'
		  order by item, short_name asc
		";
		$data = $this->db->query($hasil);
		return $data;
	}
}