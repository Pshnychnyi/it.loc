@if ($sliders && !$sliders->isEmpty())
<div class="header">
	<div id="header-slider" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ul class="carousel-indicators">
			<li data-target="#header-slider" data-slide-to="0" class="active"></li>
			<li data-target="#header-slider" data-slide-to="1"></li>
			<li data-target="#header-slider" data-slide-to="2"></li>
		</ul>

		<div class="carousel-inner">
			@foreach ($sliders as $k => $slider)
			<div class="carousel-item {{ $k == 0 ? 'active' : '' }}">
				<div class="row align-items-center">
					<div class="col-md-6">
						<div class="carousel-content">
							<h2>{{ $slider->title }}</h2>
							<p>{{ $slider->desc }}</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="carousel-img">
							<img src="{{ asset("storage/" . $slider->img) }}" alt="Image">
						</div>
					</div>
				</div>   
			</div>
			@endforeach
			
			
		</div>

		<a class="carousel-control-prev" href="#header-slider" data-slide="prev">
			<i class="ion-ios-arrow-back"></i>
		</a>
		<a class="carousel-control-next" href="#header-slider" data-slide="next">
			<i class="ion-ios-arrow-forward"></i>
		</a>
	</div>
</div>
@endif
