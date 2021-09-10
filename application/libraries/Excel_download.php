<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Excel_download
{
	function download_file($custom_filename = "", $file_extn = "xls", $file_path = "")
	{
		if ($file_path != "")
			$myFile = $file_path;
		else
			$myFile = "./uploads/testexcel.csv";
		header("Content-Length: " . filesize($myFile));
		switch ($file_extn) {
			case "xls":
				header('Content-Type: application/vnd.ms-excel');
				break;
			case "csv":
				header('Content-Type: application/csv');
				break;
			case "xlsx":
				header('Content-Type: application/vnd.ms-excel');
				break;
			case "doc":
				header('Content-Type: application/vnd.ms-word');
				break;
			default:
				header('Content-Type: application/vnd.ms-excel');
				break;
		}
		if ($custom_filename != "")
			header('Content-Disposition: attachment; filename=' . $custom_filename . '.' . $file_extn);
		else
			header('Content-Disposition: attachment; filename=excel_' . date("Y_m_d_H_i_s") . '.' . $file_extn);
		readfile($myFile);
	}
} 	// end of class Email Library
