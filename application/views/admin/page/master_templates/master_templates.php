<div class="row">
	<div class="col-sm-12">
		<div class="card">
		<div class="card-header d-flex justify-content-between">
			<div class="header-title">
				<h4 class="card-title">Bootstrap Datatables</h4>
			</div>
		</div>
		<div class="card-body">
			<h4><a href="<?= site_url('admin/MasterTemplates/add_form')?>" class="badge bg-primary">Add new templates</a></h4>
			<div class="table-responsive">
				<div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap5"><div class="table-responsive border-bottom my-3">
					<table id="datatable" class="table table-striped dataTable" data-toggle="data-table" aria-describedby="datatable_info">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Subcategory</th>
								<th>Description</th>
								<th>Price</th>
								<th>Last Update</th>
								<th>Released</th>
								<th>Is Free</th>
								<th>Image</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$num = 1;
								foreach ($templates as $row) :
							?>
							<tr class="odd">
								<td class="sorting_1"><?= $num++ ;?></td>
								<td><?= $row->name ;?></td>
								<td><?= $row->subcategory ;?></td>
								<td><?= $row->description ;?></td>
								<td><?= $row->price ;?></td>
								<td><?= $row->last_update ;?></td>
								<td><?= $row->released ;?></td>
								<td><?= ($row->is_free == 'Yes') ? "<span class='badge bg-success'>Yes</span>":"<span class='badge bg-danger'>No</span>" ;?></td>
								<td><img src="<?= base_url('images/template/') . $row->image ;?>" alt="<?= $row->image?>" width="150" height="100"></td>
								<td>
									<a href="<?= site_url('admin/MasterTemplates/edit_form').'?id_template=' . $row->id_template. '&recent_image=' . $row->image?>" class="btn btn-warning">Edit</a>
									<a href="<?= site_url('admin/MasterTemplates/delete_template'). '?id_template=' . $row->id_template . '&recent_image=' . $row->image . '&recent_template_file=' . $row->template_file?>" onclick="return confirm('Warning! All related tables will be lost since you delete this subcategory such as Collection, and Gallery. Proceed?')"class="btn btn-danger">Delete</a>
									<a href="<?= site_url('admin/Gallery') . '?id_template=' . $row->id_template ?>" class="btn btn-primary">Gallery</a>
								</td>
							</tr>
							<?php endforeach;?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>
