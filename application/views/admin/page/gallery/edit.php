<div class="card">
	<div class="card-header d-flex justify-content-between">
		<div class="header-title">
			<h4 class="card-title">Form Edit Gallery</h4>
		</div>
	</div>
	<div class="card-body">
		<form action="<?= site_url('admin/Gallery/edit_gallery')?>" method="post" enctype="multipart/form-data">
			<input type="text" name="id_gallery" value="<?= $gallery->id_gallery?>" hidden>
			
			<input type="text" name="recent_gallery" value="<?= $gallery->image?>" hidden>

			<div class="form-group col-md-4">
				<label class="form-label" for="exampleInputText1">Image </label>
				<input type="file" class="form-control" id="exampleInputText1" name="image">
			</div>
			<button type="submit" class="btn btn-warning" type="submit">Edit</button>
			<button type="submit" class="btn btn-danger" type="reset">Reset</button>
		</form>
	</div>
</div>
