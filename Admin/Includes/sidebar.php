
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion " id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?AR=0">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-barcode"></i>
		</div>
		<div class="sidebar-brand-text mx-3">Authentication </div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Nav Item - Dashboard -->
	<li class="nav-item active">
		<a class="nav-link" href="index.php?AR=0">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Site Ayarları</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">


	<div class="sidebar-heading">
		Üyelik İşlemleri
	</div>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUyelik"
			aria-expanded="true" aria-controls="collapseUyelik">
			<i class="fas fa-users"></i>
			<span>Üyelik</span>
		</a>
		<div id="collapseUyelik" class="collapse" aria-labelledby="headingUyelik" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Üyelik Kategorisi</h6>
				<a class="collapse-item" href="index.php?AR=2">Üyeler</a>

			</div>
		</div>
	</li>
	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

	<!-- Sidebar Message -->
	<div class="text-center d-none d-md-block text-white">
		<p><small><?php echo ($SiteCopyright) ?></small></p>
	</div>

</ul>
        <!-- End of Sidebar -->
