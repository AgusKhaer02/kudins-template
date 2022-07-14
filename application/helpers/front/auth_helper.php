<?php

if ( ! function_exists('front_check_session'))
{
	function front_check_session()
	{
		$ci = &get_instance();
		
		if ($ci->session->userdata("sess_front_kudins_template") == null) {
			$ci->etc->showMessage(400, "Login to proceed this action!");
			redirect(site_url('front/Auth'));
		}
	}
}
?>
