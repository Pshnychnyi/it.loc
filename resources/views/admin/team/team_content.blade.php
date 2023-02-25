<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Список учасников команды</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
					<li class="breadcrumb-item active">Список учасников команды</li>
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
							<a href="{{ route('team.create') }}" class="btn btn-primary">Добавить пункт</a>
						</div>
					</div>
					<div class="card-body">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th style="width: 10px">ID</th>
									<th>Имя</th>
									<th>Позиция</th>
									<th>Изображение</th>
									<th style="width: 130px">Действия</th>
								</tr>
							</thead>
							@if (isset($teams) && !$teams->isEmpty())
							<tbody>
								@foreach ($teams as $team)
								<tr>
									<td>{{ $team->id }}</td>
									<td>{{ Str::limit($team->name, 20) }}</td>
									<td>{{ Str::limit($team->position, 50) }}</td>
									<td>{{ Str::limit($team->img, 50) }}</td>
									<td>
										<a href="{{ route('team.edit', ['team' => $team->id]) }}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
										<form style="display: inline" action="{{ route('team.destroy', ['team' => $team->id]) }}" method="POST">
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
						@if ($teams->lastPage() > 1)
						<ul class="pagination pagination-sm m-0 float-right">

							@if (!$teams->onFirstpage())
							<li class="page-item"><a class="page-link" href="{{ $teams->previousPageUrl() }}">«</a></li>
							@endif
							@for ($i = 1; $i <= $teams->lastPage(); $i++)
								@if ($i === $teams->currentPage())
								<li class="page-item"><a class="page-link" href="#">{{ $teams->currentPage() }}</a></li>
								@continue
								@endif
								<li class="page-item"><a class="page-link" href="{{ $teams->url($i) }}">{{ $i }}</a></li>
								@endfor
								@if ($teams->currentPage() < $teams->lastPage())
								<li class="page-item"><a class="page-link" href="{{ $teams->nextPageUrl() }}">»</a></li>
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







