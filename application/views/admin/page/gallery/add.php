<div class="card">
	<div class="card-header d-flex justify-content-between">
		<div class="header-title">
			<h4 class="card-title">Form Add Gallery</h4>
		</div>
	</div>
	<div class="card-body">
		<form action="<?= site_url('admin/Gallery/add_gallery')?>" method="post" enctype="multipart/form-data">

			<div class="form-group col-md-4">
				<label class="form-label" for="exampleInputText1">Image </label>
				<input type="file" class="form-control" id="exampleInputText1" name="image">
			</div>
			<button type="submit" class="btn btn-primary" type="submit">Submit</button>
			<button type="submit" class="btn btn-danger" type="reset">Reset</button>
		</form>
	</div>
</div>
