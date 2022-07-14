<div class="row">
	<div class="col-sm-12">
		<div class="card">
		<div class="card-header d-flex justify-content-between">
			<div class="header-title">
				<h4 class="card-title">Data Category</h4>
			</div>
		</div>
		<div class="card-body">
			<h4><a href="<?= site_url('admin/MasterCategories/add_form')?>" class="badge bg-primary">Add new categories</a></h4>
			<div class="table-responsive">
				<div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap5"><div class="table-responsive border-bottom my-3">
					<table id="datatable" class="table table-striped dataTable" data-toggle="data-table" aria-describedby="datatable_info">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Description</th>
								<th>Cover Image</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$num = 1;
								foreach ($categories as $value) :
							?>
							<tr class="odd">
								<td class="sorting_1"><?= $num++ ;?></td>
								<td><?= $value->category ;?></td>
								<td><?= $value->description ;?></td>
								<td><img src="<?= base_url('images/category/') . $value->cover_image ;?>" alt="<?= $value->cover_image?>" width="150" height="100"></td>
								<td>
									<a href="<?= site_url('admin/MasterSubcategory') . '?id_category=' . $value->id_category . '&category=' . $value->category ?>" class="btn btn-primary">Subcategory</a>
									<a href="<?= site_url('admin/MasterCategories/edit_form') . '?id_category=' . $value->id_category ?>" class="btn btn-warning">Edit</a>
									<a href="<?= site_url('admin/MasterCategories/delete_category') . '?id_category=' . $value->id_category . '&recent_cover_image=' . $value->cover_image?>" onclick="return confirm('Warning! All related tables will be lost since you delete this subcategory such as Subcategory, Template, Collection, and Gallery. Proceed?')"class="btn btn-danger">Delete</a>
								</td>
							</tr>
							<?php
								endforeach;
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>
