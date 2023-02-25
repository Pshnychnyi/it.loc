<!-- Sidebar -->
<div class="sidebar">
	<!-- Sidebar user panel (optional) -->
	<div class="user-panel mt-3 pb-3 mb-3 d-flex">
		@auth
			<div class="image">
				<img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block">{{ auth()->user()->name }}</a>
			</div>
		@endauth
		
	</div>


	@if ($menu)
	<!-- Sidebar Menu -->
	<nav class="mt-2">
		<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
  			@include('admin.custom_menu_items', ['menu' => $menu->roots()])
  		</ul>
	</nav>
	<!-- /.sidebar-menu -->
	@endif
</div>

