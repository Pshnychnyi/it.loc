@include('home.about_content')
@include('home.service_content')
@include('home.price_content')
@include('home.skill_content')

<!-- Counters Start-->
<div class="counters">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-6 text-center">
				<i class="ion-md-person"></i>
				<h2 data-toggle="counter-up">{{ isset($teams) && $teams->count() ? $teams->count() : '' }}</h2>
				<p>Our Staffs</p>
			</div>

			<div class="col-lg-3 col-6 text-center">
				<i class="ion-md-people"></i>
				<h2 data-toggle="counter-up">{{ isset($clients) && $clients->count() ? $clients->count() : '' }}</h2>
				<p>Our Clients</p>
			</div>

			<div class="col-lg-3 col-6 text-center">
				<i class="ion-md-checkmark"></i>
				<h2 data-toggle="counter-up">{{ isset($portfolios) && $portfolios->count() ? $portfolios->count() : '' }}</h2>
				<p>Completed Projects</p>
			</div>

			<div class="col-lg-3 col-6 text-center">
				<i class="ion-md-trending-up"></i>
				<h2 data-toggle="counter-up">20</h2>
				<p>Running Projects</p>
			</div>
		</div>
	</div>
</div>
<!-- Counters End-->

@include('home.portfolio_content')
@include('home.team_content')
@include('home.review_content')
@include('home.client_content')
@include('home.contact_content')