<?php

if ( ! function_exists('admin_check_session'))
{
	function admin_check_session()
	{
		$ci = &get_instance();
		
		if ($ci->session->userdata("sess_admin_kudins_template") == null) {
			$ci->etc->showMessage(400, "You haven't submit login form yet");
			redirect(site_url('admin/Login'));
		}
	}
}
?>
