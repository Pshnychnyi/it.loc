<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Главная</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
					<li class="breadcrumb-item active">Главная</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			@if (isset($serviceCount))
				<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-info">
					<div class="inner">
						<h3>{{ $serviceCount }}</h3>

						<p>Услуги</p>
					</div>
					<div class="icon">
						<i class="fas fa-concierge-bell"></i>
					</div>
					<a href="{{ route('service.index') }}" class="small-box-footer">Все услуги <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			@endif
			<!-- ./col -->

			@if (isset($reviewCount))
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-success">
					<div class="inner">
						<h3>{{ $reviewCount }}</h3>

						<p>Отзывы</p>
					</div>
					<div class="icon">
						<i class="fas fa-comment-dots"></i>
					</div>
					<a href="{{ route('review.index') }}" class="small-box-footer">Все отзывы <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			@endif
			<!-- ./col -->

			@if (isset($portfolioCount))
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-warning">
					<div class="inner">
						<h3>{{ $portfolioCount }}</h3>

						<p>Портфолио</p>
					</div>
					<div class="icon">
						<i class="fas fa-folder-open"></i>
					</div>
					<a href="{{ route('portfolio.index') }}" class="small-box-footer">Все портфолио <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			@endif
			<!-- ./col -->

			@if (isset($teamCount))
			<div class="col-lg-3 col-6">
				<!-- small box -->
				<div class="small-box bg-danger">
					<div class="inner">
						<h3>{{ $teamCount }}</h3>

						<p>Члены команды</p>
					</div>
					<div class="icon">
						<i class="fas fa-users"></i>
					</div>
					<a href="{{ route('team.index') }}" class="small-box-footer">Все члены команды <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			@endif
			<!-- ./col -->
		</div>
		<!-- /.row -->
		<!-- Main row -->

	</div>

</section>












