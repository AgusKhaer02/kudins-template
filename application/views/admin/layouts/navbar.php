<nav class="nav navbar navbar-expand-lg navbar-light iq-navbar">
	<div class="container-fluid navbar-inner">
	<a href="<?= site_url('admin/Dashboard')?>" class="navbar-brand">           
			<h4 class="logo-title">Kudins Template</h4>
		</a>
	<div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
		<i class="icon">
			<svg width="20px" height="20px" viewBox="0 0 24 24">
			<path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
		</svg>
		</i>
	</div>
	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon">
			<span class="mt-2 navbar-toggler-bar bar1"></span>
			<span class="navbar-toggler-bar bar2"></span>
			<span class="navbar-toggler-bar bar3"></span>
		</span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="mb-2 navbar-nav ms-auto align-items-center navbar-list mb-lg-0">
			
			<li class="nav-item dropdown">
				<a class="py-0 nav-link d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				<img src="<?= base_url('assets/admin/')?>images/avatars/01.png" alt="User-Profile" class="theme-color-default-img img-fluid avatar avatar-50 avatar-rounded">
				<div class="caption ms-3 d-none d-md-block ">
					<h6 class="mb-0 caption-title"><?= $this->session->userdata("sess_admin_kudins_template")['username'];?></h6>
					<p class="mb-0 caption-sub-title">Admin</p>
				</div>
				</a>
				<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
					<li><a class="dropdown-item" href="<?= site_url('admin/Login/Logout')?>" onclick="return confirm('Are you sure that you want to log out?')">Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>
	</div>
</nav>
