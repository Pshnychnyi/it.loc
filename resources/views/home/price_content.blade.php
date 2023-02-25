@if (isset($prices) && isset($technologies))
<!--Pricing start-->
<div class="pricing mt-5">
	<div class="container">
		<div class="section-header">
			<h2>Our Pricing</h2>
			<p>
				Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas 
			</p>
		</div>
		<div class="row">
			@foreach ($prices as $price)
				<div class="col-md-4">
				<div class="price-content">
					<div class="price-plan">
						<i class="ion-md-{{ $price->icon->icon }}"></i>
						<p class="price-title">{{ $price->title }}</p>
						<h2 class="price-amount"><span>$</span>{{ Str::before($price->price, '.') }}@if (strpos($price->price, '.'))<span>.{{ Str::after($price->price, '.') }}</span>@endif<span> / m</span></h2>

						{{-- <h2 class="price-amount"><span>$</span>{{ substr($price->price, 0, strpos($price->price, '.')) }} <span>{{ substr($price->price, strpos($price->price, '.')) }}</span><span> / m</span></h2> --}}
			
					</div>
					<ul class="price-details">
						@foreach ($technologies as $technology)
							
							<li><i class="ion-md-{{ $price->technologies->contains($technology) ? 'checkmark' : 'close' }}"></i><strong>{{ $technology->title }}</strong></li>
							
						@endforeach
					</ul>
					<a href="#" class="btn mian-btn price-btn">Buy Now</a>
				</div>
			</div>
			@endforeach
			
		</div>
	</div>
</div>
<!--Pricing End-->
@endif