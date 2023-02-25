<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Список портфолио</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
					<li class="breadcrumb-item active">Список портфолио</li>
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
			<div class="col-md-12">
				<div class="card">
					<div class="row mt-3 ml-3">
						<div class="col-md-3">
							<a href="{{ route('portfolio.create') }}" class="btn btn-primary">Добавить пункт</a>
						</div>
					</div>
					<div class="card-body">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th style="width: 10px">ID</th>
									<th>Наименование</th>
									<th>Контент</th>
									<th>Изображение</th>
									<th>Дата создания</th>
									<th style="width: 130px">Действия</th>
								</tr>
							</thead>
							@if (isset($portfolios) && !$portfolios->isEmpty())
							<tbody>
								@foreach ($portfolios as $portfolio)
								<tr>
									<td>{{ $portfolio->id }}</td>
									<td>{{ Str::limit($portfolio->title, 10) }}</td>
									<td>{{ Str::limit($portfolio->desc, 50) }}</td>
									<td>{{ Str::limit($portfolio->img, 30) }}</td>
									<td>{{ $portfolio->created_at }}</td>
									<td>
										<a href="{{ route('portfolio.edit', ['portfolio' => $portfolio->alias]) }}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
										<form style="display: inline" action="{{ route('portfolio.destroy', ['portfolio' => $portfolio->alias]) }}" method="POST">
											@csrf
											@method('DELETE')
											<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
										</form>
										
									</td>
								</tr>
								@endforeach
							</tbody>
							@else
							<h2>Записей пока нет</h2>
							@endif

						</table>
					</div>

					

					<div class="card-footer clearfix">
						@if ($portfolios->lastPage() > 1)
						<ul class="pagination pagination-sm m-0 float-right">

							@if (!$portfolios->onFirstpage())
							<li class="page-item"><a class="page-link" href="{{ $portfolios->previousPageUrl() }}">«</a></li>
							@endif
							@for ($i = 1; $i <= $portfolios->lastPage(); $i++)
								@if ($i === $portfolios->currentPage())
								<li class="page-item"><a class="page-link" href="#">{{ $portfolios->currentPage() }}</a></li>
								@continue
								@endif
								<li class="page-item"><a class="page-link" href="{{ $portfolios->url($i) }}">{{ $i }}</a></li>
								@endfor
								@if ($portfolios->currentPage() < $portfolios->lastPage())
								<li class="page-item"><a class="page-link" href="{{ $portfolios->nextPageUrl() }}">»</a></li>
								@endif

							</ul>
							@endif

						</div>
					</div>	
				</div>


			</div>
			<!-- /.row -->
			<!-- Main row -->

		</div>

	</section>







