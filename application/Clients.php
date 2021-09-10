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
		$this->data["css_plugins"] = array("data_table", "toaster", "sweet_alert", "select2");
		$this->data["js_plugins"] = array("data_table", "toaster", "sweet_alert", "select2");
		$this->data["base_url"] = $this->config->item("base_url");
		$this->data["top_bar"] = $this->config->item("template_folder") . "include/top_bar";
		$this->data["nav_bar"] = $this->config->item("template_folder") . "include/nav_bar";
		$this->data["right_sidebar"] = $this->config->item("template_folder") . "include/right_sidebar";

		
	}
	


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
		$this->data["c_id"]= $cid =  $id;

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

	public function get_member() {
		$cust_id = $this->uri->segment(3);
		
        $this->db->select('*');
		$this->db->from(' customermem_tbl');
		$this->db->where('customer_id',$cust_id);
		$this->db->where('is_delete',0);

		$i = $this->db->get();
		$result =  $i->result_array();

		return $result;

	}
	public function getpolicy_question(){
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
		$this->data["c_id"]= $cid =  $this->uri->segment(3);

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


	public function edit_client()
	{
		$this->data["c_id"]= $cid =  $this->uri->segment(3);

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


	public function edit_member($id=NULL)
	{
		$this->data["c_id"]= $cid =  $id;

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


	public function get_single_member($cid) {
        $this->db->select('cm.*,pqa.*,cm.id as cmid,pqa.qst_ans_id as pqaid');
		$this->db->from('customermem_tbl cm');
		$this->db->join('policy_question_ans pqa', 'cm.id = pqa.member_id', 'left');
		$this->db->where('cm.id',$cid);
		$this->db->where('cm.is_delete',0);

		$i = $this->db->get();
		$result =  $i->result_array();

		return $result;

    }


	public function get_client_details($cid) {
        $this->db->select('c.*,c.id as custid,cm.*,cm.id as cmid,pqa.*,pqa.qst_ans_id as pqaid');
		$this->db->from(' customer_tbl c');
		$this->db->join('customermem_tbl cm', 'c.id = cm.customer_id', 'left');
		$this->db->join('policy_question_ans pqa', 'c.id = pqa.customer_id', 'left');
		$this->db->where('c.id',$cid);

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


	public function getmDetails() {
		$post = $this->input->post();
        $this->db->select('cm.*,pqa.*,cm.id as cmid,pqa.qst_ans_id as pqaid');
		$this->db->from('customermem_tbl cm');
		$this->db->join('policy_question_ans pqa', 'cm.id = pqa.member_id', 'left');
		$this->db->where('cm.id',$post['id']);
		$this->db->where('cm.is_delete',0);

		$i = $this->db->get();
		$result =  $i->result_array();

		
		if(!empty($result)){
			echo json_encode(array('status'=>true,'data'=>$result));

		}
		else{
			echo json_encode(array('status'=>false));
		}
       
       
    }


	public function getClient() {
		
		$post = $this->input->post();
        $this->db->select('*');
		$this->db->from('customer_tbl');
		// $this->db->join('customermem_tbl cm', 'c.id = cm.customer_id', 'left');
		// $this->db->join('policy_question_ans pqa', 'c.id = pqa.customer_id', 'left');
		$this->db->where('id',$post['id']);

		$i = $this->db->get();
		$result =  $i->result_array();

		
		if(!empty($result)){
			echo json_encode(array('status'=>true,'data'=>$result));

		}
		else{
			echo json_encode(array('status'=>false));
		}
       
       
    }

	public function get_client_list() {
		
		// print_r($this->session->userdata());
		// echo $this->session->userdata('@_client_id');
		// exit;
		$c_id = $this->session->userdata('@_client_id');
		if(!empty($c_id)){

			$this->db->select('*');
			$this->db->from(' customer_tbl');
			// $this->db->join('customermem_tbl cm', 'c.id = cm.customer_id', 'left');
			// $this->db->join('policy_question_ans pqa', 'c.id = pqa.customer_id', 'left');
			$this->db->where('c_is_delete',0);
			$this->db->where('id',$c_id);
	
			$i = $this->db->get();
			$result =  $i->result_array();
		}
		else{
			$this->db->select('*');
			$this->db->from(' customer_tbl');
			// $this->db->join('customermem_tbl cm', 'c.id = cm.customer_id', 'left');
			// $this->db->join('policy_question_ans pqa', 'c.id = pqa.customer_id', 'left');
			$this->db->where('c_is_delete',0);
			// $this->db->where('id',$c_id);
	
			$i = $this->db->get();
			$result =  $i->result_array();
		}
        

		if(!empty($result)){
			echo json_encode(array('status'=>true,'data'=>$result));

		}
		else{
			echo json_encode(array('status'=>true));
		}
       
       
    }

    public function saveClientDetails(){

	$post = $this->input->post();

	
    if(!empty($post)){
	$contactp['contact_name']=$post['contact_name'];
	$contactp['mobile']=$post['mobile'];
	$contactp['whatsapp']=$post['whatsapp'];
	$contactp['telegram']=$post['telegram'];
	$contactp['contact_email']=$post['contact_email'];

	$contact['grpname']=$post['grpname'];
	$contact['reffered_by']=$post['reffered_by'];
	$contact['contact_person']=json_encode($contactp);
	$contact['r_address1']=$post['r_address1'];
	$contact['r_address2']=$post['r_address2'];
	$contact['r_address3']=$post['r_address3'];
	$contact['r_state']=$post['r_state'];
	$contact['r_country']=$post['r_country'];
	$contact['r_city']=$post['r_city'];
	$contact['r_zip']=$post['r_zip'];
	$contact['r_office_contact1']=$post['r_office_contact1'];
	$contact['r_office_contact2']=$post['r_office_contact2'];
	$contact['officecheck']=$post['officecheck'];
	$contact['o_address1']=$post['o_address1'];
	$contact['o_address2']=$post['o_address2'];
	$contact['o_address3']=$post['o_address3'];
	$contact['o_state']=$post['o_state'];
	$contact['o_country']=$post['o_country'];
	$contact['o_city']=$post['o_city'];
	$contact['o_zip']=$post['o_zip'];
	$contact['o_office_contact1']=$post['o_office_contact1'];
	$contact['o_office_contact2']=$post['o_office_contact2'];
	
	$this->db->insert('customer_tbl', $contact);
	$customer_id = $this->db->insert_id();
	
	
	echo json_encode(array('status'=>true,'id'=>$customer_id));
}
else{
	echo json_encode(array('status'=>false));

	}

}


public function saveMember(){

	$post = $this->input->post();

	$customer_id = $post['customer_id'];
	// echo $customer_id; exit;
	// print_r($post); exit;
    if(!empty($post)){
	
	
	
	if(!empty($_FILES['pan_image']['name'])){
        $config['upload_path'] = './assets/member_doc/pan_image';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['file_name'] = 'pan_image_'.time();
        
        //Load upload library and initialize configuration
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        
        if($this->upload->do_upload('pan_image')){
            $uploadData = $this->upload->data();
            $pan_image = $uploadData['file_name'];
        }else{
            $pan_image = '';
        }
    }else{
        $pan_image = '';
    }

	if(!empty($_FILES['aadhar_image']['name'])){
        $config['upload_path'] = './assets/member_doc/aadhar_image';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['file_name'] = 'aadhar_image_'.time();
        
        //Load upload library and initialize configuration
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        
        if($this->upload->do_upload('aadhar_image')){
            $uploadData = $this->upload->data();
            $aadhar_image = $uploadData['file_name'];
        }else{
            $aadhar_image = '';
        }
    }else{
        $aadhar_image = '';
    }

	if(!empty($_FILES['passport_image']['name'])){
        $config['upload_path'] = './assets/member_doc/passport_image';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['file_name'] = 'passport_image_'.time();
        
        //Load upload library and initialize configuration
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        
        if($this->upload->do_upload('passport_image')){
            $uploadData = $this->upload->data();
            $passport_image = $uploadData['file_name'];
        }else{
            $passport_image = '';
        }
    }else{
        $passport_image = '';
    }

	if(!empty($_FILES['gst_image']['name'])){
        $config['upload_path'] = './assets/member_doc/gst_image';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['file_name'] = 'gst_image_'.time();
        
        //Load upload library and initialize configuration
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        
        if($this->upload->do_upload('gst_image')){
            $uploadData = $this->upload->data();
            $gst_image = $uploadData['file_name'];
        }else{
            $gst_image = '';
        }
    }else{
        $gst_image = '';
    }

	if(!empty($_FILES['birth_certificate']['name'])){
        $config['upload_path'] = './assets/member_doc/birth_certificate';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['file_name'] = 'birth_certificate_'.time();
        
        //Load upload library and initialize configuration
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        
        if($this->upload->do_upload('birth_certificate')){
            $uploadData = $this->upload->data();
            $birth_certificate = $uploadData['file_name'];
        }else{
            $birth_certificate = '';
        }
    }else{
        $birth_certificate = '';
    }

	if(!empty($_FILES['photo']['name'])){
        $config['upload_path'] = './assets/member_doc/photo';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['file_name'] = 'photo_'.time();
        
        //Load upload library and initialize configuration
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        
        if($this->upload->do_upload('photo')){
            $uploadData = $this->upload->data();
            $photo = $uploadData['file_name'];
        }else{
            $photo = '';
        }
    }else{
        $photo = '';
    }
	
	$doc_img['pan_image']=$pan_image;
	$doc_img['aadhar_image']=$aadhar_image;
	$doc_img['passport_image']=$passport_image;
	$doc_img['gst_image']=$gst_image;
	$doc_img['birth_certificate']=$birth_certificate;
	$doc_img['photo']=$photo;


	$document = json_encode($doc_img);

	$member['customer_id']=$customer_id;
	$member['document']=$document;
	$member['contact']=$post['contact'];
	$member['name']=$post['name'];
	$member['middle_name']=$post['middle_name'];
	$member['surname']=$post['surname'];
	$member['email']=$post['email'];
	$member['username']=$post['email'].'_2';
	$member['password']=$this->randomPassword();
	$member['role_type']=$post['role_type'];
	$member['address']=$post['address'];
	$member['relation']=$post['relation'];
	$member['title']=$post['title'];
	$member['gender']=$post['gender'];
	$member['dob']=$post['dob'];
	$member['education']=$post['education'];
	$member['proffession']=$post['proffession'];
	$member['martial_status']=$post['martial_status'];
	$member['dom']=$post['dom'];
	$member['annual_income']=$post['annual_income'];
	$member['pan_number']=$post['pan_number'];
	$member['aadhar_card']=$post['aadhar_card'];
	$member['passport']=$post['passport'];
	$member['gst_no']=$post['gst_no'];
	$member['height']=$post['height'];
	$member['weight']=$post['weight'];
	$member['chest']=$post['chest'];
	$member['abdomen']=$post['abdomen'];
	$member['glasses']=$post['glasses'];
	$member['current_health_status']=$post['current_health_status'];


	$this->db->insert('customermem_tbl', $member);
	$member_id = $this->db->insert_id();

	$question_list['question_list']=$post['question_list'];
	$question_list['live_or_travel']=$post['live_or_travel'];
	$question_list['live_or_travel_remarks']=$post['live_or_travel_remarks'];

	$policy_qst = json_encode($question_list);
	
	$policy_qst_ans['qst_and_ans'] = $policy_qst;
	$policy_qst_ans['customer_id'] = $customer_id;
	$policy_qst_ans['member_id'] = $member_id;
	
	$this->db->insert('policy_question_ans', $policy_qst_ans);
	

	echo json_encode(array('status'=>true));
}
else{
	echo json_encode(array('status'=>false));

	}

}


public function updateMemberDetail(){

	
	$post = $this->input->post();

	
    if(!empty($post)){
    $contactp['contact_name']=$post['contact_name'];
    $contactp['mobile']=$post['mobile'];
    $contactp['whatsapp']=$post['whatsapp'];
    $contactp['telegram']=$post['telegram'];
    $contactp['contact_email']=$post['contact_email'];

	$contact['grpname']=$post['grpname'];
	$contact['reffered_by']=$post['reffered_by'];
	$contact['contact_person']=json_encode($contactp);
	$contact['r_address1']=$post['r_address1'];
	$contact['r_address2']=$post['r_address2'];
	$contact['r_address3']=$post['r_address3'];
	$contact['r_state']=$post['r_state'];
	$contact['r_country']=$post['r_country'];
	$contact['r_city']=$post['r_city'];
	$contact['r_zip']=$post['r_zip'];
	$contact['r_office_contact1']=$post['r_office_contact1'];
	$contact['r_office_contact2']=$post['r_office_contact2'];
	$contact['officecheck']=$post['officecheck'];
	$contact['o_address1']=$post['o_address1'];
	$contact['o_address2']=$post['o_address2'];
	$contact['o_address3']=$post['o_address3'];
	$contact['o_state']=$post['o_state'];
	$contact['o_country']=$post['o_country'];
	$contact['o_city']=$post['o_city'];
	$contact['o_zip']=$post['o_zip'];
	$contact['o_office_contact1']=$post['o_office_contact1'];
	$contact['o_office_contact2']=$post['o_office_contact2'];
	
	// $this->db->insert('customer_tbl', $contact);

	$this->db->where('id', $post['update_id']);
    $this->db->update('customer_tbl', $contact);
	
	
	

	echo json_encode(array('status'=>true));
	}
	else{
		echo json_encode(array('status'=>false));

		}

}

public function updateMDetail(){

	
	$post = $this->input->post();
    // print_r($post); exit;
	
    if(!empty($post)){
   
	
	if(!empty($_FILES['pan_image']['name'])){
        $config['upload_path'] = './assets/member_doc/pan_image';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['file_name'] = 'pan_image_'.time();
        
        //Load upload library and initialize configuration
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        
        if($this->upload->do_upload('pan_image')){
            $uploadData = $this->upload->data();
            $pan_image = $uploadData['file_name'];
        }else{
            $pan_image = '';
        }
    }else{
        $pan_image = '';
    }
	
	if(empty($pan_image)){

		$pan_image = $post['old_pan_image'];
	}

	if(!empty($_FILES['aadhar_image']['name'])){
        $config['upload_path'] = './assets/member_doc/aadhar_image';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['file_name'] = 'aadhar_image_'.time();
        
        //Load upload library and initialize configuration
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        
        if($this->upload->do_upload('aadhar_image')){
            $uploadData = $this->upload->data();
            $aadhar_image = $uploadData['file_name'];
        }else{
            $aadhar_image = '';
        }
    }else{
        $aadhar_image = '';
    }
	if(empty($aadhar_image)){

		$aadhar_image = $post['old_aadhar_image'];
	}
	if(!empty($_FILES['passport_image']['name'])){
        $config['upload_path'] = './assets/member_doc/passport_image';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['file_name'] = 'passport_image_'.time();
        
        //Load upload library and initialize configuration
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        
        if($this->upload->do_upload('passport_image')){
            $uploadData = $this->upload->data();
            $passport_image = $uploadData['file_name'];
        }else{
            $passport_image = '';
        }
    }else{
        $passport_image = '';
    }

	if(empty($passport_image)){

		$passport_image = $post['old_passport_image'];
	}

	if(!empty($_FILES['gst_image']['name'])){
        $config['upload_path'] = './assets/member_doc/gst_image';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['file_name'] = 'gst_image_'.time();
        
        //Load upload library and initialize configuration
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        
        if($this->upload->do_upload('gst_image')){
            $uploadData = $this->upload->data();
            $gst_image = $uploadData['file_name'];
        }else{
            $gst_image = '';
        }
    }else{
        $gst_image = '';
    }
	if(empty($gst_image)){

		$gst_image = $post['old_gst_image'];
	}
	if(!empty($_FILES['birth_certificate']['name'])){
        $config['upload_path'] = './assets/member_doc/birth_certificate';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['file_name'] = 'birth_certificate_'.time();
        
        //Load upload library and initialize configuration
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        
        if($this->upload->do_upload('birth_certificate')){
            $uploadData = $this->upload->data();
            $birth_certificate = $uploadData['file_name'];
        }else{
            $birth_certificate = '';
        }
    }else{
        $birth_certificate = '';
    }

	if(empty($birth_certificate)){

		$birth_certificate = $post['old_birth_certificate'];
	}

	if(!empty($_FILES['photo']['name'])){
        $config['upload_path'] = './assets/member_doc/photo';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['file_name'] = 'photo_'.time();
        
        //Load upload library and initialize configuration
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        
        if($this->upload->do_upload('photo')){
            $uploadData = $this->upload->data();
            $photo = $uploadData['file_name'];
        }else{
            $photo = '';
        }
    }else{
        $photo = '';
    }

	if(empty($photo)){

		$photo = $post['old_photo'];
	}

	$customer_id = $post['update_id'];
	$doc_img['pan_image']=$pan_image;
	$doc_img['aadhar_image']=$aadhar_image;
	$doc_img['passport_image']=$passport_image;
	$doc_img['gst_image']=$gst_image;
	$doc_img['birth_certificate']=$birth_certificate;
	$doc_img['photo']=$photo;


	$document = json_encode($doc_img);

	// $member['customer_id']=$customer_id;
	$member['document']=$document;
	$member['contact']=$post['contact'];
	$member['name']=$post['name'];
	$member['middle_name']=$post['middle_name'];
	$member['surname']=$post['surname'];
	$member['email']=$post['email'];
	$member['username']=$post['email'].'_2';
	$member['password']=$this->randomPassword();
	$member['role_type']=$post['role_type'];
	$member['address']=$post['address'];
	$member['relation']=$post['relation'];
	$member['title']=$post['title'];
	$member['gender']=$post['gender'];
	$member['dob']=$post['dob'];
	$member['education']=$post['education'];
	$member['proffession']=$post['proffession'];
	$member['martial_status']=$post['martial_status'];
	$member['dom']=$post['dom'];
	$member['annual_income']=$post['annual_income'];
	$member['pan_number']=$post['pan_number'];
	$member['aadhar_card']=$post['aadhar_card'];
	$member['passport']=$post['passport'];
	$member['gst_no']=$post['gst_no'];
	$member['height']=$post['height'];
	$member['weight']=$post['weight'];
	$member['chest']=$post['chest'];
	$member['abdomen']=$post['abdomen'];
	$member['glasses']=$post['glasses'];
	$member['current_health_status']=$post['current_health_status'];


	// $this->db->insert('customermem_tbl', $member);

	$this->db->where('id', $post['cmid']);
    $this->db->update('customermem_tbl', $member);

	$question_list['question_list']=$post['question_list'];
	$question_list['live_or_travel']=$post['live_or_travel'];
	$question_list['live_or_travel_remarks']=$post['live_or_travel_remarks'];

	$policy_qst = json_encode($question_list);
	
	$policy_qst_ans['qst_and_ans'] = $policy_qst;
	$policy_qst_ans['customer_id'] = $customer_id;
	
	// $this->db->insert('policy_question_ans', $policy_qst_ans);

	$this->db->where('qst_ans_id ', $post['qst_ans_id']);
    $this->db->update('policy_question_ans', $policy_qst_ans);
	

	echo json_encode(array('status'=>true));
	}
	else{
		echo json_encode(array('status'=>false));

		}

}


function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

public function delete_member() {
	
	$post = $this->input->post();
	// print_r($post); exit;
	
	$del = array(
		
		"is_delete" => 1//1:Running, 0:Deleted
	);

	if(!empty($post)){

	$this->db->where('id', $post['id']);
    $this->db->update('customermem_tbl', $del);

	$this->db->where('member_id', $post['id']);
    $this->db->update('policy_question_ans', $del);

	echo json_encode(array('status'=>true));
    }
	else{
	
		echo json_encode(array('status'=>false));

	}
	
}

public function delete_customer() {
	
	$post = $this->input->post();
	if($post['delete']==0){
       $flg = 1;
	}
	else{
		$flg = 0;
	}
	$del = array(
		
		"c_is_delete" => $flg//1:Running, 0:Deleted
	);

	if(!empty($post)){

	$this->db->where('id ', $post['id']);
    $this->db->update('customer_tbl', $del);

	echo json_encode(array('status'=>true));
    }
	else{
	
		echo json_encode(array('status'=>false));

	}
	
}


public function active_customer() {
	
	$post = $this->input->post();
	if($post['status']==0){
       $flg = 1;
	}
	else{
		$flg = 0;
	}
	$sts = array(
		
		"c_status" => $flg//1:Running, 0:Deleted
	);

	if(!empty($post)){

	$this->db->where('id ', $post['id']);
    $this->db->update('customer_tbl', $sts);

	echo json_encode(array('status'=>true));
    }
	else{
	
		echo json_encode(array('status'=>false));

	}
	
}


}
