<div class="card">
	<div class="card-header d-flex justify-content-between">
		<div class="header-title">
			<h4 class="card-title">Form Edit</h4>
		</div>
	</div>
	<div class="card-body">
		<form action="<?= site_url('admin/MasterTemplates/edit_template')?>" method="post" enctype="multipart/form-data">
			<input type="text" name="id_template" value="<?= $template->id_template?>" hidden>
			<input type="text" name="recent_template_file" value="<?= $template->template_file?>" hidden>
			<input type="text" name="recent_image" value="<?= ($template->image != 'example.png' && !empty($template->image) ) ? $template->image : '' ?>" hidden>

			<div class="form-group">
				<label class="form-label" for="exampleInputText1">Template Name </label>
				<input type="text" class="form-control" value="<?= $template->name ?>" id="exampleInputText1" placeholder="template name..." name="name">
			</div>
			<div class="form-group">
				<label class="form-label">Subcategory</label>
				<select class="form-select mb-3 shadow-none" name="id_subcategory">
					<option selected="">-=Select Subcategory=-</option>
					<?php
						foreach ($list_subcategory as $value) :
					?>
						<option value="<?= $value->id_subcategory ;?>"  <?= ($template->id_subcategory == $value->id_subcategory) ? 'selected' : '' ;?>><?= $value->subcategory ;?></option>
					<?php 
						endforeach;
					?>
				</select>
			</div>
			<div class="form-group">
				<label class="form-label" for="exampleFormControlTextarea1">Description</label>
				<textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="5"><?= $template->description ;?></textarea>
			</div>

			<div class="form-group col-md-3">
				<label class="form-label" for="exampleInputText1">Price </label>
				<input type="number" class="form-control" value="<?= $template->price ?>" id="exampleInputText1" placeholder="price..." name="price">
			</div>

			<div class="form-group">
				<label class="form-label" >Is Free? </label>
				<div class="form-check d-block">
					<input class="form-check-input" type="radio"  id="flexRadioDefault1" name="is_free" value="1" <?= ($template->is_free == 1) ? 'checked' : '' ;?>>
					<label class="form-check-label" for="flexRadioDefault1">
						Yes
					</label>
				</div>
				<div class="form-check d-block">
					<input class="form-check-input" type="radio" id="flexRadioDefault1" name="is_free" value="0"  <?= ($template->is_free == 0) ? 'checked' : '' ;?>>
					<label class="form-check-label" for="flexRadioDefault1">
						No
					</label>
				</div>
			</div>

			<div class="form-group col-md-3">
				<label class="form-label" for="exampleInputText1">Image </label>
				<input type="file" class="form-control" id="exampleInputText1" name="image">
			</div>

			<div class="form-group col-md-3">
				<label class="form-label" for="exampleInputText1">Template File </label>
				<input type="file" class="form-control" id="exampleInputText1" accept=".zip" name="template_file">
			</div>

			<button type="submit" class="btn btn-warning" type="submit">Edit</button>
			<button type="submit" class="btn btn-danger" type="reset">Reset</button>
		</form>
	</div>
</div>
