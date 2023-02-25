<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">{{ isset($price->id) ? 'Редактирование цены ' . $price->title : 'Создание цен' }}</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
					<li class="breadcrumb-item active">{{ isset($price->id) ? 'Редактирование цены ' . $price->title : 'Создание цен' }}</li>
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
					
					<form method="POST" action="{{ isset($price->id) ? route('price.update', ['price' => $price->id]) : route('price.store') }}" enctype="multipart/form-data">
						@csrf
						@if (isset($price->id))
							@method('PUT')
						@endif

						<div class="card-body">
							<div class="form-group">
								<label for="title">Заголовок</label>
								<input type="text" name="title" class="form-control" id="title" value="{{ isset($price->title) ? $price->title : old('title') }}" placeholder="Введите заголовок">
							</div>

							<div class="form-group">
								<label for="price">Цена</label>
								<input type="text" name="price" class="form-control" id="price" value="{{ isset($price->price) ? $price->price : old('price') }}">
							</div>

							<h3>Технологии</h3>

							

							@foreach ($technologies as $k => $technology)
							<div class="form-group form-check">
								<input class="form-check-input" type="checkbox" name="{{$k}}" id="technologies" value="{{ $technology->id }}"{{ isset($price) && $price->technologies->contains($technology) ? ' checked' : '' }}>
								<label class="form-check-label" for="technologies"> {{ $technology->title }} </label>
							</div>
							@endforeach
							

							
								
							
							<div class="form-group">
								<label>Иконки</label>
								<select class="form-control" name="icon_id" style="width: 100%;">
									@foreach ($icons as $icon)
										<option value="{{ $icon->id }}"  {{  (isset($price->icon->id) && $price->icon->id === $icon->id) ? 'selected' : '' }}>{{ $icon->icon }}</option>
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
 







