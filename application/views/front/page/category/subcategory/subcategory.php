<div class="page-heading home-heading header-text">
	<div class="container">
	<div class="row">
		<div class="col-md-12">
		<div class="text-content">
			
			<h2><?=$category_name;?></h2>
			<span><?= $category_desc ;?></span>
		</div>
		</div>
	</div>
	</div>
</div>

<!-- <div class="happy-clients">
	<div class="container">
	<div class="row">
		<div class="col-md-12">
		<div class="section-heading">
			<h2>Subcategory</h2>
		</div>
		</div>
		<div class="col-md-12">
		<div class="owl-clients owl-carousel owl-loaded owl-drag"> -->
			
		<!-- <div class="owl-stage-outer">
			<div class="owl-stage" style="transform: translate3d(-1140px, 0px, 0px); transition: all 0s ease 0s; width: 3648px;">
			<?php foreach ($subcategory as $value) : ?> -->
			<!-- cloned #1 -->
				<!-- <div class="owl-item cloned" style="width: 198px; margin-right: 30px;">
					<div class="client-item">
						<img src="<?= base_url('images/category/subcategory/') . $value->cover_image?>" alt="<?= $value->cover_image?>">
					</div>
				</div> -->
			<!-- <?php endforeach; ?> -->

			<!-- </div> -->
		<!-- </div> -->
		<!-- <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div><div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button role="button" class="owl-dot"><span></span></button></div></div> -->
		<!-- </div> -->
	<!-- </div> -->
	<!-- </div> -->
<!-- </div> -->

<div class="latest-products">
<div class="container">
<div class="row">
	<div class="col-md-12">
		<div class="section-heading">
			<h2>List Subcategory</h2>
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
	<?php foreach ($subcategory as $value) : ?>
		<div class="col-md-4">
			<div class="product-item">
				<a href="#"><img src="<?= base_url('images/category/subcategory/') . $value->cover_image ?>" alt=""></a>
				<div class="down-content">
					<a href="<?= site_url('front/ListTemplate?id_subcategory=') . $value->id_subcategory ?>"><h4><?= $value->subcategory;?></h4></a>
					<h6></h6>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
	<!-- </div> -->
</div>
</div>
</div>

<div class="latest-products">
<div class="container">
<div class="row">
	<div class="col-md-12">
		<div class="section-heading">
			<h2>Categories on <?= $category_name ;?></h2>
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
	<?php foreach ($product_by_category as $value) : ?>
	<div class="col-md-4">
			<div class="product-item">
				<a href="<?= site_url('front/DetailTemplate?id_template=') . $value->id_template ?>"><img src="<?= base_url('images/template/') . $value->image ?>" alt=""></a>
				<div class="down-content">
					<a href="<?= site_url('front/DetailTemplate?id_template=') . $value->id_template ?>"><h4><?= $value->name;?></h4></a>
					<h6></h6>
					<h4 style="<?= ($value->is_free == 1) ? 'text-decoration: line-through;color:#939393;' : 'color:#0bb200;'?>"><?= cRupiah($value->price) ;?></h4>
					<p><?= substr($value->description, 0,50) . '...' ;?></p>
					<?php 
						if ($value->is_free == 1) {
							?>
					<span class="badge bg-success text-light">Free</span>
					<?php
						}else if($value->is_free == 0){
					?>
					<span class="badge bg-warning">Premium</span>
					<?php
						}
					?>
				</div>
			</div>
	</div>
	<?php endforeach; ?>
	<!-- </div> -->
</div>
</div>
</div>
