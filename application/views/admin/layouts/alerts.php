<?php if ($this->session->flashdata('code') == 200) {
?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<b>Success! </b><?= $this->session->flashdata('message');?>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
<?php } else if ($this->session->flashdata('code') == 400) {
?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<b>Failed! </b><?= $this->session->flashdata('message');?>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>

<?php } ?>
