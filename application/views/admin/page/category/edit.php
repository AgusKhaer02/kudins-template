<div class="card">
	<div class="card-header d-flex justify-content-between">
		<div class="header-title">
			<h4 class="card-title">Form Edit</h4>
		</div>
	</div>
	<div class="card-body">
		<form action="<?= site_url('admin/MasterCategories/edit_category')?>" method="post" enctype="multipart/form-data">
			<input type="text" name="id_category" value="<?= $categories->id_category?>" hidden>
			<input type="text" name="recent_cover_image" value="<?= ($categories->cover_image != 'example.png') ? $categories->cover_image : '' ?>" hidden>
			<div class="form-group">
				<label class="form-label" for="exampleInputText1">Name </label>
				<input type="text" class="form-control" id="exampleInputText1" value="<?= $categories->category?>" placeholder="template name..." name="category">
			</div>
			<div class="form-group">
				<label class="form-label" for="exampleFormControlTextarea1">Description</label>
				<textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="5"><?= $categories->description?></textarea>
			</div>

			<div class="form-group col-md-3">
				<label class="form-label" for="exampleInputText1">Cover Image </label>
				<input type="file" class="form-control" id="exampleInputText1" placeholder="price..." name="cover_image">
			</div>

			<button type="submit" class="btn btn-warning" type="submit">Edit</button>
			<button type="submit" class="btn btn-danger" type="reset">Reset</button>
		</form>
	</div>
</div>
