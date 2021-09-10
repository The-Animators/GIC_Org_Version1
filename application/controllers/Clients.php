<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clients extends CI_Controller
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
		//Templete	
		$this->data["css_plugins"] = array("data_table", "toaster", "sweet_alert", "select2", "date_picker", "tagsinput");
		$this->data["js_plugins"] = array("data_table", "toaster", "sweet_alert", "select2", "date_picker", "tagsinput");
		$this->data["base_url"] = $this->config->item("base_url");
		$this->data["top_bar"] = $this->config->item("template_folder") . "include/top_bar";
		$this->data["nav_bar"] = $this->config->item("template_folder") . "include/nav_bar";
		$this->data["right_sidebar"] = $this->config->item("template_folder") . "include/right_sidebar";
		$this->data['method'] = $this->router->fetch_method();
		$this->data['class'] = $this->router->fetch_class();
	}

	public function index_back()
	{
		$this->data["title"] = $title = "Clients";
		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => $title,
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;
		$this->data['states']     		= getstates();
		$this->data['policy_section']     	= $this->getpolicy_question();
		// $this->data['client_details']     	= $this->get_client_details($cid);


		$this->data['css']        		= array(
			"assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css",
		);
		$this->data['js']        = array(
			"assets/js/jquery.repeater.min.js",
			"assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js",
			"assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js",
		);
		$this->data["main_page"] = "master/clients/clients";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function member_details_back()
	{
		$this->data["title"] = $title = "Member";
		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Clients",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => $title,
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;
		$this->data['states']     		= getstates();
		$this->data['getRelation']     		= getRelation();
		$this->data['policy_section']     	= $this->getpolicy_question();
		$this->data['client_details']     	= $this->get_member();


		$this->data['css']        		= array(
			"assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css",
		);
		$this->data['js']        = array(
			"assets/js/jquery.repeater.min.js",
			"assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js",
			"assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js",
		);
		$this->data["main_page"] = "master/clients/member_details";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function view_member($id)
	{
		$this->data["c_id"] = $cid =  $id;

		// echo $this->data["c_id"]; exit;
		$this->data["title"] = $title = "Clients";
		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => $title,
			"breadcrumb_url" => "#",
			// "breadcrumb_url" => base_url() . "clients",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[2] = array(
			"breadcrumb_label" => "View " . $title,
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;
		$this->data['states']     		= getstates();
		$this->data['policy_section']     	= $this->getpolicy_question();

		$this->data['client_details']     	= $this->get_single_member($cid);

		$this->data['css']        		= array(
			"assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css",
		);
		$this->data['js']        = array(
			"assets/js/jquery.repeater.min.js",
			"assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js",
			"assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js",
		);
		$this->data["main_page"] = "master/clients/view_member";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function get_member()
	{
		$cust_id = $this->uri->segment(3);

		$this->db->select('*');
		$this->db->from(' customermem_tbl');
		$this->db->where('customer_id', $cust_id);
		$this->db->where('is_delete', 0);

		$i = $this->db->get();
		$result =  $i->result_array();

		return $result;
	}

	public function getpolicy_question()
	{
		$this->db->select('qs.policy_question_section_id,qs.policy_question_section_name');
		$this->db->from('master_policy_question_section qs');
		// $this->db->join('master_policy_question_ans qa', 'qs.policy_question_section_id = qa.fk_policy_question_section_id', 'left');

		$i = $this->db->get();
		return $i->result_array();
	}

	public function client_list()
	{

		$this->data["title"] = $title = "Client";
		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => $title,
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;

		$this->data["main_page"] = "master/clients/client_list";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function view_client()
	{
		$this->data["c_id"] = $cid =  $this->uri->segment(3);

		// echo $this->data["c_id"]; exit;
		$this->data["title"] = $title = "Clients";
		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => $title,
			"breadcrumb_url" => base_url() . "clients",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[2] = array(
			"breadcrumb_label" => "View " . $title,
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;
		$this->data['states']     		= getstates();
		$this->data['policy_section']     	= $this->getpolicy_question();

		$this->data['client_details']     	= $this->get_client_details($cid);
		$this->data['member_details']     	= $this->get_member();

		$this->data['css']        		= array(
			"assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css",
		);
		$this->data['js']        = array(
			"assets/js/jquery.repeater.min.js",
			"assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js",
			"assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js",
		);
		$this->data["main_page"] = "master/clients/view_client";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function edit_client_back()
	{
		$this->data["c_id"] = $cid =  $this->uri->segment(3);

		// echo $this->data["c_id"]; exit;
		$this->data["title"] = $title = "Clients";
		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => $title,
			"breadcrumb_url" => base_url() . "clients",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[2] = array(
			"breadcrumb_label" => "View " . $title,
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;
		$this->data['states']     		= getstates();
		$this->data['policy_section']     	= $this->getpolicy_question();

		$this->data['client_details']     	= $this->get_client_details($cid);

		$this->data['css']        		= array(
			"assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css",
		);
		$this->data['js']        = array(
			"assets/js/jquery.repeater.min.js",
			"assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js",
			"assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js",
		);
		$this->data["main_page"] = "master/clients/edit_client";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function edit_member_back($id = NULL)
	{
		$this->data["c_id"] = $cid =  $id;

		// echo $this->data["c_id"]; exit;
		$this->data["title"] = $title = "Clients";
		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => $title,
			// "breadcrumb_url" => base_url() . "clients",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[2] = array(
			"breadcrumb_label" => "View " . $title,
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;
		$this->data['states']     		= getstates();
		$this->data['getRelation']     		= getRelation();

		$this->data['policy_section']     	= $this->getpolicy_question();

		$this->data['client_details']     	= $this->get_single_member($id);

		$this->data['css']        		= array(
			"assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css",
		);
		$this->data['js']        = array(
			"assets/js/jquery.repeater.min.js",
			"assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js",
			"assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js",
		);
		$this->data["main_page"] = "master/clients/edit_member";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function get_single_member($cid)
	{
		$this->db->select('cm.*,pqa.*,cm.id as cmid,pqa.qst_ans_id as pqaid');
		$this->db->from('customermem_tbl cm');
		$this->db->join('policy_question_ans pqa', 'cm.id = pqa.member_id', 'left');
		$this->db->where('cm.id', $cid);
		// $this->db->where('cm.is_delete',0);

		$i = $this->db->get();
		$result =  $i->result_array();

		return $result;
	}

	public function get_client_details($cid)
	{
		$this->db->select('c.*,c.id as custid,cm.*,cm.id as cmid,pqa.*,pqa.qst_ans_id as pqaid');
		$this->db->from(' customer_tbl c');
		$this->db->join('customermem_tbl cm', 'c.id = cm.customer_id', 'left');
		$this->db->join('policy_question_ans pqa', 'c.id = pqa.customer_id', 'left');
		$this->db->where('c.id', $cid);

		$i = $this->db->get();
		$result =  $i->result_array();

		return $result;

		// if(!empty($result)){
		// 	echo json_encode(array('status'=>true,'data'=>$result));

		// }
		// else{
		// 	echo json_encode(array('status'=>true));
		// }
	}

	public function getmDetails()
	{
		$post = $this->input->post();
		$this->db->select('cm.*,pqa.*,cm.id as cmid,pqa.qst_ans_id as pqaid');
		$this->db->from('customermem_tbl cm');
		$this->db->join('policy_question_ans pqa', 'cm.id = pqa.member_id', 'left');
		$this->db->where('cm.id', $post['id']);
		$this->db->where('cm.is_delete', 0);

		$i = $this->db->get();
		$result =  $i->result_array();


		if (!empty($result)) {
			echo json_encode(array('status' => true, 'data' => $result));
		} else {
			echo json_encode(array('status' => false));
		}
	}

	public function getClient()
	{

		$post = $this->input->post();
		$this->db->select('*');
		$this->db->from('customer_tbl');
		// $this->db->join('customermem_tbl cm', 'c.id = cm.customer_id', 'left');
		// $this->db->join('policy_question_ans pqa', 'c.id = pqa.customer_id', 'left');
		$this->db->where('id', $post['id']);

		$i = $this->db->get();
		$result =  $i->result_array();


		if (!empty($result)) {
			echo json_encode(array('status' => true, 'data' => $result));
		} else {
			echo json_encode(array('status' => false));
		}
	}

	public function filter_client_list()
	{
		$filter_group_name = $this->input->post("filter_group_name");
		$filter_refered_by = $this->input->post("filter_refered_by");
		$filter_office_contact = $this->input->post("filter_office_contact");
		$filter_status = $this->input->post("filter_status");

		$groupByArr = array(
			"customer_tbl.id",
		);

		$result2 = array();
		$whereArr = array();
		$likeCondtnArr = array();
		if (!empty($this->input->post())) {
			if (!empty($filter_group_name))
				$likeCondtnArr["customer_tbl.grpname"] = $filter_group_name;
			if (!empty($filter_refered_by))
				$likeCondtnArr["customer_tbl.reffered_by"] = $filter_refered_by;
			if (!empty($filter_office_contact))
				$likeCondtnArr["customer_tbl.o_office_contact1"] = $filter_office_contact;
			if (!empty($filter_status)) {
				if ($filter_status == 1)
					$filter_status = 1; // Active
				else if ($filter_status == 2)
					$filter_status = 0; // In-Active

				$whereArr["customer_tbl.c_status"] = $filter_status;
			}

			$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "customer_tbl", $colNames =  "customer_tbl.*", $whereArr = $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = $likeCondtnArr, $joinArr = array(), $orderByArr = array(), $groupByArr = $groupByArr, $singleRow = FALSE, $colActive = TRUE, $paginationArr = "");
			$result2 = $query["userData"];
			$total_client_data = count($result2);
		}

		if (!empty($result2)) {
			$result["status"] = true;
			$result["userdata"] = $result2;
			$result["total_client_data"] = $total_client_data;
			$result["message"] = array();
		} else {
			$result["status"] = false;
			$result["userdata"] = array();
			$result["total_client_data"] = "";
			$result["message"] = array();
		}
		echo json_encode($result);
	}

	public function get_client_list()
	{

		// print_r($this->session->userdata());
		// echo $this->session->userdata('@_client_id');
		// exit;
		$c_id = $this->session->userdata('@_client_id');
		if (!empty($c_id)) {

			$this->db->select('*');
			$this->db->from('customer_tbl');
			// $this->db->join('customermem_tbl cm', 'c.id = cm.customer_id', 'left');
			// $this->db->join('policy_question_ans pqa', 'c.id = pqa.customer_id', 'left');
			// $this->db->where('c_is_delete', 0);
			$this->db->where('id', $c_id);

			$i = $this->db->get();
			$result =  $i->result_array();
			$total_client_data = count($result);
		} else {
			$this->db->select('*');
			$this->db->from('customer_tbl');
			// $this->db->join('customermem_tbl cm', 'c.id = cm.customer_id', 'left');
			// $this->db->join('policy_question_ans pqa', 'c.id = pqa.customer_id', 'left');
			// $this->db->where('c_is_delete', 0);
			// $this->db->where('id',$c_id);

			$i = $this->db->get();
			$result =  $i->result_array();
			$total_client_data = count($result);
		}


		if (!empty($result)) {
			echo json_encode(array('status' => true, 'data' => $result, 'total_client_data' => $total_client_data));
		} else {
			echo json_encode(array('status' => true));
		}
	}

	public function saveClientDetails()
	{

		$post = $this->input->post();


		if (!empty($post)) {
			$contactp['contact_name'] = $post['contact_name'];
			$contactp['mobile'] = $post['mobile'];
			$contactp['whatsapp'] = $post['whatsapp'];
			$contactp['telegram'] = $post['telegram'];
			$contactp['contact_email'] = $post['contact_email'];

			$contact['grpname'] = $post['grpname'];
			$contact['reffered_by'] = $post['reffered_by'];
			$contact['contact_person'] = json_encode($contactp);
			$contact['r_address1'] = $post['r_address1'];
			$contact['r_address2'] = $post['r_address2'];
			$contact['r_address3'] = $post['r_address3'];
			$contact['r_state'] = $post['r_state'];
			$contact['r_country'] = $post['r_country'];
			$contact['r_city'] = $post['r_city'];
			$contact['r_zip'] = $post['r_zip'];
			$contact['r_office_contact1'] = $post['r_office_contact1'];
			$contact['r_office_contact2'] = $post['r_office_contact2'];
			$contact['officecheck'] = $post['officecheck'];
			$contact['o_address1'] = $post['o_address1'];
			$contact['o_address2'] = $post['o_address2'];
			$contact['o_address3'] = $post['o_address3'];
			$contact['o_state'] = $post['o_state'];
			$contact['o_country'] = $post['o_country'];
			$contact['o_city'] = $post['o_city'];
			$contact['o_zip'] = $post['o_zip'];
			$contact['o_office_contact1'] = $post['o_office_contact1'];
			$contact['o_office_contact2'] = $post['o_office_contact2'];

			$this->db->insert('customer_tbl', $contact);
			$customer_id = $this->db->insert_id();


			echo json_encode(array('status' => true, 'id' => $customer_id));
		} else {
			echo json_encode(array('status' => false));
		}
	}

	public function saveMember()
	{

		$post = $this->input->post();

		$customer_id = $post['customer_id'];
		// echo $customer_id; exit;
		// print_r($post); exit;
		if (!empty($post)) {



			if (!empty($_FILES['pan_image']['name'])) {
				$config['upload_path'] = './assets/member_doc/pan_image';
				$config['allowed_types'] = 'jpg|jpeg|png|pdf';
				$config['file_name'] = 'pan_image_' . time();

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('pan_image')) {
					$uploadData = $this->upload->data();
					$pan_image = $uploadData['file_name'];
				} else {
					$pan_image = '';
				}
			} else {
				$pan_image = '';
			}

			if (!empty($_FILES['aadhar_image']['name'])) {
				$config['upload_path'] = './assets/member_doc/aadhar_image';
				$config['allowed_types'] = 'jpg|jpeg|png|pdf';
				$config['file_name'] = 'aadhar_image_' . time();

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('aadhar_image')) {
					$uploadData = $this->upload->data();
					$aadhar_image = $uploadData['file_name'];
				} else {
					$aadhar_image = '';
				}
			} else {
				$aadhar_image = '';
			}

			if (!empty($_FILES['passport_image']['name'])) {
				$config['upload_path'] = './assets/member_doc/passport_image';
				$config['allowed_types'] = 'jpg|jpeg|png|pdf';
				$config['file_name'] = 'passport_image_' . time();

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('passport_image')) {
					$uploadData = $this->upload->data();
					$passport_image = $uploadData['file_name'];
				} else {
					$passport_image = '';
				}
			} else {
				$passport_image = '';
			}

			if (!empty($_FILES['gst_image']['name'])) {
				$config['upload_path'] = './assets/member_doc/gst_image';
				$config['allowed_types'] = 'jpg|jpeg|png|pdf';
				$config['file_name'] = 'gst_image_' . time();

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('gst_image')) {
					$uploadData = $this->upload->data();
					$gst_image = $uploadData['file_name'];
				} else {
					$gst_image = '';
				}
			} else {
				$gst_image = '';
			}

			if (!empty($_FILES['birth_certificate']['name'])) {
				$config['upload_path'] = './assets/member_doc/birth_certificate';
				$config['allowed_types'] = 'jpg|jpeg|png|pdf';
				$config['file_name'] = 'birth_certificate_' . time();

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('birth_certificate')) {
					$uploadData = $this->upload->data();
					$birth_certificate = $uploadData['file_name'];
				} else {
					$birth_certificate = '';
				}
			} else {
				$birth_certificate = '';
			}

			if (!empty($_FILES['photo']['name'])) {
				$config['upload_path'] = './assets/member_doc/photo';
				$config['allowed_types'] = 'jpg|jpeg|png|pdf';
				$config['file_name'] = 'photo_' . time();

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('photo')) {
					$uploadData = $this->upload->data();
					$photo = $uploadData['file_name'];
				} else {
					$photo = '';
				}
			} else {
				$photo = '';
			}

			$doc_img['pan_image'] = $pan_image;
			$doc_img['aadhar_image'] = $aadhar_image;
			$doc_img['passport_image'] = $passport_image;
			$doc_img['gst_image'] = $gst_image;
			$doc_img['birth_certificate'] = $birth_certificate;
			$doc_img['photo'] = $photo;


			$document = json_encode($doc_img);

			$member['customer_id'] = $customer_id;
			$member['document'] = $document;
			$member['contact'] = $post['contact'];
			$member['name'] = $post['name'];
			$member['middle_name'] = $post['middle_name'];
			$member['surname'] = $post['surname'];
			$member['email'] = $post['email'];
			$member['username'] = $post['email'] . '_2';
			$member['password'] = $this->randomPassword();
			$member['role_type'] = $post['role_type'];
			$member['address'] = $post['address'];
			$member['relation'] = $post['relation'];
			$member['title'] = $post['title'];
			$member['gender'] = $post['gender'];
			$member['dob'] = $post['dob'];
			$member['education'] = $post['education'];
			$member['proffession'] = $post['proffession'];
			$member['martial_status'] = $post['martial_status'];
			$member['dom'] = $post['dom'];
			$member['annual_income'] = $post['annual_income'];
			$member['pan_number'] = $post['pan_number'];
			$member['aadhar_card'] = $post['aadhar_card'];
			$member['passport'] = $post['passport'];
			$member['gst_no'] = $post['gst_no'];
			$member['height'] = $post['height'];
			$member['weight'] = $post['weight'];
			$member['chest'] = $post['chest'];
			$member['abdomen'] = $post['abdomen'];
			$member['glasses'] = $post['glasses'];
			$member['current_health_status'] = $post['current_health_status'];

			$member['id'] = $this->id_incrementer_basedon_idss();
			//print_r($member);
			//die();
			$this->db->insert('customermem_tbl', $member);
			$member_id = $this->db->insert_id();

			$question_list['question_list'] = $post['question_list'];
			$question_list['live_or_travel'] = $post['live_or_travel'];
			$question_list['live_or_travel_remarks'] = $post['live_or_travel_remarks'];

			$policy_qst = json_encode($question_list);

			$policy_qst_ans['qst_and_ans'] = $policy_qst;
			$policy_qst_ans['customer_id'] = $customer_id;
			// $policy_qst_ans['member_id'] = $member_id;
			$policy_qst_ans['member_id'] = $member['id'];

			$this->db->insert('policy_question_ans', $policy_qst_ans);


			echo json_encode(array('status' => true));
		} else {
			echo json_encode(array('status' => false));
		}
	}

	// new  Priyanshu	Start
	public function index()
	{
		$this->data["title"] = $title = "Clients";
		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => $title,
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;
		$this->data['states']     		= getstates();
		$this->data['policy_section']     	= $this->getpolicy_question();
		// $this->data['client_details']     	= $this->get_client_details($cid);

		$this->data["main_page"] = "master/clients/clients_p";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function add_client()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('grpname', 'Group Name', 'trim|required');
		$this->form_validation->set_rules('reffered_by', 'Reffered By Name', 'trim|required');
		$this->form_validation->set_rules('r_address1', 'Recidencial Address 1', 'trim|required');
		$this->form_validation->set_rules('r_state', 'Recidencial State', 'trim|required');
		$this->form_validation->set_rules('r_country', 'Recidencial Country', 'trim|required');
		$this->form_validation->set_rules('r_city', 'Recidencial City', 'trim|required');
		$this->form_validation->set_rules('r_zip', 'Recidencial Zip', 'trim|required');
		$this->form_validation->set_rules('r_office_contact1', 'Recidencial Contact 1', 'trim|required');
		$this->form_validation->set_rules('o_address1', 'Office Address 1', 'trim|required');
		$this->form_validation->set_rules('o_state', 'Office State', 'trim|required');
		$this->form_validation->set_rules('o_country', 'Office Country', 'trim|required');
		$this->form_validation->set_rules('o_city', 'Office City', 'trim|required');
		$this->form_validation->set_rules('o_zip', 'Office Zip', 'trim|required');
		$this->form_validation->set_rules('o_office_contact1', 'Office Contact 1', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"grpname_err" => form_error("grpname"),
				"reffered_by_err" => form_error("reffered_by"),
				"r_address1_err" => form_error("r_address1"),
				"r_state_err" => form_error("r_state"),
				"r_country_err" => form_error("r_country"),
				"r_city_err" => form_error("r_city"),
				"r_zip_err" => form_error("r_zip"),
				"r_office_contact1_err" => form_error("r_office_contact1"),
				"o_address1_err" => form_error("o_address1"),
				"o_state_err" => form_error("o_state"),
				"o_country_err" => form_error("o_country"),
				"o_city_err" => form_error("o_city"),
				"o_zip_err" => form_error("o_zip"),
				"o_office_contact1_err" => form_error("o_office_contact1"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			$post = $this->input->post();

			if (!empty($post)) {
				$contactp['contact_name'] = $post['contact_name'];
				$contactp['mobile'] = $post['mobile'];
				$contactp['whatsapp'] = $post['whatsapp'];
				$contactp['telegram'] = $post['telegram'];
				$contactp['contact_email'] = $post['contact_email'];

				$contact['grpname'] = $post['grpname'];
				$contact['reffered_by'] = $post['reffered_by'];
				$contact['contact_person'] = json_encode($contactp);
				$contact['r_address1'] = $post['r_address1'];
				$contact['r_address2'] = $post['r_address2'];
				$contact['r_address3'] = $post['r_address3'];
				$contact['r_state'] = $post['r_state'];
				$contact['r_country'] = $post['r_country'];
				$contact['r_city'] = $post['r_city'];
				$contact['r_zip'] = $post['r_zip'];
				$contact['r_office_contact1'] = $post['r_office_contact1'];
				$contact['r_office_contact2'] = $post['r_office_contact2'];
				$contact['officecheck'] = $post['officecheck'];
				$contact['o_address1'] = $post['o_address1'];
				$contact['o_address2'] = $post['o_address2'];
				$contact['o_address3'] = $post['o_address3'];
				$contact['o_state'] = $post['o_state'];
				$contact['o_country'] = $post['o_country'];
				$contact['o_city'] = $post['o_city'];
				$contact['o_zip'] = $post['o_zip'];
				$contact['o_office_contact1'] = $post['o_office_contact1'];
				$contact['o_office_contact2'] = $post['o_office_contact2'];
				// print_r($contact);
				// die();
				$this->db->insert('customer_tbl', $contact);
				$customer_id = $this->db->insert_id();
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["customer_id"] = "";
				$validator["message"] = "Fatal Error: Contact Support:";
			} else {
				$validator["status"] = true;
				$validator["customer_id"] = $customer_id;
				$validator["message"] = "Client is added Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function edit_client()
	{
		$this->data["c_id"] = $cid =  $this->uri->segment(3);

		// echo $this->data["c_id"]; exit;
		$this->data["title"] = $title = "Clients";
		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => $title,
			"breadcrumb_url" => base_url() . "clients",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[2] = array(
			"breadcrumb_label" => "Edit " . $title,
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;
		$this->data['states']     		= getstates();
		$this->data['policy_section']     	= $this->getpolicy_question();

		$this->data['client_details']     	= $this->get_client_details($cid);

		$this->data["main_page"] = "master/clients/edit_client_p";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function update_client()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('grpname', 'Group Name', 'trim|required');
		$this->form_validation->set_rules('reffered_by', 'Reffered By Name', 'trim|required');
		$this->form_validation->set_rules('r_address1', 'Recidencial Address 1', 'trim|required');
		$this->form_validation->set_rules('r_state', 'Recidencial State', 'trim|required');
		$this->form_validation->set_rules('r_country', 'Recidencial Country', 'trim|required');
		$this->form_validation->set_rules('r_city', 'Recidencial City', 'trim|required');
		$this->form_validation->set_rules('r_zip', 'Recidencial Zip', 'trim|required');
		$this->form_validation->set_rules('r_office_contact1', 'Recidencial Contact 1', 'trim|required');
		$this->form_validation->set_rules('o_address1', 'Office Address 1', 'trim|required');
		$this->form_validation->set_rules('o_state', 'Office State', 'trim|required');
		$this->form_validation->set_rules('o_country', 'Office Country', 'trim|required');
		$this->form_validation->set_rules('o_city', 'Office City', 'trim|required');
		$this->form_validation->set_rules('o_zip', 'Office Zip', 'trim|required');
		$this->form_validation->set_rules('o_office_contact1', 'Office Contact 1', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"grpname_err" => form_error("grpname"),
				"reffered_by_err" => form_error("reffered_by"),
				"r_address1_err" => form_error("r_address1"),
				"r_state_err" => form_error("r_state"),
				"r_country_err" => form_error("r_country"),
				"r_city_err" => form_error("r_city"),
				"r_zip_err" => form_error("r_zip"),
				"r_office_contact1_err" => form_error("r_office_contact1"),
				"o_address1_err" => form_error("o_address1"),
				"o_state_err" => form_error("o_state"),
				"o_country_err" => form_error("o_country"),
				"o_city_err" => form_error("o_city"),
				"o_zip_err" => form_error("o_zip"),
				"o_office_contact1_err" => form_error("o_office_contact1"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			$post = $this->input->post();
			if (!empty($post)) {
				$contactp['contact_name'] = $post['contact_name'];
				$contactp['mobile'] = $post['mobile'];
				$contactp['whatsapp'] = $post['whatsapp'];
				$contactp['telegram'] = $post['telegram'];
				$contactp['contact_email'] = $post['contact_email'];

				$contact['grpname'] = $post['grpname'];
				$contact['reffered_by'] = $post['reffered_by'];
				$contact['contact_person'] = json_encode($contactp);
				$contact['r_address1'] = $post['r_address1'];
				$contact['r_address2'] = $post['r_address2'];
				$contact['r_address3'] = $post['r_address3'];
				$contact['r_state'] = $post['r_state'];
				$contact['r_country'] = $post['r_country'];
				$contact['r_city'] = $post['r_city'];
				$contact['r_zip'] = $post['r_zip'];
				$contact['r_office_contact1'] = $post['r_office_contact1'];
				$contact['r_office_contact2'] = $post['r_office_contact2'];
				$contact['officecheck'] = $post['officecheck'];
				$contact['o_address1'] = $post['o_address1'];
				$contact['o_address2'] = $post['o_address2'];
				$contact['o_address3'] = $post['o_address3'];
				$contact['o_state'] = $post['o_state'];
				$contact['o_country'] = $post['o_country'];
				$contact['o_city'] = $post['o_city'];
				$contact['o_zip'] = $post['o_zip'];
				$contact['o_office_contact1'] = $post['o_office_contact1'];
				$contact['o_office_contact2'] = $post['o_office_contact2'];

				$this->db->where('id', $post['update_id']);
				$this->db->update('customer_tbl', $contact);
			}

			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["customer_id"] = "";
				$validator["message"] = "Fatal Error: Contact Support:";
			} else {
				$validator["status"] = true;
				$validator["customer_id"] = $post['update_id'];
				$validator["message"] = "Client is Updated Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function member_details()
	{
		$this->data["title"] = $title = "Member";
		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Clients",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => $title,
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;
		$this->data['states']     		= getstates();
		$this->data['getRelation']     		= getRelation();
		$this->data['policy_section']     	= $this->getpolicy_question();
		$this->data['client_details']     	= $this->get_member();

		$this->data["main_page"] = "master/clients/member_details_p";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function add_member()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('contact', 'Contact', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');
		$this->form_validation->set_rules('relation', 'Relation', 'trim|required');
		$this->form_validation->set_rules('gender', 'Gender', 'trim|required');
		$this->form_validation->set_rules('dob', 'DOB', 'trim|required');
		$this->form_validation->set_rules('education', 'Education', 'trim|required');
		$this->form_validation->set_rules('proffession', 'Proffession', 'trim|required');
		$this->form_validation->set_rules('martial_status', 'Martial Status', 'trim|required');
		$this->form_validation->set_rules('annual_income', 'Annual Income', 'trim|required');
		$this->form_validation->set_rules('pan_number', 'Pan Number', 'trim|required');
		$this->form_validation->set_rules('aadhar_card', 'Aadhar Card', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"title_err" => form_error("title"),
				"name_err" => form_error("name"),
				"contact_err" => form_error("contact"),
				"email_err" => form_error("email"),
				"address_err" => form_error("address"),
				"relation_err" => form_error("relation"),
				"gender_err" => form_error("gender"),
				"dob_err" => form_error("dob"),
				"education_err" => form_error("education"),
				"proffession_err" => form_error("proffession"),
				"martial_status_err" => form_error("martial_status"),
				"annual_income_err" => form_error("annual_income"),
				"pan_number_err" => form_error("pan_number"),
				"aadhar_card_err" => form_error("aadhar_card"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			$post = $this->input->post();
			if (!empty($post)) {
				// print_r($_FILES["pan_image"]);
				// die();
				if (!empty($_FILES["pan_image"]["name"])) {
					$pan_image_data = $_FILES["pan_image"]["name"];

					$pan_image_img = $this->file_lib->file_upload($img_name = "pan_image", $directory_name = "./assets/member_doc/pan_image", $overwrite = False, $allowed_types = "jpg|Jpg|JPG|jpeg|Jpeg|JPEG|png|Png|PNG|pdf|Pdf|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string =  "pan_image", $url = "", $user_session_id = "_Policy_No_");

					if ($pan_image_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["pan_image_err"]  = $pan_image_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($pan_image_img["file_name"] != "") {
						$pan_image = $pan_image_img["file_name"];
						$pan_image_file_size = $pan_image_img["file_size"];
						$pan_image_file_type = $pan_image_img["file_type"];
					}
				} else {
					$pan_image = '';
				}

				if (!empty($_FILES["aadhar_image"]["name"])) {
					$aadhar_image_data = $_FILES["aadhar_image"]["name"];

					$aadhar_image_img = $this->file_lib->file_upload($img_name = "aadhar_image", $directory_name = "./assets/member_doc/aadhar_image", $overwrite = False, $allowed_types = "jpg|Jpg|JPG|jpeg|Jpeg|JPEG|png|Png|PNG|pdf|Pdf|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string =  "aadhar_image", $url = "", $user_session_id = "_Policy_No_");

					if ($aadhar_image_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["aadhar_image_err"]  = $aadhar_image_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($aadhar_image_img["file_name"] != "") {
						$aadhar_image = $aadhar_image_img["file_name"];
						$aadhar_image_file_size = $aadhar_image_img["file_size"];
						$aadhar_image_file_type = $aadhar_image_img["file_type"];
					}
				} else {
					$aadhar_image = '';
				}

				if (!empty($_FILES["passport_image"]["name"])) {
					$passport_image_data = $_FILES["passport_image"]["name"];

					$passport_image_img = $this->file_lib->file_upload($img_name = "passport_image", $directory_name = "./assets/member_doc/passport_image", $overwrite = False, $allowed_types = "jpg|Jpg|JPG|jpeg|Jpeg|JPEG|png|Png|PNG|pdf|Pdf|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string =  "passport_image", $url = "", $user_session_id = "_Policy_No_");

					if ($passport_image_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["passport_image_err"]  = $passport_image_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($passport_image_img["file_name"] != "") {
						$passport_image = $passport_image_img["file_name"];
						$passport_image_file_size = $passport_image_img["file_size"];
						$passport_image_file_type = $passport_image_img["file_type"];
					}
				} else {
					$passport_image = '';
				}

				if (!empty($_FILES["gst_image"]["name"])) {
					$gst_image_data = $_FILES["gst_image"]["name"];

					$gst_image_img = $this->file_lib->file_upload($img_name = "gst_image", $directory_name = "./assets/member_doc/gst_image", $overwrite = False, $allowed_types = "jpg|Jpg|JPG|jpeg|Jpeg|JPEG|png|Png|PNG|pdf|Pdf|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string =  "gst_image", $url = "", $user_session_id = "_Policy_No_");

					if ($gst_image_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["gst_image_err"]  = $gst_image_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($gst_image_img["file_name"] != "") {
						$gst_image = $gst_image_img["file_name"];
						$gst_image_file_size = $gst_image_img["file_size"];
						$gst_image_file_type = $gst_image_img["file_type"];
					}
				} else {
					$gst_image = '';
				}

				if (!empty($_FILES["birth_certificate"]["name"])) {
					$birth_certificate_data = $_FILES["birth_certificate"]["name"];

					$birth_certificate_img = $this->file_lib->file_upload($img_name = "birth_certificate", $directory_name = "./assets/member_doc/birth_certificate", $overwrite = False, $allowed_types = "jpg|Jpg|JPG|jpeg|Jpeg|JPEG|png|Png|PNG|pdf|Pdf|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string =  "birth_certificate", $url = "", $user_session_id = "_Policy_No_");

					if ($birth_certificate_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["birth_certificate_err"]  = $birth_certificate_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($birth_certificate_img["file_name"] != "") {
						$birth_certificate = $birth_certificate_img["file_name"];
						$birth_certificate_file_size = $birth_certificate_img["file_size"];
						$birth_certificate_file_type = $birth_certificate_img["file_type"];
					}
				} else {
					$birth_certificate = '';
				}

				if (!empty($_FILES["photo"]["name"])) {
					$photo_data = $_FILES["photo"]["name"];

					$photo_img = $this->file_lib->file_upload($img_name = "photo", $directory_name = "./assets/member_doc/photo", $overwrite = False, $allowed_types = "jpg|Jpg|JPG|jpeg|Jpeg|JPEG|png|Png|PNG|pdf|Pdf|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string =  "photo", $url = "", $user_session_id = "_Policy_No_");

					if ($photo_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["photo_err"]  = $photo_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($photo_img["file_name"] != "") {
						$photo = $photo_img["file_name"];
						$photo_file_size = $photo_img["file_size"];
						$photo_file_type = $photo_img["file_type"];
					}
				} else {
					$photo = '';
				}

				$customer_id = $post['customer_id'];
				$doc_img['pan_image'] = $pan_image;
				$doc_img['aadhar_image'] = $aadhar_image;
				$doc_img['passport_image'] = $passport_image;
				$doc_img['gst_image'] = $gst_image;
				$doc_img['birth_certificate'] = $birth_certificate;
				$doc_img['photo'] = $photo;

				$document = json_encode($doc_img);

				$member['customer_id'] = $customer_id;
				$member['document'] = $document;
				$member['contact'] = $post['contact'];
				$member['name'] = $post['name'];
				$member['middle_name'] = $post['middle_name'];
				$member['surname'] = $post['surname'];
				$member['email'] = $post['email'];
				$member['username'] = $post['email'] . '_2';
				$member['password'] = $this->randomPassword();
				$member['role_type'] = $post['role_type'];
				$member['address'] = $post['address'];
				$member['relation'] = $post['relation'];
				$member['title'] = $post['title'];
				$member['gender'] = $post['gender'];
				$dob = $post['dob'];
				$orderdate = explode('/', $dob);
				$month = $orderdate[0];
				$day   = $orderdate[1];
				$year  = $orderdate[2];
				$new_dob = $year . "-" . $month . "-" . $day;
				$member['dob'] = $new_dob;
				$member['education'] = $post['education'];
				$member['proffession'] = $post['proffession'];
				$member['martial_status'] = $post['martial_status'];
				$dom = $post['dom'];
				$orderdate1 = explode('/', $dom);
				$month = $orderdate1[0];
				$day   = $orderdate1[1];
				$year  = $orderdate1[2];
				$new_dom = $year . "-" . $month . "-" . $day;
				$member['dom'] = $new_dom;
				$member['annual_income'] = $post['annual_income'];
				$member['pan_number'] = $post['pan_number'];
				$member['aadhar_card'] = $post['aadhar_card'];
				$member['passport'] = $post['passport'];
				$member['gst_no'] = $post['gst_no'];
				$member['height'] = $post['height'];
				$member['weight'] = $post['weight'];
				$member['chest'] = $post['chest'];
				$member['abdomen'] = $post['abdomen'];
				$member['glasses'] = $post['glasses'];
				$member['current_health_status'] = $post['current_health_status'];

				$member['id'] = $this->id_incrementer_basedon_idss();
				// print_r($member);
				// die();
				$this->db->insert('customermem_tbl', $member);
				$member_id = $this->db->insert_id();

				$question_list['question_list'] = $post['question_list'];
				$question_list['live_or_travel'] = $post['live_or_travel'];
				$question_list['live_or_travel_remarks'] = $post['live_or_travel_remarks'];

				$policy_qst = json_encode($question_list);

				$policy_qst_ans['qst_and_ans'] = $policy_qst;
				$policy_qst_ans['customer_id'] = $customer_id;
				// $policy_qst_ans['member_id'] = $member_id;
				$policy_qst_ans['member_id'] = $member['id'];

				$this->db->insert('policy_question_ans', $policy_qst_ans);
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else {
				$validator["status"] = true;
				$validator["message"] = "Member is added Successfully.";
			}
		}
		echo json_encode($validator);
	}

	public function edit_member($id = NULL)
	{
		$this->data["c_id"] = $cid =  $id;

		// echo $this->data["c_id"]; exit;
		$this->data["title"] = $title = "Clients";
		$breadcrumbs[0] = array(
			"breadcrumb_label" => "Adminox",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[1] = array(
			"breadcrumb_label" => $title,
			// "breadcrumb_url" => base_url() . "clients",
			"breadcrumb_url" => "#",
			"breadcrumb_active" => false,
		);
		$breadcrumbs[2] = array(
			"breadcrumb_label" => "View " . $title,
			"breadcrumb_url" => "#",
			"breadcrumb_active" => true,
		);
		$this->data["breadcrumbs"] = $breadcrumbs;
		$this->data['states']     		= getstates();
		$this->data['getRelation']     		= getRelation();

		$this->data['policy_section']     	= $this->getpolicy_question();

		$this->data['client_details']     	= $this->get_single_member($id);

		$this->data["main_page"] = "master/clients/edit_member_p";
		$this->load->view($this->config->item("template_folder") . "layout/main_layout", $this->data);
	}

	public function update_member()
	{
		$validator = array('status' => false, 'messages' => array());
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('contact', 'Contact', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');
		$this->form_validation->set_rules('relation', 'Relation', 'trim|required');
		$this->form_validation->set_rules('gender', 'Gender', 'trim|required');
		$this->form_validation->set_rules('dob', 'DOB', 'trim|required');
		$this->form_validation->set_rules('education', 'Education', 'trim|required');
		$this->form_validation->set_rules('proffession', 'Proffession', 'trim|required');
		$this->form_validation->set_rules('martial_status', 'Martial Status', 'trim|required');
		$this->form_validation->set_rules('annual_income', 'Annual Income', 'trim|required');
		$this->form_validation->set_rules('pan_number', 'Pan Number', 'trim|required');
		$this->form_validation->set_rules('aadhar_card', 'Aadhar Card', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$validator["status"] = false;
			$validator["message"] = array(
				"title_err" => form_error("title"),
				"name_err" => form_error("name"),
				"contact_err" => form_error("contact"),
				"email_err" => form_error("email"),
				"address_err" => form_error("address"),
				"relation_err" => form_error("relation"),
				"gender_err" => form_error("gender"),
				"dob_err" => form_error("dob"),
				"education_err" => form_error("education"),
				"proffession_err" => form_error("proffession"),
				"martial_status_err" => form_error("martial_status"),
				"annual_income_err" => form_error("annual_income"),
				"pan_number_err" => form_error("pan_number"),
				"aadhar_card_err" => form_error("aadhar_card"),
			);
		} else {
			$this->db->trans_start();	//Start Transaction	
			$post = $this->input->post();
			if (!empty($post)) {
				// print_r($_FILES["pan_image"]);
				// die();

				if (!empty($_FILES["pan_image"]["name"])) {
					$pan_image_data = $_FILES["pan_image"]["name"];

					$pan_image_img = $this->file_lib->file_upload($img_name = "pan_image", $directory_name = "./assets/member_doc/pan_image", $overwrite = False, $allowed_types = "jpg|Jpg|JPG|jpeg|Jpeg|JPEG|png|Png|PNG|pdf|Pdf|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string =  "pan_image", $url = "", $user_session_id = "_Policy_No_");

					if ($pan_image_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["pan_image_err"]  = $pan_image_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($pan_image_img["file_name"] != "") {
						$pan_image = $pan_image_img["file_name"];
						$pan_image_file_size = $pan_image_img["file_size"];
						$pan_image_file_type = $pan_image_img["file_type"];
					}
				} else {
					if (!empty($post['old_pan_image']))
						$pan_image = $post['old_pan_image'];
					else
						$pan_image = "";
					// $pan_image = $post['old_pan_image'];
				}

				if (!empty($_FILES["aadhar_image"]["name"])) {
					$aadhar_image_data = $_FILES["aadhar_image"]["name"];

					$aadhar_image_img = $this->file_lib->file_upload($img_name = "aadhar_image", $directory_name = "./assets/member_doc/aadhar_image", $overwrite = False, $allowed_types = "jpg|Jpg|JPG|jpeg|Jpeg|JPEG|png|Png|PNG|pdf|Pdf|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string =  "aadhar_image", $url = "", $user_session_id = "_Policy_No_");

					if ($aadhar_image_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["aadhar_image_err"]  = $aadhar_image_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($aadhar_image_img["file_name"] != "") {
						$aadhar_image = $aadhar_image_img["file_name"];
						$aadhar_image_file_size = $aadhar_image_img["file_size"];
						$aadhar_image_file_type = $aadhar_image_img["file_type"];
					}
				} else {
					if (!empty($post['old_aadhar_image']))
						$aadhar_image = $post['old_aadhar_image'];
					else
						$aadhar_image = "";
					// $aadhar_image = $post['old_aadhar_image'];
				}

				if (!empty($_FILES["passport_image"]["name"])) {
					$passport_image_data = $_FILES["passport_image"]["name"];

					$passport_image_img = $this->file_lib->file_upload($img_name = "passport_image", $directory_name = "./assets/member_doc/passport_image", $overwrite = False, $allowed_types = "jpg|Jpg|JPG|jpeg|Jpeg|JPEG|png|Png|PNG|pdf|Pdf|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string =  "passport_image", $url = "", $user_session_id = "_Policy_No_");

					if ($passport_image_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["passport_image_err"]  = $passport_image_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($passport_image_img["file_name"] != "") {
						$passport_image = $passport_image_img["file_name"];
						$passport_image_file_size = $passport_image_img["file_size"];
						$passport_image_file_type = $passport_image_img["file_type"];
					}
				} else {
					if (!empty($post['old_passport_image']))
						$passport_image = $post['old_passport_image'];
					else
						$passport_image = "";
					// $passport_image = $post['old_passport_image'];
				}

				if (!empty($_FILES["gst_image"]["name"])) {
					$gst_image_data = $_FILES["gst_image"]["name"];

					$gst_image_img = $this->file_lib->file_upload($img_name = "gst_image", $directory_name = "./assets/member_doc/gst_image", $overwrite = False, $allowed_types = "jpg|Jpg|JPG|jpeg|Jpeg|JPEG|png|Png|PNG|pdf|Pdf|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string =  "gst_image", $url = "", $user_session_id = "_Policy_No_");

					if ($gst_image_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["gst_image_err"]  = $gst_image_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($gst_image_img["file_name"] != "") {
						$gst_image = $gst_image_img["file_name"];
						$gst_image_file_size = $gst_image_img["file_size"];
						$gst_image_file_type = $gst_image_img["file_type"];
					}
				} else {
					if (!empty($post['old_gst_image']))
						$gst_image = $post['old_gst_image'];
					else
						$gst_image = "";
				}

				if (!empty($_FILES["birth_certificate"]["name"])) {
					$birth_certificate_data = $_FILES["birth_certificate"]["name"];

					$birth_certificate_img = $this->file_lib->file_upload($img_name = "birth_certificate", $directory_name = "./assets/member_doc/birth_certificate", $overwrite = False, $allowed_types = "jpg|Jpg|JPG|jpeg|Jpeg|JPEG|png|Png|PNG|pdf|Pdf|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string =  "birth_certificate", $url = "", $user_session_id = "_Policy_No_");

					if ($birth_certificate_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["birth_certificate_err"]  = $birth_certificate_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($birth_certificate_img["file_name"] != "") {
						$birth_certificate = $birth_certificate_img["file_name"];
						$birth_certificate_file_size = $birth_certificate_img["file_size"];
						$birth_certificate_file_type = $birth_certificate_img["file_type"];
					}
				} else {
					if (!empty($post['old_birth_certificate']))
						$birth_certificate = $post['old_birth_certificate'];
					else
						$birth_certificate = "";
					// $birth_certificate = $post['old_birth_certificate'];
				}

				if (!empty($_FILES["photo"]["name"])) {
					$photo_data = $_FILES["photo"]["name"];

					$photo_img = $this->file_lib->file_upload($img_name = "photo", $directory_name = "./assets/member_doc/photo", $overwrite = False, $allowed_types = "jpg|Jpg|JPG|jpeg|Jpeg|JPEG|png|Png|PNG|pdf|Pdf|PDF", $max_size = "1024000", $max_width = "6000", $max_height = "6000", $remove_spaces = TRUE, $encrypt_name = False, $string =  "photo", $url = "", $user_session_id = "_Policy_No_");

					if ($photo_img["error"] != "") {
						$validator["status"] = false;
						$validator["messages"]["photo_err"]  = $photo_img["error"];
						echo json_encode($validator);
						die();
					} elseif ($photo_img["file_name"] != "") {
						$photo = $photo_img["file_name"];
						$photo_file_size = $photo_img["file_size"];
						$photo_file_type = $photo_img["file_type"];
					}
				} else {
					if (!empty($post['old_photo']))
						$photo = $post['old_photo'];
					else
						$photo = "";
					// $photo = $post['old_photo'];
				}

				$customer_id = $post['update_id'];
				$doc_img['pan_image'] = $pan_image;
				$doc_img['aadhar_image'] = $aadhar_image;
				$doc_img['passport_image'] = $passport_image;
				$doc_img['gst_image'] = $gst_image;
				$doc_img['birth_certificate'] = $birth_certificate;
				$doc_img['photo'] = $photo;

				$document = json_encode($doc_img);

				// $member['customer_id']=$customer_id;
				$member['document'] = $document;
				$member['contact'] = $post['contact'];
				$member['name'] = $post['name'];
				$member['middle_name'] = $post['middle_name'];
				$member['surname'] = $post['surname'];
				$member['email'] = $post['email'];
				$member['username'] = $post['email'] . '_2';
				$member['password'] = $this->randomPassword();
				$member['role_type'] = $post['role_type'];
				$member['address'] = $post['address'];
				$member['relation'] = $post['relation'];
				$member['title'] = $post['title'];
				$member['gender'] = $post['gender'];
				// $member['dob'] = $post['dob'];
				$dob = $post['dob'];
				$orderdate = explode('/', $dob);
				$month = $orderdate[0];
				$day   = $orderdate[1];
				$year  = $orderdate[2];
				$new_dob = $year . "-" . $month . "-" . $day;
				$member['dob'] = $new_dob;
				$member['education'] = $post['education'];
				$member['proffession'] = $post['proffession'];
				$member['martial_status'] = $post['martial_status'];
				// $member['dom'] = $post['dom'];
				$dom = $post['dom'];
				$orderdate1 = explode('/', $dom);
				$month = $orderdate1[0];
				$day   = $orderdate1[1];
				$year  = $orderdate1[2];
				$new_dom = $year . "-" . $month . "-" . $day;
				$member['dom'] = $new_dom;
				$member['annual_income'] = $post['annual_income'];
				$member['pan_number'] = $post['pan_number'];
				$member['aadhar_card'] = $post['aadhar_card'];
				$member['passport'] = $post['passport'];
				$member['gst_no'] = $post['gst_no'];
				$member['height'] = $post['height'];
				$member['weight'] = $post['weight'];
				$member['chest'] = $post['chest'];
				$member['abdomen'] = $post['abdomen'];
				$member['glasses'] = $post['glasses'];
				$member['current_health_status'] = $post['current_health_status'];

				// $this->db->insert('customermem_tbl', $member);

				$this->db->where('id', $post['cmid']);
				$this->db->update('customermem_tbl', $member);

				$question_list['question_list'] = $post['question_list'];
				$question_list['live_or_travel'] = $post['live_or_travel'];
				$question_list['live_or_travel_remarks'] = $post['live_or_travel_remarks'];
				// print_r($question_list);
				// die();
				$policy_qst = json_encode($question_list);

				$policy_qst_ans['qst_and_ans'] = $policy_qst;
				$policy_qst_ans['customer_id'] = $customer_id;

				// $this->db->insert('policy_question_ans', $policy_qst_ans);

				$this->db->where('qst_ans_id ', $post['qst_ans_id']);
				$this->db->update('policy_question_ans', $policy_qst_ans);
			}
			$this->db->trans_complete();		// Transaction End	

			if ($this->db->trans_status() === FALSE) {
				$validator["status"] = false;
				$validator["message"] = "Fatal Error: Contact Support:";
			} else {
				$validator["status"] = true;
				$validator["message"] = "Member is Updated Successfully.";
			}
		}
		echo json_encode($validator);
	}
	// new  Priyanshu Stop

	function id_incrementer_basedon_idss()
	{
		// SELECT MAX(CONVERT(id, SIGNED INTEGER)) + 1 as tp FROM customermem_tbl order by id desc;
		$maxid = $this->db->query('SELECT MAX(CONVERT(id, SIGNED INTEGER)) + 1 as id FROM customermem_tbl order by id desc')->row()->id;
		// print_r($maxid );
		// die();
		return $maxid;
	}

	public function updateMemberDetail()
	{


		$post = $this->input->post();


		if (!empty($post)) {
			$contactp['contact_name'] = $post['contact_name'];
			$contactp['mobile'] = $post['mobile'];
			$contactp['whatsapp'] = $post['whatsapp'];
			$contactp['telegram'] = $post['telegram'];
			$contactp['contact_email'] = $post['contact_email'];

			$contact['grpname'] = $post['grpname'];
			$contact['reffered_by'] = $post['reffered_by'];
			$contact['contact_person'] = json_encode($contactp);
			$contact['r_address1'] = $post['r_address1'];
			$contact['r_address2'] = $post['r_address2'];
			$contact['r_address3'] = $post['r_address3'];
			$contact['r_state'] = $post['r_state'];
			$contact['r_country'] = $post['r_country'];
			$contact['r_city'] = $post['r_city'];
			$contact['r_zip'] = $post['r_zip'];
			$contact['r_office_contact1'] = $post['r_office_contact1'];
			$contact['r_office_contact2'] = $post['r_office_contact2'];
			$contact['officecheck'] = $post['officecheck'];
			$contact['o_address1'] = $post['o_address1'];
			$contact['o_address2'] = $post['o_address2'];
			$contact['o_address3'] = $post['o_address3'];
			$contact['o_state'] = $post['o_state'];
			$contact['o_country'] = $post['o_country'];
			$contact['o_city'] = $post['o_city'];
			$contact['o_zip'] = $post['o_zip'];
			$contact['o_office_contact1'] = $post['o_office_contact1'];
			$contact['o_office_contact2'] = $post['o_office_contact2'];

			// $this->db->insert('customer_tbl', $contact);

			$this->db->where('id', $post['update_id']);
			$this->db->update('customer_tbl', $contact);




			echo json_encode(array('status' => true));
		} else {
			echo json_encode(array('status' => false));
		}
	}

	public function updateMDetail()
	{
		$post = $this->input->post();
		// print_r($post); exit;

		if (!empty($post)) {


			if (!empty($_FILES['pan_image']['name'])) {
				$config['upload_path'] = './assets/member_doc/pan_image';
				$config['allowed_types'] = 'jpg|jpeg|png|pdf';
				$config['file_name'] = 'pan_image_' . time();

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('pan_image')) {
					$uploadData = $this->upload->data();
					$pan_image = $uploadData['file_name'];
				} else {
					$pan_image = '';
				}
			} else {
				$pan_image = '';
			}

			if (empty($pan_image)) {

				$pan_image = $post['old_pan_image'];
			}

			if (!empty($_FILES['aadhar_image']['name'])) {
				$config['upload_path'] = './assets/member_doc/aadhar_image';
				$config['allowed_types'] = 'jpg|jpeg|png|pdf';
				$config['file_name'] = 'aadhar_image_' . time();

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('aadhar_image')) {
					$uploadData = $this->upload->data();
					$aadhar_image = $uploadData['file_name'];
				} else {
					$aadhar_image = '';
				}
			} else {
				$aadhar_image = '';
			}
			if (empty($aadhar_image)) {

				$aadhar_image = $post['old_aadhar_image'];
			}
			if (!empty($_FILES['passport_image']['name'])) {
				$config['upload_path'] = './assets/member_doc/passport_image';
				$config['allowed_types'] = 'jpg|jpeg|png|pdf';
				$config['file_name'] = 'passport_image_' . time();

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('passport_image')) {
					$uploadData = $this->upload->data();
					$passport_image = $uploadData['file_name'];
				} else {
					$passport_image = '';
				}
			} else {
				$passport_image = '';
			}

			if (empty($passport_image)) {

				$passport_image = $post['old_passport_image'];
			}

			if (!empty($_FILES['gst_image']['name'])) {
				$config['upload_path'] = './assets/member_doc/gst_image';
				$config['allowed_types'] = 'jpg|jpeg|png|pdf';
				$config['file_name'] = 'gst_image_' . time();

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('gst_image')) {
					$uploadData = $this->upload->data();
					$gst_image = $uploadData['file_name'];
				} else {
					$gst_image = '';
				}
			} else {
				$gst_image = '';
			}
			if (empty($gst_image)) {

				$gst_image = $post['old_gst_image'];
			}
			if (!empty($_FILES['birth_certificate']['name'])) {
				$config['upload_path'] = './assets/member_doc/birth_certificate';
				$config['allowed_types'] = 'jpg|jpeg|png|pdf';
				$config['file_name'] = 'birth_certificate_' . time();

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('birth_certificate')) {
					$uploadData = $this->upload->data();
					$birth_certificate = $uploadData['file_name'];
				} else {
					$birth_certificate = '';
				}
			} else {
				$birth_certificate = '';
			}

			if (empty($birth_certificate)) {

				$birth_certificate = $post['old_birth_certificate'];
			}

			if (!empty($_FILES['photo']['name'])) {
				$config['upload_path'] = './assets/member_doc/photo';
				$config['allowed_types'] = 'jpg|jpeg|png|pdf';
				$config['file_name'] = 'photo_' . time();

				//Load upload library and initialize configuration
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('photo')) {
					$uploadData = $this->upload->data();
					$photo = $uploadData['file_name'];
				} else {
					$photo = '';
				}
			} else {
				$photo = '';
			}

			if (empty($photo)) {

				$photo = $post['old_photo'];
			}

			$customer_id = $post['update_id'];
			$doc_img['pan_image'] = $pan_image;
			$doc_img['aadhar_image'] = $aadhar_image;
			$doc_img['passport_image'] = $passport_image;
			$doc_img['gst_image'] = $gst_image;
			$doc_img['birth_certificate'] = $birth_certificate;
			$doc_img['photo'] = $photo;


			$document = json_encode($doc_img);

			// $member['customer_id']=$customer_id;
			$member['document'] = $document;
			$member['contact'] = $post['contact'];
			$member['name'] = $post['name'];
			$member['middle_name'] = $post['middle_name'];
			$member['surname'] = $post['surname'];
			$member['email'] = $post['email'];
			$member['username'] = $post['email'] . '_2';
			$member['password'] = $this->randomPassword();
			$member['role_type'] = $post['role_type'];
			$member['address'] = $post['address'];
			$member['relation'] = $post['relation'];
			$member['title'] = $post['title'];
			$member['gender'] = $post['gender'];
			$member['dob'] = $post['dob'];
			$member['education'] = $post['education'];
			$member['proffession'] = $post['proffession'];
			$member['martial_status'] = $post['martial_status'];
			$member['dom'] = $post['dom'];
			$member['annual_income'] = $post['annual_income'];
			$member['pan_number'] = $post['pan_number'];
			$member['aadhar_card'] = $post['aadhar_card'];
			$member['passport'] = $post['passport'];
			$member['gst_no'] = $post['gst_no'];
			$member['height'] = $post['height'];
			$member['weight'] = $post['weight'];
			$member['chest'] = $post['chest'];
			$member['abdomen'] = $post['abdomen'];
			$member['glasses'] = $post['glasses'];
			$member['current_health_status'] = $post['current_health_status'];


			// $this->db->insert('customermem_tbl', $member);

			$this->db->where('id', $post['cmid']);
			$this->db->update('customermem_tbl', $member);

			$question_list['question_list'] = $post['question_list'];
			$question_list['live_or_travel'] = $post['live_or_travel'];
			$question_list['live_or_travel_remarks'] = $post['live_or_travel_remarks'];

			$policy_qst = json_encode($question_list);

			$policy_qst_ans['qst_and_ans'] = $policy_qst;
			$policy_qst_ans['customer_id'] = $customer_id;

			// $this->db->insert('policy_question_ans', $policy_qst_ans);

			$this->db->where('qst_ans_id ', $post['qst_ans_id']);
			$this->db->update('policy_question_ans', $policy_qst_ans);


			echo json_encode(array('status' => true));
		} else {
			echo json_encode(array('status' => false));
		}
	}

	function randomPassword()
	{
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}

	public function delete_member()
	{

		$post = $this->input->post();
		// print_r($post); exit;

		$del = array(

			"is_delete" => 1 //1:Running, 0:Deleted
		);

		if (!empty($post)) {

			$this->db->where('id', $post['id']);
			$this->db->update('customermem_tbl', $del);

			$this->db->where('member_id', $post['id']);
			$this->db->update('policy_question_ans', $del);

			echo json_encode(array('status' => true));
		} else {

			echo json_encode(array('status' => false));
		}
	}

	public function delete_customer()
	{

		$post = $this->input->post();
		if ($post['delete'] == 0) {
			$flg = 1;
		} else {
			$flg = 0;
		}
		$del = array(

			"c_is_delete" => $flg //1:Running, 0:Deleted
		);

		if (!empty($post)) {

			$this->db->where('id ', $post['id']);
			$this->db->update('customer_tbl', $del);

			echo json_encode(array('status' => true));
		} else {

			echo json_encode(array('status' => false));
		}
	}

	public function active_customer()
	{

		$post = $this->input->post();
		if ($post['status'] == 0) {
			$flg = 1;
		} else {
			$flg = 0;
		}
		$sts = array(

			"c_status" => $flg //1:Running, 0:Deleted
		);

		if (!empty($post)) {

			$this->db->where('id ', $post['id']);
			$this->db->update('customer_tbl', $sts);

			echo json_encode(array('status' => true));
		} else {

			echo json_encode(array('status' => false));
		}
	}

	public function remove_client()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"id" => $id,
				"c_is_delete" => 1, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["customer_tbl.id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "customer_tbl", $updateArr, $updateKey = "id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "customer_tbl", $colNames =  "customer_tbl.id, customer_tbl.c_status, customer_tbl.c_is_delete", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				// print_r($result);die();

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Client Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Removing Client.";
			}
			echo json_encode($result);
		}
	}

	public function recover_client()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$updateArr[] = array(
				"id" => $id,
				"c_is_delete" => 0, //1:Running, 0:Deleted
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["customer_tbl.id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "customer_tbl", $updateArr, $updateKey = "id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "customer_tbl", $colNames =  "customer_tbl.id, customer_tbl.c_status, customer_tbl.c_is_delete", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Client Remove Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update Client Status.";
			}
			echo json_encode($result);
		}
	}

	public function update_client_status()
	{
		if ($this->input->post() != "") {
			$id = $this->input->post("id");
			$status = $this->input->post("status");
			if ($status == 0) {
				$status = 1;
				$status_txt = "Active";
			} else {
				$status = 0;
				$status_txt = "In-Active";
			}
			$updateArr[] = array(
				"id" => $id,
				"c_status" => $status, //1:Active, 0:In-Active
				"fk_staff_id" => $this->session->userdata("@_staff_id"),
				"fk_user_role_id" => $this->session->userdata("@_user_role_id"),
			);
			if ($id != "") {
				$whereArr["customer_tbl.id"] = $id;
				$query = $this->Mquery_model_v3->updateBatchQuery($tableName = "customer_tbl", $updateArr, $updateKey = "id", $whereArr, $likeCondtnArr = array(), $whereInArray = array());

				$query = $this->Mquery_model_v3->getListRecordsQuery($tableName = "customer_tbl", $colNames =  "customer_tbl.id, customer_tbl.c_status, customer_tbl.c_is_delete", $whereArr, $whereInArray = array(), $customWhereArray = array(), $orWhereArray = array(), $orWhereDataArr = array(), $likeCondtnArr = array(), $joinArr = array(), $orderByArr = array(), $groupByArr = array(), $singleRow = True, $colActive = TRUE, $paginationArr = "");

				$result = $query["userData"];

				$result["status"] = true;
				$result["userdata"] = $result;
				$result["message"] = "Client " . $status_txt . " Successfully.";
			} else {
				$result["status"] = false;
				$result["userdata"] = array();
				$result["message"] = "Error Occured while Update Client Status.";
			}
			echo json_encode($result);
		}
	}
}
