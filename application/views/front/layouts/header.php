<header class="">
	<nav class="navbar navbar-expand-lg">
	<div class="container">
		<a class="navbar-brand" href="<?= site_url('front/Home')?>"><h2>Kudins <em>Template</em></h2></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item <?= ($item_sidenav_active == 'Home') ? 'active' : ''?>">
				<a class="nav-link" href="<?= site_url('front/Home')?>">Home
				</a>
			</li> 
			<li class="nav-item <?= ($item_sidenav_active == 'Category') ? 'active' : ''?>">
				<a class="nav-link" href="<?= site_url('front/Category')?>">Category</a>
			</li>
			<li class="nav-item">
				<?php
					if ($this->session->userdata('sess_front_kudins_template') != null) {
				?>
				<a class="nav-link btn-primary" href="<?= site_url('front/Profile')?>"><?= $this->session->userdata('sess_front_kudins_template')['name'];?></a>
				<?php }else{?>
				<a class="nav-link btn-primary" href="<?= site_url('front/Auth')?>">Login</a>
				<?php } ?>
			</li>
		</ul>
		</div>
	</div>
	</nav>
</header>
