<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">О нас</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
					<li class="breadcrumb-item active">О нас</li>
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
							<a href="{{ route('about.create') }}" class="btn btn-primary">Добавить пункт</a>
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
							@if (isset($abouts) && !$abouts->isEmpty())
							<tbody>
								@foreach ($abouts as $about)
								<tr>
									<td>{{ $about->id }}</td>
									<td>{{ Str::limit($about->title, 10) }}</td>
									<td>{{ Str::limit($about->content, 50) }}</td>
									<td>{{ Str::limit($about->img, 30) }}</td>
									<td>{{ $about->created_at }}</td>
									<td>
										<a href="{{ route('about.edit', ['about' => $about->alias]) }}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
										<form style="display: inline" action="{{ route('about.destroy', ['about' => $about->alias]) }}" method="POST">
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
						@if ($abouts->lastPage() > 1)
							<ul class="pagination pagination-sm m-0 float-right">
								
								@if (!$abouts->onFirstpage())
									<li class="page-item"><a class="page-link" href="{{ $abouts->previousPageUrl() }}">«</a></li>
								@endif
								@for ($i = 1; $i <= $abouts->lastPage(); $i++)
									@if ($i === $abouts->currentPage())
										<li class="page-item"><a class="page-link" href="#">{{ $abouts->currentPage() }}</a></li>
										@continue
									@endif
										<li class="page-item"><a class="page-link" href="{{ $abouts->url($i) }}">{{ $i }}</a></li>
								@endfor
									@if ($abouts->currentPage() < $abouts->lastPage())
										<li class="page-item"><a class="page-link" href="{{ $abouts->nextPageUrl() }}">»</a></li>
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







