<div class="page-heading home-heading header-text">
	<div class="container">
	<div class="row">
		<div class="col-md-12">
		<div class="text-content">
			<h4>Find your best template in...</h4>
			<h2>Kudins Template</h2>
		</div>
		</div>
	</div>
	</div>
</div>

<div class="latest-products">
<div class="container">
<div class="row">
	<div class="col-md-12">
		<div class="section-heading">
			<h2>List Category</h2>
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

	<!-- <div class="filters-content"> -->
	<?php foreach ($category as $value) : ?>
		<div class="col-md-4">
			<div class="product-item">
				<a href="#"><img src="<?= base_url('images/category/') . $value->cover_image ?>" alt=""></a>
				<div class="down-content">
					<a href="<?= site_url('front/subcategory?id_category=') . $value->id_category ?>"><h4><?= $value->category;?></h4></a>
					<h6></h6>
					<p><?= substr($value->description, 0,50) . '...' ;?></p>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
	<!-- </div> -->
</div>
</div>
</div>
