<style>
   .nav-link .fa-shopping-cart {
       position: relative;
   }

   .nav-link .fa-shopping-cart .badge {
       position: absolute;
       top: -5px;
       right: -10px;
       font-size: 10px;
       padding: 5px 7px;
       border-radius: 50%;
   }
   .navbar-brand img {
    max-width: 100px; 
    height: auto; 
    border-radius: 10px;
}

</style>
<header class="header_section">
   <div class="container">
      <nav class="navbar navbar-expand-lg custom_nav-container">
      <a class="navbar-brand" href="{{url('/')}}"><img src="images/logo.png" alt="#" /></a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class=""> </span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
               <li class="nav-item active">
                  <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{url('blog')}}">Blog</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{url('contact')}}">Contact</a>
               </li>
               <li class="nav-item">
               <a class="nav-link" href="{{url('show_cart')}}">Cart
                  <i class="fa fa-shopping-cart">
                     <span class="badge badge-pill badge-danger">0</span>
                  </i> 
               </a>
            </li>


               <li class="nav-item">
                  <a class="nav-link" href="{{url('show_order')}}">Order</a>
               </li>
               <form class="form-inline" action="{{url('product_search')}}" method="GET">
                  @csrf
               <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" aria-label="Search" >
               <!-- <input class="btn my-2 my-sm-0 nav_search-btn" type="submit"> -->
               <button class="btn my-2 my-sm-0 nav_search-btn" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
               </button>
            </form>

               
               @if (Route::has('login'))
               @auth
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     {{ Auth::user()->name }}
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                     <a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a>
                     <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="{{ route('logout') }}" 
                           onclick="event.preventDefault(); this.closest('form').submit();">
                           Logout
                        </a>
                     </form>
                  </div>
               </li>
               @else
               <li class="nav-item">
                  <a class="btn btn-primary" id="signin" href="{{ route('login') }}">Sign In</a>
               </li>
               <li class="nav-item">
                  <a class="btn btn-success" href="{{ route('register') }}">Sign Up</a>
               </li>
               @endauth
               @endif
            </ul>
         </div>
      </nav>
   </div>
</header>
