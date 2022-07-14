<div class="page-heading home-heading header-text">
	<div class="container">
	<div class="row">
		<div class="col-md-12">
		<div class="text-content">
			<h4>Find your best template in...</h4>
			<h2>Kudins Template</h2>
		</div>
		</div>
	</div>
	</div>
</div>

<div class="send-message">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2><?= $detail_template->name?></h2>
            </div>
          </div>
          <div class="col-md-8">
			<img src="<?= base_url('images/template/') . $detail_template->image?>">
			<div id="slider-container" class="slider">
				<?php foreach ($gallery as $value) :?>
					<div class="slide">
							<img src="<?= base_url('images/template/gallery/') . $value->image?>" alt="">
					</div>
				<?php endforeach;?>
			</div>
          </div>
          <div class="col-md-4">
			<h3 class="d-flex flex-row">Description</h3>
			<p>
				<?= $detail_template->description ;?>
			</p>

			<br>
			<?php 

			$lupdate = dateFormatID($detail_template->last_update);
			$lreleased = dateFormatID($detail_template->released);

			?>
			Last Update : <?= $lupdate ;?>
			<br>
			Released : <?= $lreleased;?>
			<br>
			Price : <?= cRupiah($detail_template->price) ;?>
			<br> <br>

			<!-- <?php //if($detail_template->is_free == 1)  { ?> -->
				<a href="<?= site_url('front/DetailTemplate/download?file_name=') . $detail_template->template_file ?>" style="color:white;" class="btn btn-primary btn-block"><i class="fa fa-download"></i> Download</a>
			<!-- <?php //}else{ ?>
				<a href="<?= site_url('front/DetailTemplate/download?file_name=') . $detail_template->template_file ?>" style="color:white;" class="btn btn-primary btn-block"><i class="fa fa-dollar"></i> Purchase</a>
			<?php // } ?> -->
			<?php
				if ($collection_is_exist == 1) {
			?>
				<a href="<?= site_url('front/Collections/remove_collection?id_template=') . $detail_template->id_template ?>" class="btn btn-danger btn-block" onclick="return confirm('Do you want remove this template from your collection?')"><i class="fa fa-trash"></i> Remove from my Collections</a>
			<?php	
				}else{
			?>
				<a href="<?= site_url('front/Collections/add_collection?id_template=') . $detail_template->id_template ?>" class="btn btn-light btn-block"><i class="fa fa-save"></i> Save to collections</a>
			<?php
				}
			?>
          </div>
        </div>
      </div>
    </div>
