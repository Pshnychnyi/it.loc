@if(isset($reviews) && !$reviews->isEmpty())
<!-- Testimonials Start -->
<div class="testimonials mt-5">
	<div class="container">
		<div class="section-header">
			<h2>Reviews</h2>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac lacus eget nunc imperdiet 
			</p>
		</div>

		<div class="owl-carousel testimonials-carousel">
			@foreach ($reviews as $review)
				<div class="testimonial-item row align-items-center">
					<div class="testimonial-img">
						<img style="width: 247px;height: 247px" src="{{ asset("storage/" . $review->img) }}" alt="Testimonial image">
					</div>
					<div class="testimonial-text">
						<h3>{{ $review->name }}</h3>
						<h4>{{ $review->position }}</h4>
						<p>{!! $review->desc !!}</p>
					</div>
				</div>
			@endforeach
			
			
		</div>
	</div>
</div>
<!-- Testimonials End -->
@endif