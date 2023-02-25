@if (isset($teams) && !$teams->isEmpty())
<!-- Team Start -->
<div class="team mt-5">
	<div class="container">
		<div class="section-header">
			<h2>Meet our team</h2>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac lacus eget nunc imperdiet 
			</p>
		</div>

		<div class="row">
			@foreach ($teams as $team)
				<div class="col-lg-3 col-sm-6 team-item">
					<div class="team-img">
						<img src="{{ asset("storage/" . $team->img) }}" class="img-fluid" alt="Team Member">
						<div class="team-social">
							<a href="#"><i class="ion-logo-twitter"></i></a>
							<a href="#"><i class="ion-logo-facebook"></i></a>
							<a href="#"><i class="ion-logo-linkedin"></i></a>
							<a href="#"><i class="ion-logo-instagram"></i></a>
						</div>
					</div>
					<div class="team-info">
						<h3>{{ $team->name }}</h3>
						<p>{{ $team->position }}</p>
					</div>
				</div>
			@endforeach
			

		</div>
	</div>
</div>
<!-- Team End -->
@endif