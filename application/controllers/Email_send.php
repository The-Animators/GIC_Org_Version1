<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Email_send extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
	}
	// Member Section Start
	function sendmail()
	{
		$this->load->library('email');

		// $this->email->initialize($config); // load email library
		// $this->email->set_newline("\r\n");
		// $this->email->set_crlf("\r\n");
		$this->email->from('technicaltutorialsmedia@gmail.com', 'sender name');
		$this->email->to('hppriyanshu1104@gmail.com');
		$this->email->cc('test2@gmail.com');
		$this->email->subject('Your Subject');
		$this->email->message('Your Message');
		// $this->email->attach('/path/to/file1.png'); // attach file
		// $this->email->attach('/path/to/file2.pdf');
		// print_r($this->email->send());die();
		if ($this->email->send())
			echo "Mail Sent!";
		else {
			echo "There is error in sending mail!";
			$message = $this->email->print_debugger();

			print_r($message);
			die();
		}
	}

	public function multi_user_email()
	{
		$this->load->library("email_lib");
		$email = "hppriyanshu1104@gmail.com";
		$this->email_lib->send_mail($email, $subject = "Test", $body = "");
		die();

		// redirect("admin/web_school/user_list");
	}
	public function multi_user_email2()
	{
		$this->load->library("email_lib");
		$groupByArr = array("staff.staff_id");
		$whereArr["staff.staff_status"] = 1;
		$whereArr["staff.del_flag"] = 1;
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "staff", $colNames = "staff.staff_id, staff.staff_name, staff.staff_username, staff.staff_password, staff.staff_email, staff.fk_user_role_id, staff.staff_status, staff.del_flag, staff.staff_doj, staff.staff_sallary , staff.staff_profile , staff.staff_pan , staff.staff_aadhar , staff.staff_mobile , staff.staff_desc ", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$staff_result = $query["userData"];
		$email = "hppriyanshu1104@gmail.com";
		$this->email_lib->send_multi_user_email($staff_result);
		die();

		// redirect("admin/web_school/user_list");
	}

	public function send_whatsapp_message()
	{
		$groupByArr = array("staff.staff_id");
		$whereArr["staff.staff_status"] = 1;
		$whereArr["staff.del_flag"] = 1;
		$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "staff", $colNames = "staff.staff_id, staff.staff_name, staff.staff_username, staff.staff_password, staff.staff_email, staff.fk_user_role_id, staff.staff_status, staff.del_flag, staff.staff_doj, staff.staff_sallary , staff.staff_profile , staff.staff_pan , staff.staff_aadhar , staff.staff_mobile , staff.staff_desc ", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
		$staff_result = $query["userData"];

		foreach($staff_result as $row){
			$chatApiToken = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE2MzMxNjgxNjMsInVzZXIiOiI5MTg2NTIxMDA3MTUifQ.yJqg-Ou7rrosSVuw9fLYeqGxXyQgwqcRzgF2qIymdqs"; // Get it from https://www.phphive.info/255/get-whatsapp-password/
			//http://chat-api.phphive.info/login/gui // QR Code LInk This is very Usefull
			$number = "91".$row["staff_mobile"].""; // Number
			
			$message = "Dear " . $row["staff_name"] . " You are a Member in my website !!!! \r\n\r\n Name :" . $row["staff_name"] . "\r\n\r\nEmail :  " . $row["staff_email"] . "\r\n\r\nMobile : " . $row["staff_mobile"] . "";

			// $message = "Hello :)"; // Message

			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => 'http://chat-api.phphive.info/message/send/text',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => json_encode(array("jid" => $number . "@s.whatsapp.net", "message" => $message)),
				CURLOPT_HTTPHEADER => array(
					'Authorization: Bearer ' . $chatApiToken,
					'Content-Type: application/json'
				),
			));

			$response = curl_exec($curl);
			curl_close($curl);
			echo $response;
		}
	}

	function convert_currency($from_currency, $to_currency, $amt) {
		$from_currency = urlencode($from_currency);
		$to_currency = urlencode($to_currency);
		$amt = urlencode($amt);

		$data = file_get_contents("http://www.google.com/finance/converter?a=$amt&from=$from_currency&to=$to_currency");
		$data = explode('bld>', $data);
		$data = explode($to_currency, $data[1]);
		return round($data[0], 2);
	}

	function thmx_currency_convert($from_currency, $to_currency, $amt){
		$url = 'https://api.exchangerate-api.com/v4/latest/'.$from_currency;
		// $url = 'https://api.exchangerate-api.com/v4/latest/USD';
		$json = file_get_contents($url);
		$exp = json_decode($json);
	
		$convert = $exp->rates->$to_currency;
		print_r($exp);
	
		return $convert * $amt;
	}

	function get_converted_currency(){
		echo $this->thmx_currency_convert('USD', 'PKR',1); // Right Get Data
		// echo $this->convert_currency('USD', 'INR', 1);

		//PKR -Pakistan
		//BDT -Bangladesh
		//USD -America

		echo $this->translate('en', 'hi', "How are You ?");
	}

	function translate($from_lan, $to_lan, $text){
		$json = json_decode(file_get_contents('https://ajax.googleapis.com/ajax/services/language/translate?v=1.0&q=' . urlencode($text) . '&langpair=' . $from_lan . '|' . $to_lan));
		$translated_text = $json->responseData->translatedText;
	
		return $translated_text;
	}

}
