<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Email_lib
{

	public function send_mail($email_to, $subject, $body)
	{
		$CI = &get_instance();
		$from_email = "gic@insurancesathi.in";
		//Load email library
		$CI->load->library('email');
		$CI->email->from($from_email, 'Identification');
		$CI->email->to($email_to);
		$CI->email->subject('Send Email Codeigniter');
		$CI->email->message('The email send using codeigniter library');
		//Send mail
		if ($CI->email->send())
			$message = "Congragulation Email Send Successfully.";
		else
			$message = $CI->email->print_debugger();

		print_r($message);die();
	}

	public function send_oe_email($email, $subject, $body)
	{
		$CI = &get_instance();

		$CI->email->from("gic@insurancesathi.in", "GIC ( Insurance Sathi )");
		$CI->email->to($email);
		$CI->email->subject($subject);
		$CI->email->message($body);
		if (!$CI->email->send()) {
			$mail_arr["error"] = 1;
			$mail_arr["mail_error"] = "";
			$error = $CI->email->print_debugger();
			$CI->session->set_flashdata('err_msg', $error);
		} else {
			$mail_arr["error"] = 0;
			$mail_arr["mail_error"] = "success";
			$CI->email->clear(TRUE);
			$CI->session->set_flashdata('msg', 'Email has been Send Successfully.');
		}
		print_r($mail_arr);
		die();
		return $mail_arr;
	}

	public function send_multi_user_email($staff_result)
	{
		$CI = &get_instance();
		$message_body = "";
		foreach ($staff_result as $row) {
			// $name[] = $row["staff_name"];

			$message_body .= "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
			<html>
				<body style='margin: 0; padding: 0;'>
					<br /><table align='center' cellpadding='0' cellspacing='0' width='600' style='border-top: 3px solid #ccff55; border-right: 3px solid #c0c0c0; border-bottom: 3px solid #c0c0c0; border-left: 3px solid #c0c0c0;'>
						<tr>
							<td style='padding-top: 5px;'>
								<div style='margin: 5px 5px 5px 5px; font-weight: bold; font-size: 22px; background-color:#6f42c1;color:#fff;'><center>*GIC ( Insurance Sathi )*</center>
								</div>
							</td>
						</tr>
						<tr>
							<td style='padding-bottom: 5px;'>
								<div style='margin: 0px 10px 0px 10px;'>
									Dear " . $row["staff_name"] . " You are a Member in my website !!!!
									<table>
										<tr>
											<td>Name : </td>
											<td> " . $row["staff_name"] . "</td>
										</tr>
										<tr>
											<td>Email : </td>
											<td> " . $row["staff_email"] . "</td>
										</tr>
									</table>
								</div>
							</td>
						</tr>
						</table>
					</body>
				</html>";
			$CI->email->from("gic@insurancesathi.in", "GIC ( Insurance Sathi )");
			$CI->email->to($row["staff_email"]);
			$CI->email->subject("Greeting GIC ( Insurance Sathi ))");
			$CI->email->message($message_body);
		}
		if (!$CI->email->send()) {
			$error = $CI->email->print_debugger();
			$CI->session->set_flashdata('err_msg', $error);
		} else {
			$CI->session->set_flashdata('msg', 'Email has been Send Successfully.');
		}
	}

	public function send_multi_user_email_bak($staff_result)
	{
		$CI = &get_instance();
		$message_body = "";
		foreach ($staff_result as $row) {
			// $name[] = $row["staff_name"];

			$message_body .= "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
			<html>
				<body style='margin: 0; padding: 0;'>
					<br /><table align='center' cellpadding='0' cellspacing='0' width='600' style='border-top: 3px solid #ccff55; border-right: 3px solid #c0c0c0; border-bottom: 3px solid #c0c0c0; border-left: 3px solid #c0c0c0;'>
						<tr>
							<td style='padding-top: 5px;'>
								<div style='margin: 5px 5px 5px 5px; font-weight: bold; font-size: 22px; background-color:#6f42c1;color:#fff;'><center>*GIC ( Insurance Sathi )*</center>
								</div>
							</td>
						</tr>
						<tr>
							<td style='padding-bottom: 5px;'>
								<div style='margin: 0px 10px 0px 10px;'>
									Dear " . $row["staff_name"] . " You are a Member in my website !!!!
									<table>
										<tr>
											<td>Name : </td>
											<td> " . $row["staff_name"] . "</td>
										</tr>
										<tr>
											<td>Email : </td>
											<td> " . $row["staff_email"] . "</td>
										</tr>
									</table>
								</div>
							</td>
						</tr>
						</table>
					</body>
				</html>";
		}

		print_r($message_body);
		die();

		$CI->email->from("hppriyanshu1104@gmail.com", "GIC ( Insurance Sathi )");

		foreach ($staff_result as $row) {
			$email[] = $row["staff_email"];
			//~ $email = $row["email"];
		}
		//~ $email_to = array($email);
		$email_to = $email;
		//~ print_r($email_to);
		//~ print_r($name);
		//~ die("Test");
		$CI->email->to($email_to);
		$CI->email->subject("Greeting GIC ( Insurance Sathi ))");
		$CI->email->message($message_body);
		if (!$CI->email->send()) {
			$error = $CI->email->print_debugger();
			$CI->session->set_flashdata('err_msg', $error);
		} else {
			$CI->session->set_flashdata('msg', 'Email has been Send Successfully.');
		}
	}

	public function dev_send_email($user_data)
	{
		$CI = &get_instance();
		$CI->data["user_data"] = $user_data;
		foreach ($user_data as $address) {
			$name[] = $address["fname"];
			$email[] = $address["email"];

			$text_message = "
				<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
				<html>
					<head> 
						<title></title>
					</head>
					<body>
						<table border ='1'>
							<tbody>
								<tr>
									<td colspan='5'>Dear " . $address["fname"] . " ,</td>
								</tr>
								<tr>
									<td colspan='5'>
									&nbsp;&nbsp;&nbsp;&nbsp; Your Registed Email is " . $address["email"] . " .<br>
									&nbsp;&nbsp;&nbsp;&nbsp; You are Registered To my Website Enjoy Your Self.<br>
									&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Thank You For registration</td>
								</tr>
							</tbody>
						</table>
					</body>
				</html>";
		}
		$text_message_1 = $text_message;
		$email_to = $email;
		$name_to = $name;
		//~ print_r($text_message);
		//~ print_r($text_message_1);
		//~ die("Test");
		$CI->email->from("technicaltutorialsmedia@gmail.com", "Technical Tutorials Media");
		$CI->email->to($email_to);
		$CI->email->subject("(Technical Tutorials Medias(TTM))");
		$CI->email->message($text_message_1);
		if (!$CI->email->send()) {
			$error = $CI->email->print_debugger();
			$CI->session->set_flashdata('err_msg', $error);
			return $mail_arr;
		} else {
			$mail_arr["error"] = 1;
			$mail_arr["mail_error"] = "";
			$CI->email->clear(TRUE);
			$CI->session->set_flashdata('msg', 'Email has been Send Successfully.');
			return $mail_arr;
		}
	}

	public function dev_send_email_bak($user_data)
	{
		$CI = &get_instance();
		foreach ($user_data as $row) {
			$name[] = $row["fname"] . " " . $row["mname"] . " " . $row["lname"];
			$org_name[] = $row["org_name"];
			$org_code[] = $row["org_code"];
			$org_email[] = $row["org_email"];
		}
		$name_to = $name;
		$message_body = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
			<html>
				<body style='margin: 0; padding: 0;'>
					<br /><table align='center' cellpadding='0' cellspacing='0' width='600' style='border-top: 3px solid #ccff55; border-right: 3px solid #c0c0c0; border-bottom: 3px solid #c0c0c0; border-left: 3px solid #c0c0c0;'>
						<tr>
							<td style='padding-top: 15px;'>
								<div style='margin: 0px 10px 0px 10px; font-weight: bold; font-size: 22px; background-color:#6f42c1;color:#fff;'>
									*" . $org_name . " ( " . $org_code . " ) *<br /><hr />
								</div>
							</td>
						</tr>
						<tr>
							<td style='padding-bottom: 15px;'>
								<div style='margin: 0px 10px 0px 10px;'>
									Dear Admin : " . $name_to . " of Orgnization : " . $org_name . " are Member in my website !!!!
										Enjoy Your Business Life.
										
									Thank You For Registration.
								</div>
							</td>
						</tr>
						</table>
					</body>
				</html>";


		$CI->email->from("technicaltutorialsmedia@gmail.com", "Technical Tutorials Media");

		//~ $email_to = array($email);
		$email_to = $org_email;
		//~ print_r($email_to);
		//~ print_r($name_to);
		//~ print_r($user_data);
		//~ die("Test");
		$CI->email->to($email_to);
		$CI->email->subject("(Technical Tutorials Medias(TTM))");
		$CI->email->message($message_body);
		if (!$CI->email->send()) {
			$error = $CI->email->print_debugger();
			$CI->session->set_flashdata('err_msg', $error);
			return FALSE;
		} else {
			$CI->session->set_flashdata('msg', 'Email has been Send Successfully.');
		}
	}



	//this function is in use to Send Email 
	public function email($user_id, $name, $email_to, $mobile, $user_code, $password)
	{
		$CI = &get_instance();
		$email_structure = "";
		$message_body = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
			<html>
				<body style='margin: 0; padding: 0;'>
					<br /><table align='center' cellpadding='0' cellspacing='0' width='600' style='border-top: 3px solid #ccff55; border-right: 3px solid #c0c0c0; border-bottom: 3px solid #c0c0c0; border-left: 3px solid #c0c0c0;'>
						<tr>
							<td style='padding-top: 15px;'>
								<div style='margin: 0px 10px 0px 10px; font-weight: bold; font-size: 22px;'>
									*Web Faster School*<br /><hr />
								</div>
							</td>
						</tr>
						<tr>
							<td style='padding-bottom: 15px;'>
								<div style='margin: 0px 10px 0px 10px;'>
									<span style='font-weight: bold; font-size: 18px;'>Dear " . $name . ",</span><br />
									You are Registered Successfully to the <strong>Web Faster School (WFS)</strong><br /><br />
									Your User Id: <strong>" . $user_id . "</strong><br />
									Your User Name: <strong>" . $name . "</strong><br />
									Your User Code: <strong>" . $user_code . "</strong><br />
									Your Email: <strong>" . $email_to . "</strong><br />
									Your Mobile: <strong>" . $mobile . "</strong><br />
									Your Password: <strong>" . $password . "</strong><br /><br />
									You may now login by clicking below url and Enjoy Your Business Life. We wish you good luck in finding right Platform to here.<br />
									<a href='" . base_url() . "login/index'>Login Link</a>";

		//~ if($emailsignature_status==1)
		//~ $email_structure.=$emailsignature_text;
		//~ else
		$email_structure .= "Thank you ! " . $name . ".";

		$email_structure .= "
								</div>
							</td>
						</tr>
					</table>
				</body>
			</html>";
		$CI->email->from("hppriyanshu1104@gmail.com", "Web Faster Schools(WFS)");
		$CI->email->to($email_to);
		$CI->email->subject("Greetings !!!!");
		$CI->email->message($message_body);
		if (!$CI->email->send()) {
			$error = $CI->email->print_debugger();
			$CI->session->set_flashdata('err_msg', $error);
		} else {
			$CI->session->set_flashdata('msg', 'Email has been Send Successfully.');
		}
	}

	public function email_verification($name, $email_to, $activationcode)
	{
		$CI = &get_instance();
		$message_body = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
			<html>
				<body style='margin: 0; padding: 0;'>
					<br /><table align='center' cellpadding='0' cellspacing='0' width='600' style='border-top: 3px solid #ccff55; border-right: 3px solid #c0c0c0; border-bottom: 3px solid #c0c0c0; border-left: 3px solid #c0c0c0;'>
						<tr>
							<td style='padding-top: 15px;'>
								<div style='margin: 0px 10px 0px 10px; font-weight: bold; font-size: 22px; background-color:#6f42c1;color:#fff;'>
									*Web Faster School*<br /><hr />
								</div>
							</td>
						</tr>
						<tr>
							<td style='padding-bottom: 15px;'>
								<div style='margin: 0px 10px 0px 10px;'>
									<span style='font-weight: bold; font-size: 18px;'>Dear " . $name . ",</span><br />
									Thanks for new Registration.
									<div style='padding-top:8px;'>Please click The following link For verifying Your Email : " . $email_to . " and activation of your account</div>
									<div style='padding-top:10px;'><a href='" . base_url() . "login/email_verify?code=$activationcode'>Click Here</a></div>
									<div style='padding-top:4px;'>Powered by <a href='technicaltutorialsmedia@gmail.com'>technicaltutorialsmedia@gmail.com</a></div>
								</div>
							</td>
						</tr>
						</table>
					</body>
				</html>";

		$CI->email->from("hppriyanshu1104@gmail.com", "Web Faster Schools(WFS)");
		$CI->email->to($email_to);
		$CI->email->subject("Email verification (Web Faster Schools(WFS))");
		$CI->email->message($message_body);
		if (!$CI->email->send()) {
			$error = $CI->email->print_debugger();
			$CI->session->set_flashdata('err_msg', $error);
		} else {
			$CI->session->set_flashdata('msg', 'Email has been Send Successfully.');
		}
	}

	public function mobile_no_verification($name, $email_to, $mobile_number, $activationcode)
	{
		$CI = &get_instance();
		$message_body = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
			<html>
				<body style='margin: 0; padding: 0;'>
					<br /><table align='center' cellpadding='0' cellspacing='0' width='600' style='border-top: 3px solid #ccff55; border-right: 3px solid #c0c0c0; border-bottom: 3px solid #c0c0c0; border-left: 3px solid #c0c0c0;'>
						<tr>
							<td style='padding-top: 15px;'>
								<div style='margin: 0px 10px 0px 10px; font-weight: bold; font-size: 22px; background-color:#6f42c1;color:#fff;'>
									*Web Faster School*<br /><hr />
								</div>
							</td>
						</tr>
						<tr>
							<td style='padding-bottom: 15px;'>
								<div style='margin: 0px 10px 0px 10px;'>
									<span style='font-weight: bold; font-size: 18px;'>Dear " . $name . ",</span><br />
									Thanks for new Registration.
									<div style='padding-top:8px;'>Please click The following link For verifying Your Mobile Number : " . $mobile_number . " and activation of your account</div>
									<div style='padding-top:10px;'><a href='" . base_url() . "login/mobile_verify?code=$activationcode'>Click Here</a></div>
									<div style='padding-top:4px;'>Powered by <a href='technicaltutorialsmedia@gmail.com'>technicaltutorialsmedia@gmail.com</a></div>
								</div>
							</td>
						</tr>
						</table>
					</body>
				</html>";

		$CI->email->from("hppriyanshu1104@gmail.com", "Web Faster Schools(WFS)");
		$CI->email->to($email_to);
		$CI->email->subject("Mobile Number verification (Web Faster Schools(WFS))");
		$CI->email->message($message_body);
		if (!$CI->email->send()) {
			$error = $CI->email->print_debugger();
			$CI->session->set_flashdata('err_msg', $error);
		} else {
			$CI->session->set_flashdata('msg', 'Email has been Send Successfully.');
		}
	}

	public function send_email_otp($name, $email_to, $otp_pin)
	{
		$CI = &get_instance();
		$message_body = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
			<html>
				<body style='margin: 0; padding: 0;'>
					<br /><table align='center' cellpadding='0' cellspacing='0' width='600' style='border-top: 3px solid #ccff55; border-right: 3px solid #c0c0c0; border-bottom: 3px solid #c0c0c0; border-left: 3px solid #c0c0c0;'>
						<tr>
							<td style='padding-top: 15px;'>
								<div style='margin: 0px 10px 0px 10px; font-weight: bold; font-size: 22px; background-color:#6f42c1;color:#fff;'>
									*Web Faster School*<br /><hr />
								</div>
							</td>
						</tr>
						<tr>
							<td style='padding-bottom: 15px;'>
								<div style='margin: 0px 10px 0px 10px;'>
									<span style='font-weight: bold; font-size: 18px;'>Dear " . $name . ",</span><br />
									Thanks for new Registration.
									<div style='padding-top:8px;'>Your OTP for Admin login is :$otp_pin</div>
									
								</div>
							</td>
						</tr>
						</table>
					</body>
				</html>";

		$CI->email->from("hppriyanshu1104@gmail.com", "Web Faster Schools(WFS)");
		$CI->email->to($email_to);
		$CI->email->subject("Mobile OTP verification (Web Faster Schools(WFS))");
		$CI->email->message($message_body);
		if (!$CI->email->send()) {
			$error = $CI->email->print_debugger();
			$CI->session->set_flashdata('err_msg', $error);
		} else {
			$result = 1;
			$CI->session->set_flashdata('msg', 'Email has been Send Successfully.');
			return $result;
		}
	}

	public function forget_password_link($json_encode_user_data)
	{
		$CI = &get_instance();
		$CI->load->library("encrypt");
		$json_userdata = $CI->encrypt->base64_url_decode($json_encode_user_data);
		$data = json_decode($json_userdata, TRUE);
		$CI->data["user_id"] = $user_id = $data["user_id"];
		$CI->data["user_name"] = $user_name = $data["user_name"];
		$CI->data["email"] = $email = $data["email"];
		$CI->data["mobile"] = $mobile = $data["mobile"];

		$CI = &get_instance();
		$message_body = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
			<html>
				<body style='margin: 0; padding: 0;'>
					<br /><table align='center' cellpadding='0' cellspacing='0' width='600' style='border-top: 3px solid #ccff55; border-right: 3px solid #c0c0c0; border-bottom: 3px solid #c0c0c0; border-left: 3px solid #c0c0c0;'>
						<tr>
							<td style='padding-top: 15px;'>
								<div style='margin: 0px 10px 0px 10px; font-weight: bold; font-size: 22px; background-color:#6f42c1;color:#fff;'>
									*Web Faster School*<br /><hr />
								</div>
							</td>
						</tr>
						<tr>
							<td style='padding-bottom: 15px;'>
								<div style='margin: 0px 10px 0px 10px;'>
									<span style='font-weight: bold; font-size: 18px;'>Dear " . $user_name . ",</span><br />
									Thanks for Registration to my Website.
									<div style='padding-top:8px;'>Your Email is : " . $email . "</div>
									<div style='padding-top:8px;'>Your Reset Password Link : <a href='" . base_url() . "login/forget_password_2?code=$json_encode_user_data'>Reset Password</a></div>
									
								</div>
							</td>
						</tr>
						</table>
					</body>
				</html>";

		$CI->email->from("hppriyanshu1104@gmail.com", "Web Faster Schools(WFS)");
		$CI->email->to($email);
		$CI->email->subject("Forget Password (Web Faster Schools(WFS))");
		$CI->email->message($message_body);
		if (!$CI->email->send()) {
			$error = $CI->email->print_debugger();
			$CI->session->set_flashdata('err_msg', $error);
		} else {
			$result = 1;
			$CI->session->set_flashdata('msg', 'Email has been Send Successfully.');
			return $result;
		}
	}
} 	// end of class Email Library
