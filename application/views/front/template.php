<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Kudins Template | <?= $title ;?></title>

		<link rel="stylesheet" href="<?= base_url('assets/front/css/')?>slider_gallery.css">

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/front/')?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets/front/')?>css/fontawesome.css">
    <link rel="stylesheet" href="<?= base_url('assets/front/')?>css/templatemo-sixteen.css">
    <link rel="stylesheet" href="<?= base_url('assets/front/')?>css/owl.css">

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
		<?php
			$this->load->view('front/layouts/header');
		?>
		
		<?= $page ;?>

    
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright &copy; 2020 Sixteen Clothing Co., Ltd.
            
            - Design: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="<?= base_url('assets/front/')?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/front/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="<?= base_url('assets/front/')?>js/custom.js"></script>
    <script src="<?= base_url('assets/front/')?>js/owl.js"></script>
    <script src="<?= base_url('assets/front/')?>js/slick.js"></script>
    <script src="<?= base_url('assets/front/')?>js/isotope.js"></script>
    <script src="<?= base_url('assets/front/')?>js/accordions.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>

		<script>
				
	function prev(){
			document.getElementById('slider-container').scrollLeft -= 270;
	}

	function next()
	{
			document.getElementById('slider-container').scrollLeft += 270;
	}


	$(".slide img").on("click" , function(){
		$(this).toggleClass('zoomed');
		$(".overlay").toggleClass('active');
	})

		</script>


  </body>

</html>
