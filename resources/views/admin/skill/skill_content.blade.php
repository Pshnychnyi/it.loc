<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Список навыков</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
					<li class="breadcrumb-item active">Список навыков</li>
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
							<a href="{{ route('skill.create') }}" class="btn btn-primary">Добавить пункт</a>
						</div>
					</div>
					
					<div class="card-body">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th style="width: 10px">ID</th>
									<th>Наименование</th>
									<th>Категория</th>
									<th>Шкала</th>
									<th style="width: 40px">Прценты</th>
									<th style="width: 130px">Действия</th>
								</tr>
							</thead>
							<tbody>
								@if (isset($skills) && !$skills->isEmpty())
									@foreach ($skills as $k => $skill)
										<tr>
											<td>{{ $skill->id }}</td>
											<td>{{ $skill->title }}</td>
											<td>{{ $skill->category }}</td>
											<td>
												<div class="progress progress-xs">
													<div class="progress-bar progress-bar bg-{{ ($k%2) ? 'success' : 'warning' }}" style="width: {{ $skill->percent }}%"></div>
												</div>
											</td>
											<td><span class="badge bg-{{ ($k%2) ? 'success' : 'warning' }}">{{ $skill->percent }}%</span></td>
											<td>
												<a href="{{ route('skill.edit', ['skill' => $skill->id]) }}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
												<form style="display: inline" action="{{ route('skill.destroy', ['skill' => $skill->id]) }}" method="POST">
													@csrf
													@method('DELETE')
													<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
												</form>

											</td>
										</tr>
									@endforeach
								@else
								<h2>Записей пока нет</h2>
								@endif
							</tbody>
						</table>
					</div>
				</div>


			</div>
			<!-- /.row -->
			<!-- Main row -->

		</div>

	</section>







