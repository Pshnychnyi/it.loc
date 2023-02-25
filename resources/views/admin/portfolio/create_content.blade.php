<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">{{ isset($portfolio->id) ? 'Редактирование портфолио ' . $portfolio->title : 'Создание портфолио' }}</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Главная</a></li>
					<li class="breadcrumb-item active">{{ isset($portfolio->id) ? 'Редактирование портфолио ' . $portfolio->title : 'Создание портфолио' }}</li>
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
					
					<form method="POST" action="{{ isset($portfolio->id) ? route('portfolio.update', ['portfolio' => $portfolio->alias]) : route('portfolio.store') }}" enctype="multipart/form-data">
						@csrf
						@if (isset($portfolio->id))
							@method('PUT')
						@endif

						<div class="card-body">
							<div class="form-group">
								<label for="title">Заголовок</label>
								<input type="text" name="title" class="form-control" id="title" value="{{ isset($portfolio->id) ? $portfolio->title : old('title') }}" placeholder="Введите заголовок">
							</div>

							<div class="form-group">
								<label for="desc">Контент</label>
								<textarea name="desc" class="form-control" id="summernote" cols="30" rows="10">{{ isset($portfolio->id) ? $portfolio->desc : old('desc') }}</textarea>
							</div>
							<div class="form-group">
								<label for="service_id">Услуги</label>
								<select class="form-control" name="service_id" style="width: 100%;">
									@foreach ($services as $service)
										<option value="{{ $service->id }}" {{ (isset($portfolio->service->id) && $portfolio->service->id == $service->id) ? 'selected' : '' }}>{{ $service->title }}</option>
									@endforeach
								</select>
							</div>


							@if (isset($portfolio->img))
								<div class="form-group"><img style="width: 300px; height: 300px" src="{{ asset('storage/' . $portfolio->img) }}" class="img-thumbnail" alt="">
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







