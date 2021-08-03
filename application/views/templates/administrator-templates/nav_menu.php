<body class="sb-nav-fixed">
	<!-- navigation menu -->
	<nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary pt-2 pb-2">
		<!-- Navbar Brand-->
		<!-- Nama di anchor ini nantinya berubah sesuai dengan session yang masuk -->
		<a class="navbar-brand ps-3" href="#">Administrator</a>
		<!-- Sidebar Toggle-->
		<button class="btn btn-link btn-sm btn-primary order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
		<!-- Navbar Search-->
		<form class="d-none d-md-inline-block form-inline ms-auto me-4 me-md-3 my-2 my-md-0">
			<div class="input-group ">
				<input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
				<button class="btn btn-success" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
			</div>
		</form>
		<!-- Navbar-->
		<ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4 nav-pills">
			<li class="nav-item dropdown ">
				<a class="nav-link dropdown-toggle active" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					<i class="fas fa-user fa-fw"></i>
				</a>
				<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
					<li><a class="dropdown-item" href="#!">Profile</a></li>
					<li><a class="dropdown-item" href="<?= base_url('auth/logout') ?>">Logout</a></li>
				</ul>
			</li>
		</ul>
	</nav>
	<!-- navigation menu -->
