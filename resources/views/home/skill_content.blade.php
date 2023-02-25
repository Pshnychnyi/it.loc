@if (isset($skills) && !$skills->isEmpty())
<!-- Skills Start-->
<div class="skills mt-5">
	<div class="container">
		<div class="section-header">
			<h2>Our Skills</h2>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac lacus eget nunc imperdiet 
			</p>
		</div>

		<div class="row">
			@foreach ($skills as $category => $skill)
				<div class="col-md-6">
					<div class="skill-item">
							<h3>{{ $category }}</h3>
						@foreach ($skill as $item)
							<div class="skill-name">
								<p>{{ $item->title }}</p><p>{{ $item->percent }}%</p>
							</div>
							<div class="progress">
								<div class="progress-bar" role="progressbar" aria-valuenow="{{ $item->percent }}" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						@endforeach
					</div>
				</div>
			@endforeach
			
			
		</div>
	</div>
</div>
<!-- Skills End-->
@endif