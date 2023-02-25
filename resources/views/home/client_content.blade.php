@if (isset($clients) && !$clients->isEmpty())
<!-- Clients Start -->
<div class="clients mt-5">
	<div class="container">
		<div class="section-header">
			<h2>Our Clients</h2>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac lacus eget nunc imperdiet  
			</p>
		</div>

		<div class="owl-carousel clients-carousel">
			@foreach ($clients as $client)
				<img src="{{ asset('storage/' .$client->img) }}" alt="Client Logo">
			@endforeach
			
			
		</div>

	</div>
</div>
<!-- Clients End -->
@endif