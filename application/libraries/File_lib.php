<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class File_lib
{
	//this function is in use to Every Function
	function __construct()
	{
		$CI = &get_instance();
	}
	//this function is in use to File Upload
	public function file_upload($img_name = "", $directory_name = "", $overwrite = "", $allowed_types = "", $max_size = "", $max_width = "", $max_height = "", $remove_spaces = "", $encrypt_name = "", $string = "", $url = "", $user_session_id = "")
	{
		$CI = &get_instance();
		$directory_name = str_replace(" ", "_", $directory_name);
		if (!is_dir($directory_name)) {
			mkdir($directory_name, 0777, TRUE);
			chmod($directory_name, 0777);
		}
		// print_r($user_session_id);
		// die();
		$upload_path              	= $directory_name;	// Directory Name .
		$config["upload_path"] 		= $upload_path;	 	// Directory Name Where File Store It.
		$config["overwrite"] 		= $overwrite;		// True or False
		$config["allowed_types"] 	= $allowed_types;	// File Type
		$config["max_size"] 		= $max_size;		//File Size in kb
		$config["max_width"] 		= $max_width;	 	// width
		$config["max_height"] 		= $max_height;		// Height
		$config["remove_spaces"] 	= $remove_spaces;	// True or False
		$config["encrypt_name"] 	= $encrypt_name;	// True or False

		$original_file_name = $_FILES[$img_name]["name"];
		$original_file_name_cont = str_replace(" ", "_", $original_file_name);
		$string_name_org = str_replace(" ", "_", $string);
		if ($user_session_id == "_Policy_No_"){
			$path_parts = pathinfo($original_file_name);
			$dirname = $path_parts['dirname'];
			$basename = $path_parts['basename'];
			$extension = $path_parts['extension'];
			$filename = $path_parts['filename']; // filename is only since PHP 5.2.0
			$original_file_name_cont = str_replace(" ", "_", $filename);
			// $config["file_name"] = $file_name = $string_name_org . "_" . $original_file_name_cont;
			$config["file_name"] = $file_name = str_replace(" ", "_", $original_file_name_cont."-".$string_name_org . "-" .date("d_m_Y H_i_s"));
			// print_r($file_name);
			// die();

		}else
			$config["file_name"] = $file_name = $user_session_id . "_" . $string_name_org . "_" . uniqid() . "_v_" . $original_file_name_cont;
		//~ $CI->image_lib->resize();	
		//~ $CI->image_lib->clear();
		// print_r($file_name);
		// die();
		$CI->load->library("upload", $config);
		$CI->upload->initialize($config);
		//~ print_r($config);
		//~ die("Test");
		if (!$CI->upload->do_upload($img_name)) {
			$upload_data = array(
				"error" => $CI->upload->display_errors(),
				"file_name" => "",
				"file_path" => "",
				"full_path" => "",
				"file_type" => "",
				"file_ext" => "",
				"file_size" => "",
			);
			//~ print_r($upload_data);
			//~ die("Test");
			return $upload_data;
		} else {
			$upload_array = $CI->upload->data();
			//~ print_r($upload_array);
			//~ die("Test");		
			$upload_data = array(
				"file_name" => $upload_array["file_name"],
				"file_path" => $upload_array["file_path"],
				"full_path" => $upload_array["full_path"],
				"file_type" => $upload_array["file_type"],
				"file_ext" => $upload_array["file_ext"],
				"file_size" => $upload_array["file_size"] . "kb",
				"error" => "",
			);
			//~ print_r($upload_data);
			//~ die("Test");
			return $upload_data;
		}
	}

	public function jquery_file_upload($img_name = "", $directory_name = "", $string = "", $user_session_id = "")
	{
		$CI = &get_instance();

		$org_filename = $_FILES[$img_name]["name"];
		$string_name_org = str_replace(" ", "_", $string);
		$directory_name = str_replace(" ", "_", $directory_name);
		if (!is_dir($directory_name)) {
			mkdir($directory_name, 0777, TRUE);
			chmod($directory_name, 0777);
		}

		$org_new_filename = $user_session_id . "_" . $string_name_org . "_" . uniqid() . "_v_" . $org_filename;

		$filename = str_replace(" ", "_", $org_new_filename);
		$location = $directory_name . $filename;
		$uploadOk = 1;
		$imageFileType = pathinfo($location, PATHINFO_EXTENSION);
		// Check image format
		if (
			$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif"
		) {
			$uploadOk = 0;
		}

		if ($uploadOk == 0) {
			echo 0;
		} else {
			/* Upload file */
			if (move_uploaded_file($_FILES[$img_name]['tmp_name'], $location)) {
				return $filename;
			} else {
				echo 0;
			}
		}
		exit;
	}

	public function generate_random_string($length = "")
	{
		$characters = "123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$random_string = "";
		for ($i = 0; $i < $length; $i++) {
			$random_string .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $random_string;
	}

	public function encrypt_string($string = "")
	{
		$CI = &get_instance();
		$encrypted_string = $CI->encryption->encrypt($string);
		return $encrypted_string;
	}

	public function decrypt_string($string = "")
	{
		$CI = &get_instance();
		$decrypted_string = $CI->encryption->decrypt($string);
		return $decrypted_string;
	}

	public function base_url_encrypt($string = "")
	{
		$CI = &get_instance();
		$json_encode_data = $CI->encrypt->base64_url_encode($string);
		return $json_encode_data;
	}

	public function base_url_decrypt($string = "")
	{
		$CI = &get_instance();
		$json_decode_data = $CI->encrypt->base64_url_decode($string);
		return $json_decode_data;
	}

	public function base64_url_encode($string = "")
	{
		return strtr(base64_encode($string), "+/=~", "-_,");
	}

	public function base64_url_decode($string = "")
	{
		return base64_decode(strtr($string, "-_,", "+/=~"));
	}

	public function bread_crumb($menu_name, $menu_url, $menu_status)
	{
		//~ $CI =& get_instance();
		//~ foreach($menu_name as $row)
		//~ {
		//~ $menu_name[]=$row;
		//~ $menu_url[]=$row;
		//~ $menu_status[]=$row;
		//~ }
		//~ foreach($menu_url as $row)
		//~ {
		//~ $menu_url[]=$row;			
		//~ }
		//~ foreach($menu_status as $row)
		//~ {
		//~ $menu_status[]=$row;			
		//~ }

		//~ $breadcrumb_data[]=array(
		//~ "menu_label"=>$menu_name[0]["menu_label][$i],
		//~ "menu_url"=>$menu_url,
		//~ "menu_active"=>$menu_status,
		//~ );	
		//~ print_r($breadcrumb_data);
		//~ die("Test");
		//~ return $breadcrumb_data;
	}
} 	// end of class File Library
