<?php

	$profile_data = $this->session->userdata("sess_front_kudins_template");
?>

<div class="page-heading home-heading header-text">
	<div class="container">
	<div class="row">
		<div class="col-md-12">
		<div class="text-content">
			<!-- <h4>Find your best template in...</h4> -->
			<h2>My Profile</h2>
		</div>
		</div>
	</div>
	</div>
</div>

<div class="send-message">
	<div class="container">
	<div class="row">
		<div class="col-md-12">
		<div class="section-heading">
			<h2>My Profile</h2>
		</div>
		</div>
		<div class="col-md-8">
		<img src="<?= base_url('assets/front/images/bg-auth.png') ?>" height="350">
		</div>
		<div class="col-md-4">
		<h3 class="d-flex flex-row"><?= $profile_data['name']?></h3>
		<p>
			Email : <?= $profile_data['email'] ;?>
		</p>
		<br>
		<a href="<?= site_url('front/Auth/logout')?>" class="btn btn-danger btn-block"><i class="fa fa-reply"></i> Logout</a>
		</div>
	</div>
	</div>
</div>

<div class="latest-products">
<div class="container">
<div class="row">
	<div class="col-md-12">
		<div class="section-heading">
			<h2>My Collections</h2>
			<!-- <a href="products.html"> View All Templates <i class="fa fa-angle-right"></i></a> -->
		</div>
	</div>
	<!-- <div class="col-md-12">
	<div class="filters">
		<ul>
			<li class="active" data-filter="*">All Products</li>
			<li data-filter=".des">Featured</li>
			<li data-filter=".dev">Flash Deals</li>
			<li data-filter=".gra">Last Minute</li>
		</ul>
	</div>
	</div> -->

	<?php
		$style = "
			position: absolute;
			right: 0px;
			margin-right:18px;
			-webkit-border-radius: 30px;
			-moz-border-radius: 30px;
			border-radius: 30px;

		";
	?>
	<!-- <div class="filters-content"> -->
	<?php foreach ($collection as $value) : ?>
		<div class="col-md-4">
				<div class="product-item">
					<a href="<?= site_url('front/Collections/remove_collection?id_template=') . $value->id_template ?>" style="<?= $style ?>" onclick="return confirm('Do you want remove this template from your collection?')" class="btn btn-light btn-floating rounded-5">
					<h5>X</h5>
					</a>
					<a href="<?= site_url('front/DetailTemplate?id_template=') . $value->id_template ?>"><img src="<?= base_url('images/template/') . $value->image ?>" alt=""></a>
					<div class="down-content">
						<a href="<?= site_url('front/DetailTemplate?id_template=') . $value->id_template ?>"><h4><?= $value->name;?></h4></a>
						<h6></h6>
						
					</div>

					
				</div>
				
		</div>
	<?php endforeach; ?>
	<!-- </div> -->
</div>
</div>
</div>
