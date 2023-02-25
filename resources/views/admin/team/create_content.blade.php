<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">{{ isset($team->id) ? 'Редактирование члена команды ' .  $team->name : 'Создание члена команды' }}</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
					<li class="breadcrumb-item active">{{ isset($team->id) ? 'Редактирование члена команды ' .  $team->name : 'Создание члена команды' }}</li>
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
			<div class="col-md-10 offset-1">

				<div class="card card-primary">
					
					<form method="POST" action="{{ isset($team->id) ? route('team.update', ['team' => $team->id]) : route('team.store') }}" enctype="multipart/form-data">
						@csrf
						@if (isset($team->id))
							@method('PUT')
						@endif

						<div class="card-body">
							<div class="form-group">
								<label for="name">Имя</label>
								<input type="text" name="name" class="form-control" id="name" value="{{ isset($team->id) ? $team->name : old('name') }}" placeholder="Введите заголовок">
							</div>

							<div class="form-group">
								<label for="position">Позиция</label>
								<input type="text" name="position" class="form-control" id="position" value="{{ isset($team->id) ? $team->position : old('position') }}" placeholder="Введите заголовок">
							</div>


							@if (isset($team->img))
								<div class="form-group"><img style="width: 300px; height: 300px" src="{{ asset('storage/' . $team->img) }}" class="img-thumbnail" alt="">
								</div>
							@endif

							<div class="form-group">
								<label for="exampleInputFile">Изобржение</label>
								<div class="input-group">
									<div class="custom-file">
										<input name="img" type="file" class="custom-file-input" id="img">
										<label class="custom-file-label" for="img">Выберите изображение</label>
									</div>
									<div class="input-group-append">
										<span class="input-group-text">Загрузить</span>
									</div>
								</div>
							</div>
						</div>

						<div class="card-footer">
							<button type="submit" class="btn btn-primary">Сохранить</button>
						</div>
					</form>
				</div>
			</div>


		</div>
		<!-- /.row -->
		<!-- Main row -->

	</div>

</section>







