<?php
	function dd($data, $exit = TRUE) {
		echo "<pre/>";print_r($data);
		if ($exit) {
			exit;
		}
	}

	function send_email($to, $subject, $message){
        $CI =& get_instance();
        $CI->db->from("SETTING_EMAIL");
        $email = $CI->db->get()->row();

        $from_email = $email->MAIL_FROM_ADDRESS;
        // $to_email = "m.ichsan@cj.co.id";
        $to_email = $to;
        //Load email library
        // $config = [
        //     'mailtype'  => 'html',
        //     'protocol'  => $email->MAIL_DRIVER,
        //     'smtp_host' => $email->MAIL_HOST,
        //     'smtp_user' => $email->MAIL_USERNAME,  // Email gmail
        //     'smtp_pass'   => $email->MAIL_PASSWORD,  // Password gmail
        //     'smtp_crypto' => $email->MAIL_ENCRYPTION,
        //     'smtp_port'   => $email->MAIL_PORT,
        //     'smtp_timeout' => 30
        // ];
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => "smtp",
            'smtp_host' => "srv129.niagahoster.com",
            'smtp_user' => "admin@cjfnc.id",  // Email gmail
            'smtp_pass'   => "Init1234@!",  // Password gmail
            'smtp_crypto' => "tls",
            'smtp_port'   => 587,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];
        // dd($config, FALSE);
        $CI->load->library('email', $config);
        $CI->email->from("no-reply@cjfnc.id", $email->MAIL_FROM_NAME);
        $CI->email->to($to_email);
        $CI->email->subject($subject);
        $CI->email->message($message);
        //Send mail
        if($CI->email->send())
            return true;
        else
            return false;
    }
?>