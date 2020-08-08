@extends("frontend.layout")

@section("title","Rooms")
@section("content")

    <!-- END nav -->
		<div class="hero-wrap" style="background-image: url('{{asset('images/bg_1.jpg')}}');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
          	<div class="text">
	            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home</a></span> <span>About</span></p>
	            <h1 class="mb-4 bread">Rooms</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light ftco-no-pb">
    	<div class="container-fluid px-0">
    		<div class="row no-gutters justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Roxandrea Rooms</span>
            <h2 class="mb-4">Hotel Master's Rooms</h2>
          </div>
        </div>  
    		<div class="row no-gutters">
			 @php $rooms = \App\Models\Room::get() @endphp
					@foreach($rooms as $room)
						<div class="col-lg-6">
							<div class="room-wrap d-md-flex">
								<a href="#" class="img" style="background-image:url('{{asset('storage/'.$room->image)}}');"></a>
								<div class="half left-arrow d-flex align-items-center">
									<div class="text p-4 p-xl-5 text-center">
										<p class="star mb-0"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
										<p class="mb-0"><span class="price mr-1">{{ $room->price }}.$</span> <span class="per">per night</span></p>
										<h3 class="mb-3"><a href="rooms-single.html">{{ $room->title }}</a></h3>
										<p class="pt-1"><a href="{{ route('show-room' ,$room->id) }}" class="btn-custom px-3 py-2">View Room Details <span class="icon-long-arrow-right"></span></a></p>
									</div>
								</div>
							</div>
						</div>
					@endforeach
					{{-- <div class="col-lg-6">
						<div class="room-wrap d-md-flex">
							<a href="rooms-single.html" class="img" style="background-image: url(images/room-5.jpg);"></a>
							<div class="half left-arrow d-flex align-items-center">
								<div class="text p-4 p-xl-5 text-center">
									<p class="star mb-0"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
									<p class="mb-0"><span class="price mr-1">$120.00</span> <span class="per">per night</span></p>
									<h3 class="mb-3"><a href="rooms-single.html">Classic Room</a></h3>
									<p class="pt-1"><a href="rooms-single.html" class="btn-custom px-3 py-2">View Room Details <span class="icon-long-arrow-right"></span></a></p>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-6">
						<div class="room-wrap d-md-flex">
							<a href="#" class="img order-md-last" style="background-image: url(images/room-2.jpg);"></a>
							<div class="half right-arrow d-flex align-items-center">
								<div class="text p-4 p-xl-5 text-center">
									<p class="star mb-0"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
									<p class="mb-0"><span class="price mr-1">$120.00</span> <span class="per">per night</span></p>
									<h3 class="mb-3"><a href="rooms-single.html">Family Room</a></h3>
									<p class="pt-1"><a href="rooms-single.html" class="btn-custom px-3 py-2">View Room Details <span class="icon-long-arrow-right"></span></a></p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="room-wrap d-md-flex">
							<a href="#" class="img order-md-last" style="background-image: url(images/room-3.jpg);"></a>
							<div class="half right-arrow d-flex align-items-center">
								<div class="text p-4 p-xl-5 text-center">
									<p class="star mb-0"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
									<p class="mb-0"><span class="price mr-1">$120.00</span> <span class="per">per night</span></p>
									<h3 class="mb-3"><a href="rooms-single.html">Deluxe Room</a></h3>
									<p class="pt-1"><a href="rooms-single.html" class="btn-custom px-3 py-2">View Room Details <span class="icon-long-arrow-right"></span></a></p>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-6">
						<div class="room-wrap d-md-flex">
							<a href="rooms-single.html" class="img" style="background-image: url(images/room-4.jpg);"></a>
							<div class="half left-arrow d-flex align-items-center">
								<div class="text p-4 p-xl-5 text-center">
									<p class="star mb-0"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
									<p class="mb-0"><span class="price mr-1">$120.00</span> <span class="per">per night</span></p>
									<h3 class="mb-3"><a href="rooms-single.html">Luxury Room</a></h3>
									<p class="pt-1"><a href="rooms-single.html" class="btn-custom px-3 py-2">View Room Details <span class="icon-long-arrow-right"></span></a></p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="room-wrap d-md-flex">
							<a href="rooms-single.html" class="img" style="background-image: url(images/room-6.jpg);"></a>
							<div class="half left-arrow d-flex align-items-center">
								<div class="text p-4 p-xl-5 text-center">
									<p class="star mb-0"><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
									<p class="mb-0"><span class="price mr-1">$120.00</span> <span class="per">per night</span></p>
									<h3 class="mb-3"><a href="rooms-single.html">Superior Room</a></h3>
									<p class="pt-1"><a href="rooms-single.html" class="btn-custom px-3 py-2">View Room Details <span class="icon-long-arrow-right"></span></a></p>
								</div>
							</div>
						</div>
					</div> --}}
    		</div>
    	</div>
    </section>
@endsection