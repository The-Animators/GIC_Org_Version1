<script type="text/javascript">
	
	$(document).ready(function() {

		var success_msg = "<?php echo $this->session->flashdata('msg'); ?>";
		var error_msg = "<?php echo $this->session->flashdata('errmsg'); ?>";
		var img_error_msg = "<?php echo $this->session->flashdata('error'); ?>";
		var warning_msg = "<?php echo $this->session->flashdata('warning_msg'); ?>";
		var warning1_msg = "<?php echo $this->session->flashdata('warning1'); ?>";
		var warning2_msg = "<?php echo $this->session->flashdata('warning2'); ?>";
		var info_msg = "<?php echo $this->session->flashdata('info_msg'); ?>";
		//~ alert(img_error_msg);
		
		if(success_msg != "")
			toast_notification_msg_type(type = "success", success_msg);
			
		else if(error_msg != "")
			toast_notification_msg_type(type = "error", error_msg);
			
		else if(img_error_msg != "")
			toast_notification_msg_type(type = "img_error", img_error_msg);
			
		else if(warning_msg != "")
			toast_notification_msg_type(type = "warning", warning_msg);
			 
		else if(warning1_msg != "")
			toast_notification_msg_type(type = "warning", warning1_msg);
			
		else if(warning2_msg != "")
			toast_notification_msg_type(type = "warning", warning2_msg);
			
		else if(info_msg != "")
			toast_notification_msg_type(type = "info", info_msg);
	});	
	
</script>
