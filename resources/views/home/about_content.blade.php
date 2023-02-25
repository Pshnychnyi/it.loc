@if (isset($abouts) && !$abouts->isEmpty())
	<!-- About Start-->
	<div class="about mt-5">
		<div class="container">
			<div class="section-header">
				<h2>About Us</h2>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac lacus eget nunc imperdiet
				</p>
			</div>

			<div class="row align-items-center">
				<div class="col-md-12">
					<div class="about-img">
						<img src="{{ asset("storage/" . $abouts->first()->img) }}" alt="" class="img-fluid">
					</div>
					<div class="about-content">
						<h2>{{ $abouts->first()->title }}</h2>
						<p>{{ $abouts->first()->content }}</p>
						<a class="btn" href="{{ route('about.single', ['about' => $abouts->first()->alias]) }}">Читать больше</a>
					</div>
				</div>
			</div>
			<div class="row">
				@foreach ($abouts as $k => $about)
					@if ($k === 0)
						@continue
					@endif
					<div class="col-md-6">
						<div class="about-img">
							<img style="width: 540;height: 308px;" src="{{ asset("storage/" . $about->img) }}" alt="" class="img-fluid">
						</div>
						<div class="about-content">
							<h2>{{ $about->title }}</h2>
							<p>{!! Str::limit($about->content, 200) !!}</p>
							<a class="btn" href="{{ route('about.single', ['about' => $about->alias]) }}">Читать больше</a>
						</div>
					</div>
				@endforeach
			</div>
			
		</div>
	</div>
	<!-- About End -->
@endif