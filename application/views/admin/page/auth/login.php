<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Sign In</title>
      
      <!-- Favicon -->
      <link rel="shortcut icon" href="<?= base_url('assets/admin/')?>images/favicon.ico" />
      
      <!-- Library / Plugin Css Build -->
      <link rel="stylesheet" href="<?= base_url('assets/admin/')?>css/core/libs.min.css" />
      
      <!-- Hope Ui Design System Css -->
      <link rel="stylesheet" href="<?= base_url('assets/admin/')?>css/hope-ui.min.css?v=1.2.0" />
      
      <!-- Custom Css -->
      <link rel="stylesheet" href="<?= base_url('assets/admin/')?>css/custom.min.css?v=1.2.0" />
      
      <!-- Dark Css -->
      <link rel="stylesheet" href="<?= base_url('assets/admin/')?>css/dark.min.css"/>
      
      <!-- Customizer Css -->
      <link rel="stylesheet" href="<?= base_url('assets/admin/')?>css/customizer.min.css" />
      
  </head>
  <body class="theme-color-default dark" data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <!-- loader Start -->
    <div id="loading">
      <div class="loader simple-loader">
          <div class="loader-body"></div>
      </div>    </div>
    <!-- loader END -->
    
      <div class="wrapper">
      <section class="login-content">
         <div class="row m-0 align-items-center bg-white vh-100">            
            <div class="col-md-6">
               <div class="row justify-content-center">
                  <div class="col-md-10">
                     <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card">
                        <div class="card-body">
                           <h2 class="mb-2 text-center">Sign In</h2>
                           <p class="text-center">for Admins.</p>
									<?php
										$this->load->view('admin/layouts/alerts');
									?>
                           <form action="<?= site_url('admin/Login/login')?>" method="post">
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <label for="username" class="form-label">Username</label>
                                       <input type="text" class="form-control" id="username" aria-describedby="username" placeholder=" " name="ip-username">
                                    </div>
                                 </div>
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <label for="password" class="form-label">Password</label>
                                       <input type="password" class="form-control" id="password" aria-describedby="password" placeholder=" " name="ip-pass">
                                    </div>
                                 </div>
                              </div>
                              <div class="d-flex justify-content-center">
                                 <button type="submit" class="btn btn-primary">Sign In</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sign-bg">
                  <svg width="280" height="230" viewBox="0 0 431 398" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <g opacity="0.05">
                     <rect x="-157.085" y="193.773" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 -157.085 193.773)" fill="#3B8AFF"/>
                     <rect x="7.46875" y="358.327" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 7.46875 358.327)" fill="#3B8AFF"/>
                     <rect x="61.9355" y="138.545" width="310.286" height="77.5714" rx="38.7857" transform="rotate(45 61.9355 138.545)" fill="#3B8AFF"/>
                     <rect x="62.3154" y="-190.173" width="543" height="77.5714" rx="38.7857" transform="rotate(45 62.3154 -190.173)" fill="#3B8AFF"/>
                     </g>
                  </svg>
               </div>
            </div>
            <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
               <img src="<?= base_url('assets/admin/')?>/images/auth/01.png" class="img-fluid gradient-main animated-scaleX" alt="images">
            </div>
         </div>
      </section>
      </div>
    
    <!-- Library Bundle Script -->
    <script src="<?= base_url('assets/admin/')?>js/core/libs.min.js"></script>
    
    <!-- External Library Bundle Script -->
    <script src="<?= base_url('assets/admin/')?>js/core/external.min.js"></script>
    
    <!-- Widgetchart Script -->
    <script src="<?= base_url('assets/admin/')?>js/charts/widgetcharts.js"></script>
    
    <!-- mapchart Script -->
    <script src="<?= base_url('assets/admin/')?>js/charts/vectore-chart.js"></script>
    <script src="<?= base_url('assets/admin/')?>js/charts/dashboard.js" ></script>
    
    <!-- fslightbox Script -->
    <script src="<?= base_url('assets/admin/')?>js/plugins/fslightbox.js"></script>
    
    <!-- Settings Script -->
    <script src="<?= base_url('assets/admin/')?>js/plugins/setting.js"></script>
    
    <!-- Slider-tab Script -->
    <script src="<?= base_url('assets/admin/')?>js/plugins/slider-tabs.js"></script>
    
    <!-- Form Wizard Script -->
    <script src="<?= base_url('assets/admin/')?>js/plugins/form-wizard.js"></script>
    
    <!-- AOS Animation Plugin-->
    
    <!-- App Script -->
    <script src="<?= base_url('assets/admin/')?>js/hope-ui.js" defer></script>
  </body>
</html>
