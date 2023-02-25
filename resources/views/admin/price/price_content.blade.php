<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Услуги</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
					<li class="breadcrumb-item active">Услуги</li>
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
							<a href="{{ route('price.create') }}" class="btn btn-primary">Добавить пункт</a>
						</div>
					</div>
					<div class="card-body">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th style="width: 10px">ID</th>
									<th>Наименование</th>
									<th>Цена</th>
									<th>Иконка</th>
									<th style="width: 130px">Действия</th>
								</tr>
							</thead>
							@if (isset($prices) && !$prices->isEmpty())
							<tbody>
								@foreach ($prices as $price)
								<tr>
									<td>{{ $price->id }}</td>
									<td>{{ Str::limit($price->title, 10) }}</td>
									<td>{{ Str::limit($price->price, 50) }}</td>
									<td>{{ Str::limit($price->icon->icon, 30) }}</td>
									<td>
										<a href="{{ route('price.edit', ['price' => $price->id]) }}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
										<form style="display: inline" action="{{ route('price.destroy', ['price' => $price->id]) }}" method="POST">
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
						@if ($prices->lastPage() > 1)
						<ul class="pagination pagination-sm m-0 float-right">

							@if (!$prices->onFirstpage())
							<li class="page-item"><a class="page-link" href="{{ $prices->previousPageUrl() }}">«</a></li>
							@endif
							@for ($i = 1; $i <= $prices->lastPage(); $i++)
								@if ($i === $prices->currentPage())
								<li class="page-item"><a class="page-link" href="#">{{ $prices->currentPage() }}</a></li>
								@continue
								@endif
								<li class="page-item"><a class="page-link" href="{{ $prices->url($i) }}">{{ $i }}</a></li>
								@endfor
								@if ($prices->currentPage() < $prices->lastPage())
								<li class="page-item"><a class="page-link" href="{{ $prices->nextPageUrl() }}">»</a></li>
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







