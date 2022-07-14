<div class="row">
	<div class="col-sm-12">
		<div class="card">
		<div class="card-header d-flex justify-content-between">
			<div class="header-title">
				<h4 class="card-title"><?= $category_name ;?></h4>
			</div>
		</div>
		<div class="card-body">
			<h4><a href="<?= site_url('admin/MasterSubcategory/add_form') . '?id_category=' . $id_category . '&category=' .  $category_name?>" class="badge bg-primary">Add new subcategory</a></h4>
			<div class="table-responsive">
				<div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap5"><div class="table-responsive border-bottom my-3">
					<table id="datatable" class="table table-striped dataTable" data-toggle="data-table" aria-describedby="datatable_info">
						<thead>
							<tr>
								<th>#</th>
								<th>Subcategory</th>
								<th>Description</th>
								<th>Cover Image</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						
							<?php
								$num = 1;
								foreach ($subcategory as $value) :
							?>
							<tr class="odd">	
								<td class="sorting_1"><?= $num++ ;?></td>
								<td><?= $value->subcategory ;?></td>
								<td><?= $value->description ;?></td>
								<td><img src="<?= base_url('images/category/subcategory/') . $value->cover_image ;?>" alt="<?= $value->cover_image?>" width="150" height="100"></td>
								<td>
									<a href="<?= site_url('admin/MasterSubcategory/edit_form') . '?id_subcategory=' .$value->id_subcategory . '&id_category=' . $id_category . '&recent_cover_image=' . $value->cover_image . '&category=' .  $category_name?>" class="btn btn-warning">Edit</a>
									<a href="<?= site_url('admin/MasterSubcategory/delete_subcategory') . '?id_subcategory=' .$value->id_subcategory . '&id_category=' . $id_category . '&recent_cover_image=' . $value->cover_image . '&category=' .  $category_name?>" class="btn btn-danger" onclick="return confirm('Warning! All related tables will be lost since you delete this subcategory such as Template,Collection,and Gallery. Proceed?')">Delete</a>
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
