
<aside class="sidebar sidebar-default navs-rounded-all ">
	<div class="sidebar-header d-flex align-items-center justify-content-start">
		<a href="<?= site_url('admin/Dashboard')?>" class="navbar-brand">           
			<h4 class="logo-title">Kudins Template</h4>
		</a>
		<div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
			<i class="icon">
				<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
					<path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
				</svg>
			</i>
		</div>
	</div>
	<div class="sidebar-body pt-0 data-scrollbar">
		<div class="sidebar-list">
			<!-- Sidebar Menu Start -->
			<ul class="navbar-nav iq-main-menu" id="sidebar-menu">
				<li class="nav-item static-item">
					<a class="nav-link static-item disabled" href="#" tabindex="-1">
						<span class="default-icon">Main Menu</span>
						<span class="mini-icon">-</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?= ($item_sidenav_active == 'Dashboard') ? 'active': '' ?>" aria-current="page" href="<?= site_url('admin/Dashboard')?>">
						<i class="icon">
							<svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path opacity="0.4" d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z" fill="currentColor"></path>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z" fill="currentColor"></path>
							</svg>
						</i>
						<span class="item-name">Dashboard</span>
					</a>
				</li>

				<li class="nav-item">
					<a class="nav-link <?= ($item_sidenav_active == 'Master Templates') ? 'active': '' ?>" aria-current="page" href="<?= site_url('admin/MasterTemplates')?>">
						<i class="icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<path d="M2 5C2 4.44772 2.44772 4 3 4H8.66667H21C21.5523 4 22 4.44772 22 5V8H15.3333H8.66667H2V5Z" fill="currentColor" stroke="currentColor"></path>
								<path d="M6 8H2V11M6 8V20M6 8H14M6 20H3C2.44772 20 2 19.5523 2 19V11M6 20H14M14 8H22V11M14 8V20M14 20H21C21.5523 20 22 19.5523 22 19V11M2 11H22M2 14H22M2 17H22M10 8V20M18 8V20" stroke="currentColor"></path>
							</svg>
						</i>
						<span class="item-name">Master Templates</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?= ($item_sidenav_active == 'Master Categories') ? 'active': '' ?>" aria-current="page" href="<?= site_url('admin/MasterCategories')?>">
						<i class="icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<path d="M2 5C2 4.44772 2.44772 4 3 4H8.66667H21C21.5523 4 22 4.44772 22 5V8H15.3333H8.66667H2V5Z" fill="currentColor" stroke="currentColor"></path>
								<path d="M6 8H2V11M6 8V20M6 8H14M6 20H3C2.44772 20 2 19.5523 2 19V11M6 20H14M14 8H22V11M14 8V20M14 20H21C21.5523 20 22 19.5523 22 19V11M2 11H22M2 14H22M2 17H22M10 8V20M18 8V20" stroke="currentColor"></path>
							</svg>
						</i>
						<span class="item-name">Master Categories</span>
					</a>
				</li>
			</ul>
			<!-- Sidebar Menu End -->        
		</div>
	</div>
	<div class="sidebar-footer"></div>
</aside>
