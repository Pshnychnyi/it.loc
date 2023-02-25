<!-- Contact Start -->
<div class="contact mt-5">
	<div class="container">
		<div class="section-header">
			<h2>Contact Us</h2>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac lacus eget nunc imperdiet 
			</p>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form">
					<form id='letter' action="{{ route('index') }}" class="contactForm" method="POST">
						@csrf
						<div class="form-row">
							<div class="form-group col-sm-6">
								<input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Ваше имя" />
								<span class="error"></span>
								
							</div>
							<div class="form-group col-sm-6">
								<input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Ваш Email" />
								<span class="error"></span>
							</div>
						</div>
						<div class="form-group">
							<input type="text" name="topic" value="{{ old('topic') }}" class="form-control @error('topic') is-invalid @enderror" placeholder="Тема" />
							<span class="error"></span>
						</div>
						<div class="form-group">
							<textarea class="form-control @error('name') is-invalid @enderror" name="message" rows="5" placeholder="Сообщение">{{ old('topic') }}</textarea>
							<span class="error"></span>
						</div>
						<div><button id="submit" class="btn" type="submit">Отправить сообщение</button></div>
					</form>
				</div>
			</div>
			<div class="col-md-6">
				<div class="map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26361250.667320687!2d-113.75533773453304!3d36.24128894212527!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sbd!4v1574923227698!5m2!1sen!2sbd" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Contact End -->