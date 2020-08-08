@extends("frontend.layout")

@section("title","Contact Us")
@section("content")
 
    <!-- END nav -->
    @php $sliders = \App\Models\Slider::get() @endphp 
    @foreach ($sliders as $slider)
      <div class="hero-wrap" style="background-image: url('{{asset('storage/'.$slider->image)}}');">
        <div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
              <div class="text">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="{{ route('home-view') }}">Home</a></span> <span>Contact</span></p>
                <h1 class="mb-4 bread">Contact us</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
@endforeach
		<section class="ftco-section contact-section bg-light">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
            <h2 class="h3">Contact Information</h2>
          </div>
          <div class="w-100"></div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-white p-4">
	            <p><span>Website</span> <a href="#">yoursite.com</a></p>
	          </div>
          </div>
        </div>
      <div class="row block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form action="{{route('contactus')}}" method="post" class="bg-white p-5 contact-form" role="form">
               @csrf 
				     	@include("shared.msg")
              <div class="form-group">
                <input type="string" name="name" id="name" class="form-control" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input type="string" name="email" id="email" class="form-control" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input type="string" name="subject" id="subject" class="form-control" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea name="message" type="text"  id="message" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          </div>

          <div class="col-md-6 d-flex">
          	<div id="map" class="bg-white"></div>
          </div>
        </div>
      </div>
    </section>

@endsection