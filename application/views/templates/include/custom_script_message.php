<script type="text/javascript">
	
	$(document).ready(function() {

		var success_msg = "<?php echo $this->session->flashdata('msg'); ?>";
		var error_msg = "<?php echo $this->session->flashdata('errmsg'); ?>";
		var warning_msg = "<?php echo $this->session->flashdata('warning_msg'); ?>";
		var info_msg = "<?php echo $this->session->flashdata('info_msg'); ?>";
		// alert(success_msg);
		
		if(success_msg != "")
		toaster(message_type = "Success", message_txt = success_msg, message_icone = "success")
			
		else if(error_msg != "")
		toaster(message_type = "Error", message_txt = error_msg, message_icone = "error")
		
		else if(warning_msg != "")
		toaster(message_type = "Warning", message_txt = warning_msg, message_icone = "warning")
			
		else if(info_msg != "")
		toaster(message_type = "Info", message_txt = info_msg, message_icone = "info")
	});	
	
</script>
