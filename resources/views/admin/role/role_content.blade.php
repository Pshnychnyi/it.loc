<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Роли и привелегии пользователей</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
					<li class="breadcrumb-item active">Роли и привелегии пользователей</li>
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
					
					<form action="{{ route('role.store') }}" method="post">
						@csrf
						<div class="card-body">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Привелегии</th>
										@foreach ($roles as $role)
											<th class="text-center">{{ $role->name }}</th>
										@endforeach
									</tr>
								</thead>
								<tbody>
										@foreach ($permissions as $permission)
										<tr>
											<th>{{ $permission->name }}</th>
											@foreach ($roles as $role)
											<td class="text-center">
												@if ($role->hasPermission($permission->name))
													<input type="checkbox" name="{{ $role->id }}[]" value="{{ $permission->id }}" checked>
												@else 
													<input type="checkbox" name="{{ $role->id }}[]" value="{{ $permission->id }}">
												@endif

											</td>
											@endforeach
										</tr>
										@endforeach
								</tbody>
								

							</table>
							<div class="row mt-3">
								<div class="col-md-3">
									<button type="submit" class="btn btn-primary">Обновить</button>
								</div>
							</div>
							
						</div>
					</form>

					

					
				</div>


			</div>
			<!-- /.row -->
			<!-- Main row -->

		</div>

	</section>







