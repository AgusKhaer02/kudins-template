<div class="row">
	<div class="col-sm-12">
		<div class="card">
		<div class="card-header d-flex justify-content-between">
			<div class="header-title">
				<h4 class="card-title">Gallery</h4>
			</div>
		</div>
		<div class="card-body">

			<h4><a href="<?= site_url('admin/Gallery/add_form')?>" class="badge bg-primary">Add new gallery</a></h4>
			
			<!-- <div class="row">
				<div class="col-md-6">
					<?php
                        foreach ($gallery as $row) :
                    ?>
					<div class="card" style="width: 18rem;">
						<img class="card-img-top" src="<?= base_url('images/template/gallery/'). $row->image ?>" alt="<?= $row->image?>">
						<div class="card-body">
							<div class="row">
								<div class="col-lg-12">
									<a href="<?= site_url('admin/Gallery/edit_form') . '?id_gallery=' . $row->id_gallery ?>" class="btn btn-warning">Edit</a>
									<a href="<?= site_url('admin/Gallery/add_form')?>" class="btn btn-danger">Delete</a>
								</div>
							</div>
						</div>
					</div>

					<?php
                        endforeach;
                    ?>
				</div>
			</div> -->

			<div class="row">
				<?php foreach ($gallery as $row) : ?>
				<div class="col-md-12 col-xl-4">
					<div class="card aos-init aos-animate" data-aos="fade-up" data-aos-delay="1000">
						<div class="flex-wrap card-header d-flex justify-content-between">
							<div class="header-title">
								<img class="card-img-top" src="<?= base_url('images/template/gallery/'). $row->image ?>" alt="<?= $row->image?>" width="400" height="200">        
							</div>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-lg-12">
									<a href="<?= site_url('admin/Gallery/edit_form') . '?id_gallery=' . $row->id_gallery ?>" class="btn btn-warning">Edit</a>
									<a href="<?= site_url('admin/Gallery/delete_gallery') . '?id_gallery=' . $row->id_gallery . '&recent_gallery=' .$row->image ?>" class="btn btn-danger" onclick="return confirm('Do you want to delete this image?')">Delete</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>

		</div>
		</div>
	</div>
</div>
