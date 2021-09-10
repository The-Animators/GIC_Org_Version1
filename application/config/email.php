<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
    // $config = array();
	$config["protocol"] = "smtp";  // SMTP. This is the main protocol used for sending emails.
	$config["smtp_host"] = "mail.insurancesathi.in";  // This is the main SMTP Host used for sending emails. // mail.insurancesathi.in
	$config["smtp_port"] = "465";  // SMTP Port used for SMTP mail 465 or 587 or 25
	$config["smtp_user"] = "gic@insurancesathi.in";   // The SMTP User Name and Password
	$config["smtp_pass"] = "22?jzu4D";   // The SMTP User Name and Password
	$config["debug"] = True;   // The Debug Code
	$config["charset"] = "utf-8"; // A charset can be iso-8859-1 or utf-8 
	$config["mailtype"] = "html";  // Mail Type can be HTML or plain text.
	$config["multipart"]="related";
	$config["newline"] = "\r\n";  // New Line character to be \r\n.
	
	// $config["smtp_crypto"] = "tls"; //  Encryption method to be used, i.e. TLS, SSL etc.
	// $config['send_multipart'] = FALSE;
	// $config['wordwrap'] = TRUE;
	// $config['_smtp_auth'] = TRUE;
	// $config['newline'] = "\r\n";
	// $config['crlf'] = "\r\n";
	// print_r($config);
	// die();
?>
