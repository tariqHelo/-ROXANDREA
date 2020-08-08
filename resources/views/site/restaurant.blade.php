		
		<section class="ftco-section ftco-menu" style="background-image: url('{{asset('roxandrea/images/restaurant-pattern.jpg')}}');">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Restaurant</span>
            <h2>Restaurant</h2>
          </div>
        </div>
		<div class="row">
		    @php $foods = \App\Models\Food::get() @endphp
               @foreach($foods as $food)
					<div class="col-md-6">
						<div class="pricing-entry d-flex ftco-animate">
							<div class="img order-md-last" style="background-image: url('{{asset('storage/'.$food->image)}}');"></div>
							<div class="desc pr-3 text-md-right">
								<div class="d-md-flex text align-items-center">
									<h3 class="order-md-last heading-left"><span>{{ $food->title }}</span></h3>
									<span class="price price-left">{{ $food->price }}</span>
								</div>
								<div class="d-block">
									<p>{{ $food->details }}</p>
								</div>
							</div>
						</div>
						{{-- <div class="pricing-entry d-flex ftco-animate">
							<div class="img order-md-last" style="background-image: url('{{asset('roxandrea/images/menu-2.jpg')}}');"></div>
							<div class="desc pr-3 text-md-right">
								<div class="d-md-flex text align-items-center">
									<h3 class="order-md-last heading-left"><span>Grilled Beef with potatoes</span></h3>
									<span class="price price-left">$29.00</span>
								</div>
								<div class="d-block">
									<p>A small river named Duden flows by their place and supplies</p>
								</div>
							</div>
						</div>
						<div class="pricing-entry d-flex ftco-animate">
							<div class="img order-md-last" style="background-image: url('{{asset('roxandrea/images/menu-3.jpg')}}');"></div>
							<div class="desc pr-3 text-md-right">
								<div class="d-md-flex text align-items-center">
									<h3 class="order-md-last heading-left"><span>Grilled Beef with potatoes</span></h3>
									<span class="price price-left">$20.00</span>
								</div>
								<div class="d-block">
									<p>A small river named Duden flows by their place and supplies</p>
								</div>
							</div>
						</div>
						<div class="pricing-entry d-flex ftco-animate">
							<div class="img order-md-last" style="background-image: url('{{asset('roxandrea/images/menu-4.jpg')}}');"></div>
							<div class="desc pr-3 text-md-right">
								<div class="d-md-flex text align-items-center">
									<h3 class="order-md-last heading-left"><span>Grilled Beef with potatoes</span></h3>
									<span class="price price-left">$20.00</span>
								</div>
								<div class="d-block">
									<p>A small river named Duden flows by their place and supplies</p>
								</div>
							</div>
						</div> --}}
					</div>
			   @endforeach

				 {{-- <div class="col-md-6">
					<div class="pricing-entry d-flex ftco-animate">
						<div class="img" style="background-image: url('{{asset('roxandrea/images/menu-5.jpg')}}');"></div>
						<div class="desc pl-3">
							<div class="d-md-flex text align-items-center">
								<h3><span>Grilled Beef with potatoes</span></h3>
								<span class="price">$49.91</span>
							</div>
							<div class="d-block">
								<p>A small river named Duden flows by their place and supplies</p>
							</div>
						</div>
					</div>
					<div class="pricing-entry d-flex ftco-animate">
						<div class="img" style="background-image: url('{{asset('roxandrea/images/menu-6.jpg')}}');"></div>
						<div class="desc pl-3">
							<div class="d-md-flex text align-items-center">
								<h3><span>Ultimate Overload</span></h3>
								<span class="price">$20.00</span>
							</div>
							<div class="d-block">
								<p>A small river named Duden flows by their place and supplies</p>
							</div>
						</div>
					</div>
					<div class="pricing-entry d-flex ftco-animate">
						<div class="img" style="background-image: url('{{asset('roxandrea/images/menu-7.jpg')}}');"></div>
						<div class="desc pl-3">
							<div class="d-md-flex text align-items-center">
								<h3><span>Grilled Beef with potatoes</span></h3>
								<span class="price">$20.00</span>
							</div>
							<div class="d-block">
								<p>A small river named Duden flows by their place and supplies</p>
							</div>
						</div>
					</div>
					<div class="pricing-entry d-flex ftco-animate">
						<div class="img" style="background-image: url('{{asset('roxandrea/images/menu-8.jpg')}}');"></div>
						<div class="desc pl-3">
							<div class="d-md-flex text align-items-center">
								<h3><span>Ham &amp; Pineapple</span></h3>
								<span class="price">$20.00</span>
							</div>
							<div class="d-block">
								<p>A small river named Duden flows by their place and supplies</p>
							</div>
						</div>
					</div>
				</div>  --}}
        </div>
	</div>
</section>
