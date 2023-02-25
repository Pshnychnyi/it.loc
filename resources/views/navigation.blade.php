@if ($menu)

<div id="nav">
	<div class="container-fluid">
		<nav class="navbar navbar-expand-md bg-dark navbar-dark">
			<a href="{{ asset("index.html") }}" class="navbar-brand">
				<img src="{{ asset('storage/img/logo.png') }}" alt="Logo">
			</a>
			<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
				<div class="navbar-nav ml-auto">
					@include('customMenuItems', ['items' => $menu->roots()])
				</div>
			</div>
		</nav>
	</div>
</div>
@endif
