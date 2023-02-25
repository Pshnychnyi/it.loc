<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">{{ isset($about->id) ? 'Редактирование пункта ' . $about->title : 'Создание пункта о нас' }}</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
					<li class="breadcrumb-item active">{{ isset($about->id) ? 'Редактирование пункта ' . $about->title : 'Создание пункта о нас' }}</li>
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
					
					<form method="POST" action="{{ isset($about->id) ? route('about.update', ['about' => $about->alias]) : route('about.store') }}" enctype="multipart/form-data">
						@csrf
						@if (isset($about->id))
							@method('PUT')
						@endif

						<div class="card-body">
							<div class="form-group">
								<label for="title">Заголовок</label>
								<input type="text" name="title" class="form-control" id="title" value="{{ isset($about->id) ? $about->title : old('title') }}" placeholder="Введите заголовок">
							</div>

							<div class="form-group">
								<label for="content">Контент</label>
								<textarea placeholder="Введите текст" name="content" class="form-control" id="summernote" cols="30" rows="10">{{ isset($about->id) ? $about->content : old('content') }}</textarea>
							</div>
							@if (isset($about->img))
								<div class="form-group"><img style="width: 300px;" src="{{ asset('storage/' . $about->img) }}" class="img-thumbnail" alt="">
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







