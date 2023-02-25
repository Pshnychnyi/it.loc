@if (isset($portfolios) && !$portfolios->isEmpty())
<!-- Portfolio Start -->
<div class="portfolio mt-5">
	<div class="container">
		<div class="section-header">
			<h2>Our Portfolio</h2>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac lacus eget nunc imperdiet 
			</p>
		</div>

		<div class="row portfolio-container">
			@foreach ($portfolios as $portfolio)
			<div class="col-lg-4 col-md-6 portfolio-item">
				<div class="portfolio-img">
					<img style="width: 350px;height: 233px;" src="{{ asset("storage/" . $portfolio->img) }}" class="img-fluid" alt="Portfolio">
					<a href="{{ asset("storage/" . $portfolio->img) }}" data-lightbox="portfolio" data-title="{{ $portfolio->title }}" class="link-preview" title="Preview"><i class="ion-md-eye"></i></a>
					<a href="" class="link-details" title="More Details"><i class="ion-md-open"></i></a>
				</div>

				<div class="portfolio-info">
					<h3>{{ $portfolio->title }}</h3>
					<p>{{ $portfolio->service->title }}</p>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
<!-- Portfolio End -->
@endif