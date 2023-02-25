<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Список отзывов</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
					<li class="breadcrumb-item active">Список отзывов</li>
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
							<a href="{{ route('review.create') }}" class="btn btn-primary">Добавить пункт</a>
						</div>
					</div>
					<div class="card-body">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th style="width: 10px">ID</th>
									<th>Имя</th>
									<th>Позиция</th>
									<th>Комментарий</th>
									<th>Изображение</th>
									<th style="width: 130px">Действия</th>
								</tr>
							</thead>
							@if (isset($reviews) && !$reviews->isEmpty())
							<tbody>
								@foreach ($reviews as $review)
								<tr>
									<td>{{ $review->id }}</td>
									<td>{{ Str::limit($review->name, 20) }}</td>
									<td>{{ Str::limit($review->position, 50) }}</td>
									<td>{{ Str::limit($review->desc, 50) }}</td>
									<td>{{ Str::limit($review->img, 50) }}</td>
									<td>
										<a href="{{ route('review.edit', ['review' => $review->id]) }}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
										<form style="display: inline" action="{{ route('review.destroy', ['review' => $review->id]) }}" method="POST">
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
						@if ($reviews->lastPage() > 1)
						<ul class="pagination pagination-sm m-0 float-right">

							@if (!$reviews->onFirstpage())
							<li class="page-item"><a class="page-link" href="{{ $reviews->previousPageUrl() }}">«</a></li>
							@endif
							@for ($i = 1; $i <= $reviews->lastPage(); $i++)
								@if ($i === $reviews->currentPage())
								<li class="page-item"><a class="page-link" href="#">{{ $reviews->currentPage() }}</a></li>
								@continue
								@endif
								<li class="page-item"><a class="page-link" href="{{ $reviews->url($i) }}">{{ $i }}</a></li>
								@endfor
								@if ($reviews->currentPage() < $reviews->lastPage())
								<li class="page-item"><a class="page-link" href="{{ $reviews->nextPageUrl() }}">»</a></li>
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







