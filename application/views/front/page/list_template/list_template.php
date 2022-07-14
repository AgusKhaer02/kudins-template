<div class="page-heading home-heading header-text">
	<div class="container">
	<div class="row">
		<div class="col-md-12">
		<div class="text-content">
			
			<h2><?= $subcategory_name ;?></h2>
			<h4><?= $subcategory_desc ;?></h4>
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
			<h2>List Templates</h2>
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
	<?php foreach ($template as $value) : ?>
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
