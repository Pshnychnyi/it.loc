<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">{{ !isset($service->id) ? 'Создание услги' : 'Редактирование услуги ' . $service->title }}</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
					<li class="breadcrumb-item active">{{ !isset($service->id) ? 'Создание услги' : 'Редактирование услуги ' . $service->title }}</li>
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
					
					<form method="POST" action="{{ isset($service->id) ? route('service.update', ['service' => $service->alias]) : route('service.store') }}" enctype="multipart/form-data">
						@csrf
						@if (isset($service->id))
							@method('PUT')
						@endif

						<div class="card-body">
							<div class="form-group">
								<label for="title">Заголовок</label>
								<input type="text" name="title" class="form-control" id="title" value="{{ isset($service->title) ? $service->title : old('title') }}" placeholder="Введите заголовок">
							</div>

							<div class="form-group">
								<label for="desc">Описание</label>
								<textarea placeholder="Введите текст" name="desc" class="form-control" id="summernote" cols="30" rows="10">{{ isset($service->desc) ? $service->desc : old('desc') }}</textarea>

							</div>


							
							<div class="form-group">
								<label>Иконки</label>
								<select class="form-control" name="icon" style="width: 100%;">
									@foreach ($icons as $icon)
										<option value="{{ $icon->id }}"  {{  (isset($service->icons->id) && $service->icons->id === $icon->id) ? 'selected' : '' }}>{{ $icon->icon }}</option>
									@endforeach
								</select>
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
 







