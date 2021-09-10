<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Email_lib
{

	public function send_mail($email_to, $subject, $body)
	{
		$CI = &get_instance();
		// $from_email = "gic@insurancesathi.in";

		$from_email = "gic@insurancesathi.in";

		//Load email library
		$CI->load->library('email');
		$CI->email->from($from_email, 'Identification');
		$CI->email->to($email_to);
		$CI->email->subject('Send Email Codeigniter');
		$CI->email->message('The email send using codeigniter library');
		//Send mail
		if (!$CI->email->send())
			$message = $CI->email->print_debugger();
		else
			$message = "Congragulation Email Send Successfully.";

		print_r($message);
		die();
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

			$message_body = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
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
			$CI->email->attach(base_url().'/assets/phs_register_doc/receipt_doc/airbnb-serial_no_Aug20211-policy_no_3547658678-61175fa84ce09-14_08_2021_11_46_08.png','Attachment','phs_regi.png');
			if (!$CI->email->send()) {
				$error = $CI->email->print_debugger();
				echo  $error;
			} else {
				echo  'Email has been Send Successfully.';
			}
		}
	}
} 	// end of class Email Library
