  <?php 
   use App\Models\Menu;
   use App\Models\Setting;
   $settings = Setting::first();
  $menus = \App\Models\Menu::where('parent_id','=',0 )->where('active' , 1)->get();

  ?>
  
   <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Roxandrea</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="" class="nav-link">Rooms</a></li>
                <li class="nav-item"><a href="" class="nav-link">Restaurant</a></li>
                <li class="nav-item"><a href="" class="nav-link">About</a></li>
                <li class="nav-item"><a href="" class="nav-link">Blog</a></li>
                <li class="nav-item"><a href="" class="nav-link">Contact</a></li>
            </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->