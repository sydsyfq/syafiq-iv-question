<nav class="pc-sidebar ">
	<div class="navbar-wrapper">
		<div class="m-header">
			<a href="{{ route('view.user') }}" class="b-brand">
				<!-- ========   change your logo hear   ============ -->
				<img src="{{ asset('assets/images/ZUS-logo-web1.png') }}" alt="" class="logo logo-lg">
			</a>
		</div>
		<div class="navbar-content">

			<ul class="pc-navbar">
				<li class="pc-item pc-caption">
					<label>Navigation</label>
				</li>

				{{-- User Setup Sidebar Starts --}}
				<li class="pc-item pc-hasmenu">
					<a class="pc-link"><span class="pc-micon"><i class="material-icons-two-tone">https</i></span><span class="pc-mtext">Users Setup</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
					<ul class="pc-submenu">
						<li class="pc-item"><a class="pc-link" href="{{ route('view.user') }}" >View User</a></li>
						<li class="pc-item"><a class="pc-link" href="{{ route('add.user') }}"">Add User</a></li>
					</ul>
				</li>
				{{-- User Setup Sidebar Ends --}}

				{{-- Products Setup Sidebar Starts --}}
				<li class="pc-item pc-hasmenu">
					<a class="pc-link"><span class="pc-micon"><i class="material-icons-two-tone">list_alt</i></span><span class="pc-mtext">Products Setup</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
					<ul class="pc-submenu">
						<li class="pc-item"><a class="pc-link" href="{{ route('view.product') }}" >View Product</a></li>
						<li class="pc-item"><a class="pc-link" href="{{ route('add.product') }}" >Add Product</a></li>
					</ul>
				</li>
				{{-- Products Setup Sidebar Ends --}}

			</ul>
		</div>
	</div>
</nav>