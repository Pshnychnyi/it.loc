<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">{{ isset($price->id) ? 'Редактирование навыка ' . $skill->title : 'Создание навыков' }}</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
					<li class="breadcrumb-item active">{{ isset($price->id) ? 'Редактирование навыка ' . $skill->title : 'Создание навыков' }}</li>
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
					
					<form method="POST" action="{{ isset($skill->id) ? route('skill.update', ['skill' => $skill->id]) : route('skill.store') }}" enctype="multipart/form-data">
						@csrf
						@if (isset($skill->id))
							@method('PUT')
						@endif

						<div class="card-body">
							<div class="form-group">
								<label for="title">Наименование</label>
								<input type="text" name="title" class="form-control" id="title" value="{{ isset($skill->title) ? $skill->title : old('title') }}" placeholder="Введите наименование">
							</div>

							<div class="form-group">
								<label for="percent">Процент</label>
								<input type="range" name="percent" class="form-control-range" id="percent" value="{{ isset($skill->percent) ? $skill->percent : old('percent')  }}">
								<label id="active_precent" for="percent"></label>
							</div>
							<div class="form-group">
								<label>Категория</label>
								<select class="form-control" name="category" style="width: 100%;">
									<option value="Back End Skills">Back End Skills</option>
									<option value="Front End Skills">Front End Skills</option>
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
<script>
	let label = document.querySelector('#active_precent')
	let percent = document.querySelector('#percent')
	label.innerHTML = percent.value + '%'
	percent.addEventListener('change', function(event) {
		label.innerHTML = '%'
		label.insertAdjacentHTML('afterbegin', this.value)
	});
</script>
 







