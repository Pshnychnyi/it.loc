@if (isset($services) && !$services->isEmpty())
	<!-- Service Start -->
<div class="service mt-5">
	<div class="container">
		<div class="section-header">
			<h2>Services</h2>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac lacus eget nunc imperdiet 
			</p>
		</div>
		<div class="row">
			@foreach ($services as $service)
			<div class="col-sm-6 col-md-4 col-lg-3">
				<div class="service-item">
					<div class="service-icon">
						<i class="ion-ios-{{ $service->icons->icon }}"></i>
					</div>
					<div class="service-detail">
						<h4><a href="">{{ $service->title }}</a></h4>
						<p>{!! $service->desc !!}</p>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
<!-- Service End -->
@endif