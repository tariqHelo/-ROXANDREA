<div class="hero">
			<div class="container-wrap d-flex justify-content-end align-items-end">
				<a href="https://www.youtube.com/watch?v=ism1XqnZJEg" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
					<span class="ion-ios-play play"></span>
				</a>
			</div>

	    <section class="home-slider owl-carousel">

		     @php $sliders = \App\Models\Slider::get() @endphp 
            @foreach ($sliders as $slider)
				<div class="slider-item" style="background-image:url('{{asset('storage/'.$slider->image)}}');">
					<div class="overlay"></div>
					<div class="container">
					<div class="row no-gutters slider-text align-items-center">
					<div class="col-md-8 ftco-animate">
						<div class="text mb-5 pb-5">
							<h1 class="mb-3">{{ $slider->title }}</h1>
							<h2>{{ $slider->subtitle }}</h2>
						</div>
					</div>
					</div>
					</div>
				</div>
			@endforeach

	      {{-- <div class="slider-item" style="background-image:url('{{asset('roxandrea/images/bg_2.jpg')}}');">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row no-gutters slider-text align-items-center">
	          <div class="col-md-8 ftco-animate">
	          	<div class="text mb-5 pb-5">
		            <h1 class="mb-3">Experience Epic Beauty</h1>
		            <h2>Roxandrea Hotel &amp; Resort</h2>
	            </div>
	          </div>
	        </div>
	        </div>
	      </div> --}}
	    </section>
	  </div>
    <section class="ftco-booking ftco-section ftco-no-pt ftco-no-pb">
    	<div class="container">

    		<div class="row">
    			<div class="col-lg-12 pr-1 aside-stretch">
    			 <form action="{{ route('post-booking') }}" method="post" class="booking-form" role="form">
				   @csrf 
				   	@include("shared.msg")

						<div class="row">
							<div class="col-md d-flex py-md-4">
								<div class="form-group align-self-stretch d-flex align-items-end">
									<div class="wrap bg-white align-self-stretch py-3 px-4">
											<label for="#">Check-in Date</label>
											<input type="date" id="check_in" name="check_in" class="form-control " >
										</div>
									</div>
							</div>
							<div class="col-md d-flex py-md-4">
								<div class="form-group align-self-stretch d-flex align-items-end">
									<div class="wrap bg-white align-self-stretch py-3 px-4">
											<label for="#">Check-out Date</label>
											<input type="date" id="check_out" name="check_out" class="form-control" >
										</div>
									</div>
							</div>
							<div class="col-md d-flex py-md-4">
								<div class="form-group align-self-stretch d-flex align-items-end">
									<div class="wrap bg-white align-self-stretch py-3 px-4">
										<label for="#">Room</label>
										<div class="form-field">
											<div class="select-wrap">
									<div class="icon"><span class="ion-ios-arrow-down"></span></div>
									<select id="room_id" name="room_id" class="form-control">
											<option value="">Suite</option>
											@php $rooms = \App\Models\Room::get() @endphp
											@foreach($rooms as $room)
												<option value='{{$room->id}}'>{{$room->title}}</option>
											@endforeach
									</select>
								</div>
								</div>
								</div>
						</div>
							</div>
							<div class="col-md d-flex py-md-4">
								<div class="form-group align-self-stretch d-flex align-items-end">
									<div class="wrap bg-white align-self-stretch py-3 px-4">
										<label for="#" >Guests</label>
										<div class="form-field">
											<div class="select-wrap">
									<div class="icon"><span class="ion-ios-arrow-down"></span></div>
									 <select name="adults" id="adults" class="form-control">
										<option value="1">1 Adult</option>
										<option value="2">2 Adult</option>
										<option value="3">3 Adult</option>
										<option value="4">4 Adult</option>
										<option value="5">5 Adult</option>
										<option value="6">6 Adult</option>
									</select> 
								</div>
								</div>
								</div>
						</div>
							</div>
							<div class="col-md d-flex">
								<div class="form-group d-flex align-self-stretch">
							<button  class="btn btn-black py-5 py-md-3 px-4 align-self-stretch d-block" type="submit"><span>Check Availability <small>Best Price Guaranteed!</small></span></button>
							</div>
							</div>
						</div>
	        	</form>
	    		</div>
    		</div>
		 </form>
    	</div>
    </section>
