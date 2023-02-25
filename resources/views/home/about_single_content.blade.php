<!-- Single Page Start-->
        <div class="single mt-100">
            <div class="container">
                <div class="section-header">
                    <h2>Single Page</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac lacus eget nunc imperdiet
                    </p>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="single-img">
                            <img src="{{ asset('storage/' . $about->img) }}" alt="" class="img-fluid">
                        </div>
                        <div class="single-content">
                            <h2>{{ $about->title }}</h2>
                            <p>{!! $about->content !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Page Start-->